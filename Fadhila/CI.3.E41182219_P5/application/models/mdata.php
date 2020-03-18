<?php 
 
class mdata extends CI_Model{
  /*berfungsi untuk mengambil data dari database dengan nama tabel untuk dijadikan parameter*/
  function tampil_data(){
		return $this->db->get('pendaftaran');
    }
//untuk input data
    function input_data($data,$table){
      $this->db->insert($table,$data);
      }
//hapus data 
      function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
   //edit data 
    function edit_data($where,$table){		
      return $this->db->get_where($table,$where);
  }
//update data yang sudah di edit
  function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
  }
//fungsi untuk melakukan cek login dari database untuk menyesuaikan dari password dan username yang sudah di masukkan
  function cek_login($table,$where){		
    return $this->db->get_where($table,$where);
}	


 
}