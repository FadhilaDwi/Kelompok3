<?php 

class M_pelanggan extends CI_Model{
     //fungsi untuk menampilkan data kas_keluar
    function tampil_data(){
        return $this->db->get('pelanggan');
    }

    function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}




?>