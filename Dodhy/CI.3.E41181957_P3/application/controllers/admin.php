<?php 

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		// mengakses halaman login kembali ketika gagal login
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	// fungsi untuk mengakses halaman v_admin ketika berhasil login
	function index(){
		$this->load->view('v_admin');
	}
}