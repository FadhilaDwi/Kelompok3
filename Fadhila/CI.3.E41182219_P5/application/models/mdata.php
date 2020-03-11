<?php 
 
class mdata extends CI_Model{
  /*berfungsi untuk mengambil data dari database dengan nama tabel untuk dijadikan parameter*/
  function tampil_data(){
		return $this->db->get('pendaftaran');
    }

    function input_data($data,$table){
      $this->db->insert($table,$data);
      }
    
    
}