<?php 
 
class mlogin extends CI_Model{
  /*berfungsi untuk mengambil data dari database dengan nama tabel untuk dijadikan parameter*/
  function cek_login($table,$where){		
    return $this->db->get_where($table,$where);
}	

  
 
}