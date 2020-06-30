<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kontak extends REST_Controller {
    // fungsi untuk memanggil database
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }
    //fungsi ini digunakan untuk mengambil data melalui database dan menampilkannya
    function index_get() {
        $id = $this->get('id'); 
        if ($id == '') {
            $kontak = $this->db->get('telepon')->result();
        } else {
            $this->db->where('id', $id);
            $kontak = $this->db->get('telepon')->result();
        }
        $this->response($kontak, 200);
    }

    function index_post() {
        // Mengubah data yang ada menjadi bentuk array
        $data = array(
                    'id'           => $this->post('id'),
                    'nama'          => $this->post('nama'),
                    'nomor'    => $this->post('nomor'));
        //memasukkan data ke dalam database 
        $insert = $this->db->insert('telepon', $data);
        if ($insert) {
            // respon jika data berhasil dimasukkan ke dalam database
            $this->response($data, 200);
        } else {
            // respon jika data tidak berhasil dimasukkan ke dalam database
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put() {
        $id = $this->put('id');
        // mengubah data yang ada kedalam bentuk array
        $data = array(
                    'id'       => $this->put('id'),
                    'nama'          => $this->put('nama'),
                    'nomor'    => $this->put('nomor'));
        $this->db->where('id', $id); // mengakses database dengan id tertentu
        // perintah untuk mengupdate data yang ingin di ubah dalam database
        $update = $this->db->update('telepon', $data);
        if ($update) {
        //respon jika data berhasil diubah
            $this->response($data, 200);
        } else {
        //respon jika data gagal diubah
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id = $this->delete('id');
        // perintah untuk memilih data berdasarkan id
        $this->db->where('id', $id);

        // perintah untuk menghapus data didalam database
        $delete = $this->db->delete('telepon');
        if ($delete) {
            //respon jika data berhasil dihapus
            $this->response(array('status' => 'success'), 201);
        } else {
            //respon jika data gagal dihapus
            $this->response(array('status' => 'fail', 502));
        }
    }

}
?>