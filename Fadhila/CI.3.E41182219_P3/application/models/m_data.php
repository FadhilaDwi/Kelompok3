<?php 
 
class M_data extends CI_Model{
  /*berfungsi untuk mengambil data dari database dengan nama tabel untuk dijadikan parameter*/
	function tampil_data(){
		return $this->db->get('user');
    }
    
    /*untuk memasukkan data ke dalam database*/
    function input_data($data,$table){
		$this->db->insert($table,$data);
    }
    	/*pada fungsi hapus data terdapat fungsi where untuk menyeleksi query dan hapus data */
    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    /*untuk mengambil data dari database*/
    function edit_data($where,$table){		
        return $this->db->get_where($table,$where);
  }
  /*memasukkan id yang sudah di edit untuk di update dalam database */
    function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}