<?php 
 
class mdata extends CI_Model{
  /*berfungsi untuk mengambil data dari database dengan nama tabel untuk dijadikan parameter*/
	function tampil_data(){
		return $this->db->get('pendaftaran');
    }
    
}