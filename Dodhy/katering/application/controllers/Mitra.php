<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_mitra'); //digunakan untuk memanggil model m_dashboard
		$this->load->helper('url');
	}

	public function index()
	{
		$data['mitra'] = $this->m_mitra->tampil_data()->result(); //berfungsi untuk menampilkan data sesuai model yang telah ditentukan
		// perintah untuk memanggil view
		$this->load->view('templates/v_header');
		$this->load->view('templates/v_sidebar');
		$this->load->view('v_mitra', $data);
		$this->load->view('templates/v_footer');
	}

	function tambah_data(){
		$username = $this->input->post('username');
		$nama_katering = $this->input->post('nama_katering');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$alamat = $this->input->post('alamat');
        $no_telepon = $this->input->post('no_telepon');
        $email = $this->input->post('email');
        $foto_lokasi        = $_FILES['foto_lokasi']['name'];
        $password    = $this->input->post('password');

            if ($foto_lokasi =''){}else{
                $confiq ['upload_path'] = './uploads';
                $confiq ['allowed_types'] = 'jpg|jpeg|png|gif';

                $this->load->library('upload', $confiq);
                if (!$this->upload->do_upload('foto_lokasi')){
                    echo "Foto Yang Anda Upload Gagal Rek!!";
                }else{
                    $foto_lokasi=$this->upload->data('file_name');
                }
            }
        $data = array(
			'username' => $username,
			'nama_katering' => $nama_katering,
			'nama_pemilik' => $nama_pemilik,
			'alamat' => $alamat,
            'no_telepon' => $no_telepon,
            'email'=>  $email,
            'foto_lokasi' => $foto_lokasi,
            'password'    => $password 
        );

        $this->m_mitra->tambah_data($data, 'mitra');
        redirect('mitra/index');
    }
	function hapus($id_mitra){
		$where = array('id_mitra' => $id_mitra); // mengubah id menjadi bentuk array
		$this->m_mitra->hapus_data($where,'mitra'); //perintah untuk menghapus data sesuai dengan tabel dan id yang diinginkan
		redirect('mitra/index');
	}
}
