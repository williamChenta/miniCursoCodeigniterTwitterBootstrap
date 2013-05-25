<?php

class Login_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function getLogin($post) {
      $query = $this->db->get_where('usuarios', array('login' => $post['login'], 'senha' => $post['senha']));
      return $query->num_rows;
  }
}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */