<?php

if (!defined('BASEPATH'))
  die();

class William extends Main_Controller {

  public function index() {
    $this->load->view('include/header');
    $this->load->view('include/footer');
  }
  
  public function teste() {
    $this->load->view('include/header');
    
    $search = $this->input->post();
    $data['resultado'] = $search['txtNum1'] + $search['txtNum2'];
    
    $this->load->view('teste', $data);
    $this->load->view('include/footer');
  }

}

/* End of file william.php */
/* Location: ./application/controllers/william.php */
