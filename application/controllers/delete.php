<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Delete extends MY_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->auth->access_allowed()) {
            redirect("auth");
        }
    }

    public function index() {
        
    }

    public function api() {
        $model = $this->SmgsModel->get_one_by_id($_POST['smgs_id']);

        $responce = array(
            'success' => 0
        );

        if (!empty($model)) {
            $responce['success'] = 1;

            $this->SmgsModel->delete_by_id($model->id);

            unlink(dirname(BASEPATH) . "/files/generated/smgs_zip_" . $model->id . ".zip");
        }

        $this->_send_json($responce);
    }

}
