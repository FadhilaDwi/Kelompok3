<?php 

class M_login extends CI_Model{
    //fungsi untuk melakukan pengecekan pada tabel dan data yang dimasukkan
    function cek_login($table, $where){
        return $this->db->get_where($table,$where);
    }
    public function buatakun($data,$table){

        $this->db->insert($table,$data);
    }
}
   

?>