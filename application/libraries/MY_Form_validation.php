<?php

class MY_Form_validation extends CI_Form_validation {

    function __construct() {
        parent::__construct();
    }

    public function error_array() {
        // No errrors, validation passes!
        if (count($this->_error_array) === 0) {
            return '';
        }

        return $this->_error_array;
    }

}
