<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}


	public function index()
	{
		// perintah untuk memanggil view
        $this->load->view('templates/v_header');
		$this->load->view('v_login');
		// $this->load->view('login');
	}

	function aksi_login(){
		//perintah ini digunakan untuk memasukkan data sesuai dengan kolom pada tabel database
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//mengubah data string pada database menjadi bentuk array
		$where = array(
			'username' => $username,
			'password' => $password
		);
		$cek = $this->m_login->cek_login("user", $where)->num_rows(); //melakukan cek tabel user berdasarkan id
		//jika terdapat id maka melakukan cek data yang diinput dengan database, jika cocok membuka controller user.
		if($cek > 0){
			$data_session = array(
				'nama' => $username,
				'status' => "login"
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('user'));
		
		}else{
			echo "maaf username dan password salah";
		}
	}

	function logout(){
		$this->session->sess_destroy(); //perintah untuk menghentikan session
		redirect(base_url('login')); // pindah ke halaman login
	}


}
