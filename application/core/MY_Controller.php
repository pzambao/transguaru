<?php

class MY_Controller extends CI_Controller {

    public function __construct(){ 
        parent::__construct();
    }

    function show($html){
        $aux = $this->load->view('common/header.php', null, true);  
        $aux .= $html; 
        $aux .= $this->load->view('common/footer.php', null, true);
        echo $aux;
    }
    
    
}

