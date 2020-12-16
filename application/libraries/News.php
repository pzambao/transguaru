<?php
include_once APPPATH . 'libraries/util/CI_Object.php';

class News extends CI_Object
{
    public function lista()
    {
        $rs = $this->db->get_where('news');
        // echo $this->db->last_query();
        $result = $rs->result_array();
        return $result;
    }

    public function cria_usuario($data)
    {
        $this->db->insert('news', $data);
    }
    public function user_data($id2)
    {
        $cond = array('id' => $id2);
        $rs = $this->db->get_where('news', $cond);
        return $rs->row_array();
    }
    public function edita_usuario($data, $id2)
    {
        $this->db->update('news', $data, "id = $id2");
    }
    public function delete($id2)
    {
        $cond = array('id' => $id2);
        $this->db->delete('news', $cond); 
    }
}
 