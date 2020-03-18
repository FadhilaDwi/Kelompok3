<?php 

class M_kas extends CI_Model{
    //fungsi untuk menampilkan data kas_masuk
    function tampil_data(){
        return $this->db->get('kas_masuk');
    }

    //fungsi untuk menambahkan data ke dalam tabel yang diinginkan
    function tambah_data($data, $table){
        $this->db->insert($table, $data);
    }

    //fungsi untuk menampilkan data kas_keluar
    function show_data(){
        return $this->db->get('kas_keluar');
    }

    //fungsi untuk menjumlahkan semua data pada kolom uang berdasarkan tabel yang ditentukan 
    function get_sum($table){
        $this->db->select_sum('uang');
        return $this->db->get($table)->row();
    }


}


?>