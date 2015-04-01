<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_WBCreator
 *
 * @author andrei.zhamoida
 */
class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function getTpl($tpl) {
        return $this->load->view($tpl . ".tpl", '', true);
    }

    protected function _send_json($data) {
        header("Content-Type:application/json");

        echo json_encode(array("jsonrpc" => "2.0", "result" => $data));
    }

    public function render($template, $data = array(), $wrap = true) {
        if (!file_exists(APPPATH . '/views/' . $template . '.tpl')) {
            throw new Exception("Cannot find template");
        }

        if ($wrap === true) {
            $this->load->view('header.tpl', $data);
            $this->load->view($template . ".tpl", $data);
            $this->load->view('footer.tpl', $data);
        } else {
            $this->load->view($template . ".tpl", $data);
        }
    }

}
