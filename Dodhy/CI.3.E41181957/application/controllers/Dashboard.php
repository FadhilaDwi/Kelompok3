<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_dashboard'); //digunakan untuk memanggil model m_dashboard
		$this->load->helper('url');
	}

	public function index()
	{
		$data['pengurus_masjid'] = $this->m_dashboard->tampil_data()->result(); //berfungsi untuk menampilkan data sesuai model yang telah ditentukan
		// perintah untuk memanggil view
		$this->load->view('templates/v_header');
		$this->load->view('templates/v_sidebar');
		$this->load->view('v_dashboard', $data);
		$this->load->view('templates/v_footer');
	}

	function tambah_data(){
		//perintah ini digunakan untuk memasukkan data sesuai dengan kolom pada tabel database
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		//mengubah data string pada database menjadi bentuk array
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat
		);
		$this->m_dashboard->tambah_data($data, 'pengurus_masjid'); //perintah yang digunakan untuk memasukkan data sesuai variabel yang telah ditentukan
		redirect('dashboard/index');//memindahkan halaman
	}
	function hapus($id){
		$where = array('idpengurus' => $id); // mengubah id menjadi bentuk array
		$this->m_dashboard->hapus_data($where,'pengurus_masjid'); //perintah untuk menghapus data sesuai dengan tabel dan id yang diinginkan
		redirect('dashboard/index');
	}
	function edit($id){
		//perintah ini digunakan untuk memasukkan data sesuai dengan kolom pada tabel database
		$id = $this->input->post('idpengurus');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');

		$where = array('idpengurus' => $id); // mengubah id menjadi bentuk array
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat
		);
		$this->m_dashboard->update_data($where,$data,'pengurus_masjid'); //perintah untuk mengupdate data
		redirect('dashboard/index');
	}
}
