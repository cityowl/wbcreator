<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Boot extends MY_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->auth->access_allowed()) {
            redirect("auth");
        }
    }

    protected function loadLibs() {
        $this->load->library('zip');
        $this->load->helper('file');
    }

    public function index() {
        $this->render("main", array(
            "navigation" => $this->getTpl("navigation"),
            "title" => "Main / WBCreator 1.2",
            "smgs_list" => $this->SmgsModel->get(20)
        ));

        return;
        $filepath = dirname(BASEPATH) . "/files/SMGS.doc";

        $xml = simplexml_load_file($filepath);

        $id = $xml->xpath("//*[@id='customtest']");
        $id[0][0] = 'Оригинал накладной';
        // save the values in a new xml
        $xml->asXML($filepath);
//        var_dump($id[0]->nodeValue);
//        var_dump($id[0]->asXML());
    }

    public function about() {
        $this->render("about", array(
            "navigation" => $this->getTpl("navigation"),
            "title" => "About / WBCreator 1.2"
        ));
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */