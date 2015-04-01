<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Error extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function error_404() {
        set_status_header(404);

        ob_start();

        include(APPPATH . 'views/404.tpl');

        $buffer = ob_get_contents();

        ob_end_clean();

        echo $buffer;

        exit;
    }

}