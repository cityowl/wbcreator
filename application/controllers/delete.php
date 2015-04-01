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
        $this->SmgsModel->delete_by_id($_POST['smgs_id']);

        $this->_send_json(array(
            'success' => 1
        ));
    }

}
