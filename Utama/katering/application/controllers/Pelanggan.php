<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('nama'))
		{
			redirect(base_url());
		}
		$this->load->model('m_pelanggan'); //digunakan untuk memanggil model m_dashboard
		$this->load->helper('url');
	}

	public function index()
	{
		$data['pelanggan'] = $this->m_pelanggan->tampil_data()->result(); //berfungsi untuk menampilkan data sesuai model yang telah ditentukan
		// perintah untuk memanggil view
		$this->load->view('templates/v_header');
		$this->load->view('templates/v_sidebar');
		$this->load->view('v_pelanggan', $data);
		$this->load->view('templates/v_footer');
	}

	function hapus($id_pelanggan){
		$where = array('id_pelanggan' => $id_pelanggan); // mengubah id menjadi bentuk array
		$this->m_pelanggan->hapus_data($where,'pelanggan'); //perintah untuk menghapus data sesuai dengan tabel dan id yang diinginkan
		redirect('pelanggan/index');
	}
}
