<?php 
include_once 'Component.php';

class Table extends Component{

    // atributo
    private $data;
    private $label;

    private $url_delete;
    private $url_edit;
    // classes do cabeçalho da tabela

    private $header_classes = '';

    // classes do corpo da tabela
    private $body_classes = '';
    
    private $use_action_button = false;
    

    // construtor
    function __construct(array $data, array $label){
        $this->label = $label;
        $this->data = $data;
    }

    // métodos
    function getHTML(){
        $html = "<div class='table-responsive'>";
        $html .= '<table class="table '.$this->body_classes.'">';
        $html .= $this->header();
        $html .= $this->body();
        $html .= '</table>';
        $html .= '</div>';
        return $html;

    }

public function addHeaderClass($class){

$this->header_classes .= $class.' ';

}

public function setUrlsActions(array $actions) {
    $this->url_delete = isset($actions['url_delete']) ? $actions['url_delete'] : null;
    $this->url_edit = isset($actions['url_edit']) ? $actions['url_edit'] : null;
}

    private function header(){
        $html = '<thead class="'.$this->header_classes.'"><tr>';
        foreach ($this->label as $name){
            $html .= '<th scope="col">'.$name.'</th>';
        }

        if ($this->use_action_button){
            $html .= '<th scope="col"></th>';
        }


        $html .= '</tr></thead>';
        return $html;

    }
    private function body(){
        $html = '<tbody>';

        foreach ($this->data as $row){
            $html .='<tr>';

            foreach($row as $cel){
                $html .= '<td>'.$cel.'</td>';
            }

            if($this->use_action_button){
                $html .='<td>'.$this->action_buttons($row['id']).'</td>';


            }
            $html .= '</tr>';

        }
        
        $html .= '</tbody>';
        return $html;

    }

    private function action_buttons($id){
        $html = "";
        if($this->url_edit){
            $html .='<a href="'.base_url($this->url_edit.'/'.$id).'">';
            $html .='<i title="Editar" class="fas fa-user-edit mr-2 blue-text"></i></a>';
        }
        if($this->url_delete) {
            $html .='<a href="'.base_url($this->url_delete.'/'.$id).'">';
            $html .='<i title="Deletar" class="fas fa-user-times mr-2 red-text"></i></a>';
        }
       return $html;

    }


    public function usezebra(){
        $this->body_classes .= 'table-striped ';
    }

    public function useborder(){
        $this->body_classes .= 'table-bordered ';
    }


    public function smallrow(){
        $this->body_classes .= 'table-sm ';
    }

    public function useactionbutton(){
        $this->use_action_button = true;
    }

}