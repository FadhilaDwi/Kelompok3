<?php

    class M_pelanggan extends CI_Model{
        
        public function tampil_data($table){
            return $this->db->get($table);
        }

        public function tampil_menu($where, $table){
            $this->db->where('date(hari)' , date("Y-m-d",strtotime('now')));
            return $this->db->get_where($table, $where);
        }

        public function tampil_baru(){
            return $this->db->get('detail_menu');
        }

        public function find($where, $table){
            // $this->db->where('date(tgl_set)' , date("Y-m-d",strtotime('now')));
            $this->db->limit(1);
            // $this->db->order_by('id_mitra', 'desc');
            return $this->db->get_where($table, $where);
        }
        
        public function tampil($where,$table){
            return $this->db->get_where($table, $where);
        }
    }




?>