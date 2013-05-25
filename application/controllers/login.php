<?php

if (!defined('BASEPATH'))
    die();

class Login extends Main_Controller {

    public function index() {

        //redirect('fabricantes');

        $post = $this->input->post(NULL, TRUE);
        if ($post) {
            $login_valido = $this->logar($post);
            if ($login_valido > 0) {
                echo "logou";
            }
            else {
                echo "login invalido";
            }
        }

        //carrega as views
        $this->load->view('include/header');
        $this->load->view('fabricantes_view');
        $this->load->view('include/footer');
    }

    public function logar($post) {
        $this->load->model('Login_model', '', TRUE);
        return $this->Login_model->getLogin($post);
    }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
