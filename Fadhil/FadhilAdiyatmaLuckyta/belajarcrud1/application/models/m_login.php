<?php 
 //membuat class yang bernama M_login yang berada dalam models
class M_login extends CI_Model{	
	function cek_login($table,$where){	
        //membuat nama fungsi untuk login yaitu cek_login yang akan kita gunakan di controller dan view	
		return $this->db->get_where($table,$where);
	}	
}