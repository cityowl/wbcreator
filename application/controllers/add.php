<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Add extends MY_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->auth->access_allowed()) {
            redirect("auth");
        }
    }

    protected function modelToXml($xmlfrom, $to, $model) {
        $filepath = $xmlfrom;

        if (!file_exists($filepath)) {
            return false;
        }

        $xml = simplexml_load_file($filepath);

        $wbs = $xml->xpath("//*[@wb]");

        for ($i = 0; $i < count($wbs); $i++) {
            $wb_id = $wbs[$i]->attributes()->wb->__toString();

            if (property_exists($model, $wb_id)) {
                $wbs[$i][0][0] = $model->$wb_id;
            }
        }

        // save the values in a new xml
        return $xml->asXML($to);
    }

    public function test() {
        
    }

    public function index($id = null) {
        $data = array(
            "navigation" => $this->getTpl("navigation"),
            "title" => "Main / Add waybill"
        );

        $data['clone'] = $this->SmgsModel->get_one_by_id($id);

        $this->render("add", $data);
    }

    public function api() {
        $valid = & $this->form_validation;

        $valid->set_rules('name', '"Имя"', 'required');

        // Код дороги отправителя
        $_POST['senderRoadCode'] = "21";
        // Код станции отправителя
        $_POST['senderStationCode'] = "140304";
        // Код отправителя
        $_POST['senderCode'] = "0476";
        // Отправитель
        $_POST['sender'] = "ОАО «БЕЛГИПС», 220038 БЕЛАРУСЬ г.Минск ул.Козлова 24, р/с: 3012100982015 МФО: 153001369, банк: ОАО БПС-СБЕРБАНК Минск, УНП: 10007096, ОКПО: 294697000";

        $valid->set_rules('recipientCode', '"Код получателя"', 'required|integer');
        $valid->set_rules('recipient', '"Получатель"', 'required');

        // Станция отправления
        $_POST['dispatchStation'] = "МИНСК-ВОСТОЧНЫЙ БЧ 140304";

        $valid->set_rules('specificApplicationSender', '"Особые заявления отправителя"', 'required');
        
        $valid->set_rules('optionalMarks', '"Отметки, необязательные для жд"', 'required');
        $valid->set_rules('shippingName', '"Наименование груза"', 'required');
        $valid->set_rules('wagonNumber', '"Номер вагона"', 'required');
        $valid->set_rules('carryingCapacity', '"Грузоподъемность"', 'required');
        $valid->set_rules('axesNumber', '"Количество осей"', 'required|integer');
        $valid->set_rules('wagonTara', '"Тара вагона"', 'required');
        $valid->set_rules('stationDestination', '"Станция назначения"', 'required');
        $valid->set_rules('roadDestination', '"Дорога назначения"', 'required');
        $valid->set_rules('roadCode', '"Код дороги"', 'required|integer');
        $valid->set_rules('codeStationDestination', '"Код станции назначения"', 'required|integer');
        $valid->set_rules('GNG', '"ГНГ"', 'required|integer');
        $valid->set_rules('ETSNG', '"ЕТСНГ"', 'required|integer');
        $valid->set_rules('summaryPlace', '"Итого место"', 'required');
        $valid->set_rules('summaryWeight', '"Итого масса"', 'required');
        $valid->set_rules('summaryPlaceWords', '"Итого место(прописью)"', 'required');
        $valid->set_rules('summaryWeightWords', '"Итого масса(прописью)"', 'required');
//        $valid->set_rules('transitPaymentNumber', '"Номер оплаты транзитных дорог(от 1 до 5)"', 'required|integer');
        
        $valid->set_rules('declaredFreightValue', '"Объявленная ценность груза"', 'required');
        $valid->set_rules('sealsNumber', '"Пломбы отправителя"', 'required');
        $valid->set_rules('seals', '"Пломбы"', 'required');

        $valid->set_rules('massMethodDeterm', '"Способ определения массы"', 'required');


        if (!$valid->run()) {
            $this->_send_json(array(
                'success' => 0,
                'error' => $valid->error_array()
            ));

            return false;
        }

        if ($valid->run()) {
            $id = $this->SmgsModel->insert($_POST);

            $this->_send_json(array(
                'success' => 1,
                'id' => $id
            ));

            $this->load->library('zip');

            $model = $this->SmgsModel->get_one_by_id($id);

            $smgs_donor = dirname(BASEPATH) . "/files/smgs.xml";
            $save_to = dirname(BASEPATH) . "/files/generated/" . 'smgs_' . $model->id . '.doc';

            $success = $this->modelToXml($smgs_donor, $save_to, $model);

            if ($success) {
                $this->zip->read_file($save_to);
                $this->zip->archive(dirname(BASEPATH) . "/files/generated/smgs_zip_" . $model->id . ".zip");

                unlink($save_to);
            }
        }
    }

}
