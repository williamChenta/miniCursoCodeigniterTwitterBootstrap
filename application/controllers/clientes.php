<?php

if (!defined('BASEPATH'))
  die();

class Clientes extends Main_Controller {

  public function index() {

    //carrega a sessão do usuário para verificar se o mesmo tem permissão a esta página. senão, redireciona para login
    $arr_sessao = $this->session->all_userdata();

    if ($arr_sessao['grupo'] <> 1) {
      redirect('login');
    }

    /***
     * verifica se quer incluir.
     * pega todos os dados post. 
     * o primeiro parâmetro indica o nome do campo post. se estiver null retorna todos os dados post
     * o segundo parâmetro indica que é para sanitizar os dados. XSS filter
     */
    $post = $this->input->post(NULL, TRUE);
    if ($post && $post['hdnAcao'] == 'salvar' && empty($post['hdnId'])) {
      unset($post['hdnAcao']);
      unset($post['hdnId']);
      $this->incluiCliente($post);
    }

    //verifica se quer alterar
    $post = $this->input->post(NULL, TRUE);
    if ($post && $post['hdnAcao'] == 'salvar' && !empty($post['hdnId'])) {
      unset($post['hdnAcao']);
      $this->alteraCliente($post);
    }

    //verifica se quer excluir
    $post = $this->input->post(NULL, TRUE);
    if ($post && $post['hdnAcao'] == 'excluir') {
      $this->excluiCliente($post);
    }

    //lista os clientes cadastrados
    $data['linhas'] = $this->listaClientes();

    //carrega as views
    $this->load->view('include/header');
    $this->load->view('clientes_view', $data);
    $this->load->view('include/footer');
  }

  public function listaClientes() {
    $this->load->model('Clientes_model', '', TRUE);
    return $this->Clientes_model->getClientes();
  }

  public function incluiCliente($post) {
    $this->load->model('Clientes_model', '', TRUE);
    $this->Clientes_model->setCliente($post);
  }

  public function alteraCliente($post) {
    $this->load->model('Clientes_model', '', TRUE);
    $this->Clientes_model->upCliente($post);
  }

  public function excluiCliente($post) {
    $this->load->model('Clientes_model', '', TRUE);
    $this->Clientes_model->delCliente($post['hdnId']);
  }

  public function ajxCarregaCliente() {
    $post = $this->input->post(NULL, TRUE);
    $this->load->model('Clientes_model', '', TRUE);
    $query = $this->Clientes_model->getCliente($post['hdnId']);

    foreach ($query->result() as $row) {
      $arr = array(); //Declaração da variável array
      $arr['id'] = $row->id_cliente;
      $arr['nome'] = $row->nome;
      $arr['endereco'] = $row->endereco;
      $arr['telefone'] = $row->telefone;
      echo json_encode($arr);
    }
  }

}

/* End of file clientes.php */
/* Location: ./application/controllers/clientes.php */
