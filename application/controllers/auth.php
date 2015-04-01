<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends MY_Controller {

    public function index() {
        if ($this->auth->is_logged_in()) {
            redirect("/");
        } else {
            $this->render("auth", array(), false);
        }
    }

    public function login() {
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        $this->form_validation->set_rules('login', 'Логин', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'Пароль', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array(
                "error" => 1,
                "error_string" => $this->form_validation->error_string()
            ));
        } else {
            if ($hash = $this->auth->check_auth($this->form_validation->set_value("login"), $this->form_validation->set_value("password"))) {
                $this->auth->set_session($this->form_validation->set_value("login"), $hash);

                echo json_encode(array(
                    "error" => 0
                ));
            } else {
                echo json_encode(array(
                    "error" => 1,
                    "error_string" => '<p class="alert alert-danger">Неправильный логин или пароль</p>'
                ));
            }
        }
    }

    public function logout() {
        $this->auth->logout();

        redirect("/auth");
    }

}
