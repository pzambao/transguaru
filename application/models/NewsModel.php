<?php
include_once APPPATH.'libraries/News.php';
include_once APPPATH.'libraries/component/Table.php';

//model são: classes geradoras de dados que serão exibidos nas views
class NewsModel extends CI_Model{
    
    public function gera_tabela(){
        
        $news = new News();
        $data = $news->lista();
        $label = ['Nº','Data','Nome','E-mail'];
        $table = new Table($data, $label);
        $table->setUrlsActions([
            'url_delete' => 'newsLetter/deletar',
        ]);
        $table->addHeaderClass('black yellow-text text-center');
        $table->usezebra();
        
        $table->useborder();
        $table->smallrow();
        $table->useactionbutton();
        return $table->getHtml();
    }
   

    public function salva_usuario2(){
        if(sizeof($_POST) == 0) return;
        //print_r($_POST);

        //definir regras de validação //trim (retira todos os espaços do campo)
        $this->form_validation->set_rules('nome','Nome','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email','E-mail','trim|required|min_length[3]|max_length[50]|required|valid_email|is_unique[news.email]'); 

        //fazer a validação
        if( $this->form_validation->run()){
            //passou na validação
             //executar a ação do formulário
        
        $data = $this->input->post();
        $news = new News(); 
        $rows_affected = $news->cria_usuario($data);

        if($rows_affected) $this->session->set_flashdata('success', 'Seu e-mail foi cadastrado com sucesso!');
        
        
        } 
         
        //else{

           // echo validation_errors();
       // }
       

        //n deve ser feito aqui, deve ser feito no libraries
       // $this->db->insert('pessoa',$data);
    }
    public function edita_usuario($id2){
        
        if(sizeof($_POST) == 0) return;
       
        $data = $this->input->post();
        $news = new News();
        $news->edita_usuario($data, $id2);
        redirect('cliente/lista2');

    }
    public function read($id2){
        $news = new News();
        return $news->user_data($id2);

    }
    public function deletar($id2){
        $news = new News();
        return $news->delete($id2);
    }
}


  