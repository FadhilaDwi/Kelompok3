<?php 

class M_profil extends CI_Model{

    function add($data,$table){
		$this->db->insert($table,$data);
    }

    public function update($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function tampil($where, $table){
        return $this->db->get_where($table, $where);
    }

}

?>