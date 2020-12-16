<?php 

class imagens extends CI_Controller {

	public function authenticationIsRequired() {
        if(!$this->usuarioIsLogged()) redirect('cliente/inicio');
	}
	public function usuarioIsLogged() {
        $usuario_logado = $this->session->userdata('usuario_logado');
        return $usuario_logado != null;
    }

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->database();
		/* ------------------ */
		
		$this->load->helper('url'); //Just for the examples, this is not required thought for the library
		
		$this->load->library('image_CRUD');
	}
	
	function _example_output($output = null)
	{
		$this->load->view('example.php',$output);	
	}
	
	function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}	
	
	function admfrota()
	{
		$this->authenticationIsRequired();

		$this->load->view('common/header.php');
		$this->load->view('exemplo/navbar.php'); 
	
		$image_crud = new image_CRUD();
	
		$image_crud->set_primary_key_field('id');
		$image_crud->set_url_field('url');
		$image_crud->set_title_field('title');
		$image_crud->set_table('example_4')
		->set_ordering_field('priority')
		->set_image_path('assets/uploads');
			
		$output = $image_crud->render();
	
		$this->_example_output($output);

		$this->load->view('common/footer.php');
		$this->load->view('exemplo/footer.php');

	}
	
	function frota()
	{
		$this->load->view('common/header.php');
		$this->load->view('exemplo/navbar.php');
		
		$image_crud = new image_CRUD();
		
		$image_crud->unset_upload();
		$image_crud->unset_delete();
		
		$image_crud->set_primary_key_field('id');
		$image_crud->set_url_field('url');
		$image_crud->set_table('example_4')
		->set_image_path('assets/uploads');
		
		$output = $image_crud->render();
		
		$this->_example_output($output);	
		
		$this->load->view('common/footer.php');
		$this->load->view('exemplo/footer.php');
	}
}