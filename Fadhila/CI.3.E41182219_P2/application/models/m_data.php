<?php 
    class M_data extends CI_Model{
        // berfungsi untuk mengakses database dengan tabel user
        function ambil_data(){
            return $this->db->get('user');
        }
    }


?>