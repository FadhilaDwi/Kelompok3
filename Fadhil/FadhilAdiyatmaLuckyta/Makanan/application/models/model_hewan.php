<?php

class model_hewan extends CI_Model{

        public function tampil_data(){

        return $this->db->get('admin');
    }

    public function tambah_admin($data,$table){

        $this->db->insert($table,$data);
    }

    public function edit_admin($where,$table){

        return $this->db->get_where($table,$where);
    }

    public function update_admin($where,$data,$table){

        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function hapus_admin($where,$table){

        $this->db->where($where);
        $this->db->delete($table);        
    }
}