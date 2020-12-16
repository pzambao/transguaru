<?php

class Cliente extends CI_Controller
{

    private static $LOGIN_DEFAULT = 'CesarChefe';
    private static $PASSWORD_DEFAULT = '@meen10';

    public function authenticationIsRequired()
    {
        if (!$this->usuarioIsLogged()) redirect('cliente/inicio');
    }
    public function usuarioIsLogged()
    {
        $usuario_logado = $this->session->userdata('usuario_logado');
        return $usuario_logado != null;
    }

    public function inicio()
    {
        $this->load->view('common/header.php');
        $this->load->view('exemplo/navbar.php');

        $this->load->view('exemplo/corpo.php');
        $this->load->model('NewsModel', 'model');
        $this->model->salva_usuario2();

        $this->load->view('cliente/news_cliente.php');

        $this->load->view('exemplo/footer.php');
        $this->load->view('common/footer.php');
    }

    public function empresa()
    {
        $this->load->view('common/header.php');
        $this->load->view('exemplo/navbar.php');

        $this->load->view('exemplo/empresa.php');

        $this->load->view('exemplo/footer.php');
        $this->load->view('common/footer.php');
    }

    public function historia()
    {
        $this->load->view('common/header.php');
        $this->load->view('exemplo/navbar.php');

        $this->load->view('exemplo/sobre.php');

        $this->load->view('exemplo/footer.php');
        $this->load->view('common/footer.php');
    }

    public function frota()
    {
        $this->load->view('common/header.php');
        $this->load->view('exemplo/navbar.php');

        $this->load->view('exemplo/truckers.php');

        $this->load->view('exemplo/footer.php');
        $this->load->view('common/footer.php');
    }

    public function cadastro()
    {
        $this->load->view('common/header.php');
        $this->load->view('exemplo/navbar.php');

        $this->load->model('ClienteModel', 'model');
        $this->model->salva_usuario();

        $this->load->view('cliente/form_cliente.php');


        $this->load->view('exemplo/footer.php');
        $this->load->view('common/footer.php');
    }

    public function admin()
    {
        $this->authenticationIsRequired();
        $this->load->view('common/header.php');
        $this->load->view('exemplo/navbar.php');

        // Componentizando a listagem da area administrativa
        $data['links'] = [
            ["url" => 'cliente/lista', 'title' => '<div class="card-counter primary"><i class="far fa-file-alt"><i id="pa">Orçamentos</i></i></div>'],
            ["url" => 'imagens/admfrota', 'title' => '<div class="card-counter primary"><i class="far fa-images"><i id="pa">Frota</i></i></div>'],
            ["url" => 'newsLetter/lista', 'title' => '<div class="card-counter primary"><i class="far fa-envelope"><i id="pa">Newsletter</i></i></div>']
        ];


        $this->load->view('exemplo/admin.php', $data);

        $this->load->view('exemplo/footer.php');
        $this->load->view('common/footer.php');
    }

    public function lista()
    {
        $this->authenticationIsRequired();

        $this->load->view('common/header.php');
        $this->load->view('exemplo/navbar.php');

        $this->load->model('ClienteModel', 'model');
        $data['tabela'] = $this->model->gera_tabela();
        $data['title'] = "Pedidos de orçamento";
        $this->load->view('common/table.php', $data);


        $this->load->view('exemplo/footer.php');
        $this->load->view('common/footer.php');
    }

    public function editar($id)
    {
        $this->load->view('common/header.php');
        $this->load->view('exemplo/navbar.php');

        //carregar os dados
        $this->load->model('ClienteModel', 'model');
        $data['user'] = $this->model->read($id);
        //exibir na pagina
        $this->load->view('cliente/form_cliente.php', $data);
        //modificar os dados e salvar
        $this->model->edita_usuario($id);

        $this->load->view('exemplo/footer.php');
        $this->load->view('common/footer.php');
    }

    public function deletar($id)
    {
        $this->load->model('ClienteModel', 'model');
        $this->model->deletar($id);
        redirect('cliente/lista');
    }


    public function login()
    {
        if (!$this->usuarioIsLogged()) {

            $this->load->view('common/header.php');
            $this->load->view('exemplo/navbar.php');

            $this->load->view('exemplo/login.php');

            $this->load->view('exemplo/footer.php');
            $this->load->view('common/footer.php');
        } else {
            redirect('cliente/admin');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('usuario_logado');

        redirect('cliente/inicio');
    }

    public function authenticar()
    {
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');

        if ($login == self::$LOGIN_DEFAULT && $senha == self::$PASSWORD_DEFAULT) {
            $this->session->set_userdata("usuario_logado", ["login" => $login, "senha" => $senha]);
            redirect('cliente/admin');
        } else {
            $this->session->set_flashdata('error', "Login ou senha invalidos");
            redirect('cliente/login');
        }
    }


    public function Maior()
    {
        $this->load->view('common/header.php');
        $this->load->view('exemplo/navbar.php');

        $this->load->view('exemplo/maior.php');

        $this->load->view('exemplo/footer.php');
        $this->load->view('common/footer.php');
    }

    public function restrita()
    {
        $this->load->view('common/header.php');
        $this->load->view('exemplo/navbar.php');

        $this->load->view('cliente/login.php');

        $this->load->view('exemplo/footer.php');
        $this->load->view('common/footer.php');
    }
}
