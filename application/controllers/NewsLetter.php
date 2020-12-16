<?php

class NewsLetter extends CI_Controller {

    public function authenticationIsRequired() {
        if(!$this->usuarioIsLogged()) redirect('cliente/inicio');
    }

    public function usuarioIsLogged() {
        $usuario_logado = $this->session->userdata('usuario_logado');
        return $usuario_logado != null;
    }

    public function deletar($id){
        $this->load->model('NewsModel', 'model');
        $this->model->deletar($id);
        redirect('newsLetter/lista');
    }

    public function lista(){
        $this->authenticationIsRequired();
        
        $this->load->view('common/header.php');
        $this->load->view('exemplo/navbar.php');

        $this->load->model('NewsModel', 'model');
        $data['tabela'] = $this->model->gera_tabela();
        $data['title'] = "Lista de Cadastro";
        $this->load->view('common/table.php', $data);
        
        $this->load->view('exemplo/footer.php');
        $this->load->view('common/footer.php'); 

    }

}
