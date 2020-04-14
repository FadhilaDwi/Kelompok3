<?php 
 
class M_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
}
//di function cek_login kita mengecek data yang akan digunakan  untuk login sudah benar atau tidak
//sesudah itu akan di panggil menuju controller login.php
?>
