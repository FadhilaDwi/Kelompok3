<?php 

class M_data extends CI_Model{
    // berfungsi mengambil data dari database dengan tabel user.
	function tampil_data(){
		return $this->db->get('user');
    }
    // digunakan untuk menginput data ke dalam database
    function input_data($data,$table){
        $this->db->insert($table,$data);
    }

    function hapus_data($where,$table){
        // fungsi where untuk seleksi query yang ingin dihapus
        $this->db->where($where);
        // fungsi delete untuk menghapus record
        $this->db->delete($table);
    }
    // mengambil data dari database
    function edit_data($where,$table){
        return $this->db->get_where($table,$where);
    }
    // berfungsi untuk mengupdate data
    function update_data($where, $data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}