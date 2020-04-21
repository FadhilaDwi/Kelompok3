<?php 
 
class M_data extends CI_Model{
	function tampil_data(){
		//berfungsi untuk mengambil data dari database yang bernama user yang nantik akan di panggil di v_tampil
		return $this->db->get('user');
	}
 
	function input_data($data,$table){
		//menampilkan data dari database, dan menambahkan data dan di inputkan ke database
		$this->db->insert($table,$data);
	}
 
	function hapus_data($where,$table){
		//menampilkan data dari database, dan menghapus data dengan menambahkan fungsi hapus_data
		$this->db->where($where);
		$this->db->delete($table);
	}
 
	function edit_data($where,$table){		
		//menampilkan data dari database, dan merubah data yang sudah di inputkan dengan menambahkan fungsi edit_data
		return $this->db->get_where($table,$where);
	}
 
	function update_data($where,$data,$table){
		//menampilkan data dari database, dan update ini berfungsi sebagai memperbarui data yang sudah kita perbarui atau penambahan data
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}