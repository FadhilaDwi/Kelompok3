<?php 

class M_report extends CI_Model{
     //fungsi untuk menampilkan data kas_keluar
    function tampil_data(){
        return $this->db->get('komentar');
    }
}




?>