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
        $usuarioLocado = $this->session->userdata('usuario_logado');
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

    public function mostra($idproduto) {
        
//        Caso queira utilizar get, mas nesta funcao o id esta sendo passado comom parametro 
//        $idproduto = $this->input->get("id"); 
//        
        $this->load->model("produtos_model");
        $produto = $this->produtos_model->busca($idproduto);
        $dados = array("produtohtml" => $produto);
        
        $this->load->helper("typography");
        $this->load->view("produtos/mostra", $dados);
    }

}
