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
    
    public function index() {
        $this->render("main", array(
            "navigation" => $this->getTpl("navigation"),
            "title" => "Main / WBCreator 1.0",
            "smgs_list" => $this->SmgsModel->get(20)
        ));
    }

    public function get($id) {
        $model = $this->SmgsModel->get_one_by_id($id);
        if (empty($model)) {
            return false;
        }

        $zippath = dirname(BASEPATH) . "/files/generated/smgs_zip_" . $model->id . ".zip";

        if (file_exists($zippath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($zippath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($zippath));
            readfile($zippath);

            exit;
        } else {
            $this->render("nofile", array(
                "title" => "File not found / WBCreator 1.2"
            ));
        }
    }

    public function about() {
        $this->render("about", array(
            "navigation" => $this->getTpl("navigation"),
            "title" => "About / WBCreator 1.0"
        ));
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */