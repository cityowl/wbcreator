<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CI_Auth {

    var $CI;
    var $users = array(
        "admin" => array(
            "password" => "admin",
            "hash" => "c3284d0f94606de1fd2af172aba15bf3"
        )
    );

    public function __construct() {
        $this->CI = & get_instance();
    }

    public function set_session($login, $hash) {
        $user = array(
            'login' => $login,
            'hash' => $hash,
            'is_logged_in' => TRUE
        );

        $this->CI->session->set_userdata($user);
    }

    public function is_logged_in() {
        return $this->CI->session->userdata('is_logged_in');
    }

    public function access_allowed() {
        return ($this->get_hash($this->CI->session->userdata("login")) === $this->CI->session->userdata('hash'));
    }

    public function check_auth($login, $password) {
        if ($this->is_user_exist($login) && $this->get_hash($login) === md5(md5($password))) {
            return $this->get_hash($login);
        }

        return false;
    }

    protected function get_hash($login) {
        return $this->users[$login]["hash"];
    }

    protected function is_user_exist($login) {
        if (!isset($this->users[$login])) {
            return false;
        } else {
            return true;
        }
    }

    public function logout() {
        $this->CI->session->sess_destroy();
    }

}
