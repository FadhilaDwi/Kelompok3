<?php

    class M_pelanggan extends CI_Model{
        
        public function tampil_data(){
            return $this->db->get('mitra');
        }

        public function tampil_menu($where, $table){
            $this->db->where('date(tgl_set)' , date("Y-m-d",strtotime('now')));
            return $this->db->get_where($table, $where);
        }

        public function tampil_baru(){
            return $this->db->get('detail_menu');
        }
    }




?>