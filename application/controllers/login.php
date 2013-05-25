<?php

if (!defined('BASEPATH'))
  die();

class Login extends Main_Controller {

  public function index() {

    $data['status_login'] = '';

    $post = $this->input->post(NULL, TRUE);
    if ($post) {

      $query = $this->logar($post);

      if ($query->num_rows) {

        foreach ($query->result() as $row) {
          $userInfo = array('nome' => $row->nome,
                            'email' => $row->email,
                            'grupo' => $row->id_grupo);
        }

        $this->session->set_userdata($userInfo);
        redirect('clientes');
      } else {
        $data['status_login'] = "Login inválido";
      }
    }

    //carrega as views
    $this->load->view('include/header');
    $this->load->view('login_view', $data);
    $this->load->view('include/footer');
  }

  public function logar($post) {
    $this->load->model('Login_model', '', TRUE);
    return $this->Login_model->getLogin($post);
  }

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
