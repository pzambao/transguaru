<?php
include_once APPPATH.'libraries/Pessoa.php';
include_once APPPATH.'libraries/component/Table.php';

function dataBR($umadata) {

    $brdata = substr($umadata,8,2)."/".substr($umadata,5,2)."/".substr($umadata,0,4);

    return $brdata;

}
//model são: classes geradoras de dados que serão exibidos nas views
class ClienteModel extends CI_Model{
    
    public function gera_tabela(){
        
        $pessoa = new Pessoa();
        $data = $pessoa->lista();
        $label = ['Nº','Data','Nome','E-mail','Telefone','Partida','Chegada','Detalhes'];
        $table = new Table($data, $label);
        $table->setUrlsActions([
            'url_delete' => 'cliente/deletar',
            'url_edit' => 'cliente/editar',
        ]);
        $table->addHeaderClass('black yellow-text text-center');
        $table->usezebra();
        $table->useborder();
        $table->smallrow();
        $table->useactionbutton();
        return $table->getHtml();
    }
  
    public function detalhe($id){

        $customer = new Customer();
        $cliente = $customer->lista();
       
        return $cliente[$id - 1];
    }
    public function salva_usuario(){
        if(sizeof($_POST) == 0) return;
        //print_r($_POST);

        //definir regras de validação //trim (retira todos os espaços do campo)
        $this->form_validation->set_rules('nome','Nome','required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email','E-mail','trim|required|min_length[3]|max_length[50]|required|valid_email');
        $this->form_validation->set_rules('telefone','Telefone', 'trim|min_length[11]|max_length[11]');
        $this->form_validation->set_rules('partida','Nome','required|min_length[2]|max_length[80]');
        $this->form_validation->set_rules('chegada','Nome','required|min_length[2]|max_length[80]');
        $this->form_validation->set_rules('detalhes','Nome','required|min_length[2]|max_length[120]');

        //fazer a validação
        if( $this->form_validation->run()){
            //passou na validação
             //executar a ação do formulário
        
        $data = $this->input->post();
        $pessoa = new Pessoa();
        $rows_affected = $pessoa->cria_usuario($data);

        if($rows_affected) $this->session->set_flashdata('success', 'Pedido de orçamento enviado com sucesso');
        
        
        } 
        //else{

           // echo validation_errors();
       // }
       

        //n deve ser feito aqui, deve ser feito no libraries
       // $this->db->insert('pessoa',$data);
    }
    public function edita_usuario($id){
        
        if(sizeof($_POST) == 0) return;
       
        $data = $this->input->post();
        $pessoa = new Pessoa();
        $pessoa->edita_usuario($data, $id);
        redirect('cliente/lista');

    }
    public function read($id){
        $pessoa = new Pessoa();
        return $pessoa->user_data($id);

    }
    public function deletar($id){
        $pessoa = new Pessoa();
        return $pessoa->delete($id);
    }
} 


 