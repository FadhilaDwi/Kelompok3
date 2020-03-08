Pastikan kita sudah  terlebih dahulu mendownload dan mengistal aplikasi postman dengan mengunjungi http://www.postman.com dan juga sudah membuat folder Codeigniter yang sudah terdapat library REST dan kita beri nama folder tersebut 'rest_ci'.

1.Langkah pertama kita buat sebuah database yang bernama 'kontak'

CREATE DATABASE kontak;

Kemudian kita buat tabel baru dengan nama "telepon" dengan field id (int 11 AUTO_INCREMENT), nama (varchar 30), nomor (varchar 11):
USE kontak;
CREATE TABLE IF NOT EXISTS `telepon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nomor` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

terakhir kita masukkan beberapa contoh data:

USE kontak;
INSERT INTO `telepon` (`id`, `nama`, `nomor`) VALUES
(1, 'Orion', '08576666762'),
(2, 'Mars', '08576666770'),
(7, 'Alpha', '08576666765');

2.Kemudian di visual studio code kita buka database.php pada rest_ci/application/config ubah menjadi
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
    'dsn'   => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'kontak',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
Kemudian kita buat controller dengan nama 'kontak.php' setelah itu kita masukkan code seperti di bawah ini:

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kontak extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

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
        $data = array(
                    'id'           => $this->post('id'),
                    'nama'          => $this->post('nama'),
                    'nomor'    => $this->post('nomor'));
        $insert = $this->db->insert('telepon', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put() {
        $id = $this->put('id');
        $data = array(
                    'id'       => $this->put('id'),
                    'nama'          => $this->put('nama'),
                    'nomor'    => $this->put('nomor'));
        $this->db->where('id', $id);
        $update = $this->db->update('telepon', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('telepon');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}

Code di atas sudah mencakup method GET, POST, PUT dan DELETE sehingga kita bisa langsung menguji menggunakan aplikasi postman tadi.berikut beberapa caranya:
1.untuk method GET
Pilih metode GET, masukan http://127.0.0.1/rest_ci/index.php/kontak pada address bar lalu klik "Send". 
2.untuk method POST
Pilih metode POST, masukan http://127.0.0.1/rest_ci/index.php/kontak pada address bar, klik "Body" pada menu dibawah address bar, pilih x-www-form-urlencoded, masukan key dan value yang diperlukan (id, nama, nomor), lalu klik "Send".
3.untuk method PUT
Pilih metode PUT, masukan http://127.0.0.1/rest_ci/index.php/kontak pada address bar, klik "Body" pada menu dibawah address bar, pilih x-www-form-urlencoded, masukan key id dan value id yang akan kita ubah diikuti key dan value selanjutnya, lalu klik "Send".
4.untuk method DELETE
Pilih metode DELETE, masukan http://127.0.0.1/rest_ci/index.php/kontak pada address bar, klik "Body" pada menu dibawah address bar, pilih x-www-form-urlencoded, masukan key id dan value id yang akan kita hapus, lalu klik "Send".