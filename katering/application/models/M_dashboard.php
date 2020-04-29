<?php 

class M_dashboard extends CI_Model{
     //fungsi untuk menampilkan data kas_keluar
    function tampil_data(){
        return $this->db->get('admin');
    }

    //fungsi untuk menambahkan data ke dalam tabel yang diinginkan
    function tambah_data($data, $table){
        $this->db->insert($table, $data);
    }

    //fungsi untuk menghapus data yang diinginkan berdasar id
    function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    //fungsi untuk mengedit data berdasarkan id yang diinginkan kemudian melakukan update
    function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}




?>