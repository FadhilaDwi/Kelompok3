<?php 

class M_login extends CI_Model{
    //fungsi untuk melakukan pengecekan pada tabel dan data yang dimasukkan
    function cek_login($table, $where){
        return $this->db->get_where($table,$where);
    }
    public function buat_kode()   {

        $this->db->select('RIGHT(pelanggan.id_pelanggan,4) as kode', FALSE);
        $this->db->order_by('id_pelanggan','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('pelanggan');      //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
         //jika kode ternyata sudah ada.      
         $data = $query->row();      
         $kode = intval($data->kode) + 1;    
        }
        else {      
         //jika kode belum ada      
         $kode = 1;    
        }

        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = "P".$kodemax;    // hasilnya ODJ-9921-0001 dst.
        return $kodejadi;  
  }
    function buatakun($data,$table){    

       return $this->db->insert($table,$data);
    }
  function cekuser($table,$where){
      return $this->db->get_where($table,$where);
  } 
  public function update($where, $data, $table){
    $this->db->where($where);
    $this->db->update($table, $data);
} 
   
}
   

?>