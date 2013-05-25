<?php

if (!defined('BASEPATH'))
    die();

class Fabricantes extends Main_Controller {

    public function index() {

        //verifica se quer incluir
        $post = $this->input->post(NULL, TRUE);
        if ($post && $post['hdnAcao'] == 'salvar' && empty($post['hdnId'])) {
            unset($post['hdnAcao']);
            unset($post['hdnId']);
            $this->incluiFabricante($post);
        }

        //verifica se quer alterar
        $post = $this->input->post(NULL, TRUE);
        if ($post && $post['hdnAcao'] == 'salvar' && !empty($post['hdnId'])) {
            unset($post['hdnAcao']);
            $this->alteraFabricante($post);
        }

        //verifica se quer excluir
        $post = $this->input->post(NULL, TRUE);
        if ($post && $post['hdnAcao'] == 'excluir') {
            $this->excluiFabricante($post);
        }        

        //lista os fabricantes cadastrados
        $data['linhas'] = $this->listaFabricantes();

        //carrega as views
        $this->load->view('include/header');
        $this->load->view('fabricantes_view', $data);
        $this->load->view('include/footer');
    }

    public function listaFabricantes() {
        $this->load->model('Fabricantes_model', '', TRUE);
        return $this->Fabricantes_model->getFabricantes();
    }

    public function incluiFabricante($post) {
        $this->load->model('Fabricantes_model', '', TRUE);
        $this->Fabricantes_model->setFabricante($post);
    }

    public function alteraFabricante($post) {
        $this->load->model('Fabricantes_model', '', TRUE);
        $this->Fabricantes_model->upFabricante($post);
    }

    public function excluiFabricante($post) {
        $this->load->model('Fabricantes_model', '', TRUE);
        $this->Fabricantes_model->delFabricante($post['hdnId']);
    }

    public function ajxCarregaFabricante() {
        $post = $this->input->post(NULL, TRUE);
        $this->load->model('Fabricantes_model', '', TRUE);
        $query = $this->Fabricantes_model->getFabricante($post['hdnId']);

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

/* End of file fabricantes.php */
/* Location: ./application/controllers/fabricantes.php */
