<?php
include_once APPPATH . 'libraries/util/CI_Object.php';

class Pessoa extends CI_Object
{
    public function lista()
    {
        $rs = $this->db->get_where('pessoa');
        // echo $this->db->last_query();
        $result = $rs->result_array();
        return $result;
    }

    public function cria_usuario($data)
    {
        $this->db->insert('pessoa', $data);
    }
    public function user_data($id)
    {
        $cond = array('id' => $id);
        $rs = $this->db->get_where('pessoa', $cond);
        return $rs->row_array();
    }
    public function edita_usuario($data, $id)
    {
        $this->db->update('pessoa', $data, "id = $id");
    }
    public function delete($id)
    {
        $cond = array('id' => $id);
        $this->db->delete('pessoa', $cond);
    }
}
 