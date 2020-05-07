<?php

    class M_pelanggan extends CI_Model{
        
        public function tampil_data(){
            return $this->db->get('mitra');
        }

        public function tampil_menu($where, $table){
            return $this->db->get_where($table, $where);
        }
    }



?>