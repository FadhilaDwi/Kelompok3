<?php

class model_hewan extends CI_Model{
    

   

    public function tampil_data(){

        return $this->db->get('admin');
    }
    public function tmpmitra(){

        return $this->db->get('mitra');
    }

    public function buat_kode()   {

        $this->db->select('RIGHT(mitra.id_mitra,4) as kode', FALSE);
        $this->db->order_by('id_mitra','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('mitra');      //cek dulu apakah ada sudah ada kode di tabel.    
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
        $kodejadi = "M".$kodemax;    // hasilnya ODJ-9921-0001 dst.
        return $kodejadi;  
  }

    public function tambah_mitra($data,$table){

        $this->db->insert($table,$data);
    }

    public function edit_hewan($where,$table){

        return $this->db->get_where($table,$where);
    }

    public function update_data($where,$data,$table){

        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function hapus_data($where,$table){

        $this->db->where($where);
        $this->db->delete($table);        
    }
}