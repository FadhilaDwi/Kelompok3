<?php

class Sisfo_model extends CI_model
{
    public function get_data($table)
    {
        return $this->db->get($table);
    }//function ini digunakan untuk mendapatkan data dari database
    public function insert_data($data, $table)
    {
        return $this->db->insert($table, $data);
    }//function ini digunakan untuk memasukkan data ke dalam database
    public function update_data()
    {
        $data = [

            "nama" => $this->input->post('name'),
            "alamat" => $this->input->post('address'),
            "email" => $this->input->post('email'),
            "tempat_lahir" => $this->input->post('birthplace'),
            "tanggal_lahir" => $this->input->post('tanggal'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('pengajar', $data);
    }//function ini digunakan untuk mengupdate data pilihan yang berada di database
    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }//function ini digunakan untuk menghapus data dari database
    function lihat($where, $table)
    {
        $this->db->where($where);
        $this->db->get($table);
    }//function ini digunakan untuk mendapatkan data dari database
    public function getDataById($id)
    {
        return $this->db->get_where('pengajar', ['id' => $id])->row_array();
    }//function ini digunakan untuk mendapatkan data dari database berdasarkan id yang sudah diinisialisai
}
