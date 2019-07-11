<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

    public function index() {

        //o banco de dados esta sendo chamado automaticamente pelo autoload
        $this->load->model("produtos_model");

        $produtos = $this->produtos_model->buscaTodos();

        $dados = array("produtos" => $produtos);

        $this->load->helper(array("currency"));

        $this->load->view("produtos/index.php", $dados);
    }

    public function formulario() {
        $this->load->view("produtos/formulario");
    }

    public function novo() {
        $usuarioLocado= $this->session->userdata('usuario_logado');
        $produto = array(
            "nome" => $this->input->post("nome"),
            "descricao" => $this->input->post("descricao"),
            "preco" => $this->input->post("preco"),
            "idusuario" => $usuarioLocado['idusuario']
        );
        $this->load->model("produtos_model");
        $this->produtos_model->salva($produto);
        $this->session->set_flashdata("success", "Produtos cadastrado com sucesso!");
        redirect('/');
    }

}
