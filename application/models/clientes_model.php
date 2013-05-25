<?php

class Clientes_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function getClientes() {
    $query = $this->db->get('clientes');    
    return $query;
  }

  function setCliente($arrCli) {
    $this->db->insert('clientes', $arrCli);
  }

  function upCliente($arrCli) {
    $this->db->where('id_cliente', $arrCli['hdnId']);
    unset($arrCli['hdnId']);
    $this->db->update('clientes', $arrCli); 
  }

  function delCliente($id) {
    $this->db->delete('clientes', array('id_cliente' => $id));
  }
  
  function getCliente($id) {
      $query = $this->db->get_where('clientes', array('id_cliente' => $id));
      return $query;
  }
}