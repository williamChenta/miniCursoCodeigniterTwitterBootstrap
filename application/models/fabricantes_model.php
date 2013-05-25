<?php

class Fabricantes_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function getFabricantes() {
    $query = $this->db->get('fabricantes');    
    return $query;
  }

  function setFabricante($arrCli) {
    $this->db->insert('fabricantes', $arrCli);
  }

  function upFabricante($arrCli) {
    $this->db->where('id_fabricante', $arrCli['hdnId']);
    unset($arrCli['hdnId']);
    $this->db->update('fabricantes', $arrCli); 
  }

  function delFabricante($id) {
    $this->db->delete('fabricantes', array('id_fabricante' => $id));
  }
  
  function getFabricante($id) {
      $query = $this->db->get_where('fabricantes', array('id_fabricante' => $id));
      return $query;
  }
}