<?php 
 
class Admin extends CI_Controller{
 
	function __construct(){
		parent::__construct();

		//pada fungsi ini session status yang mendeteksi apakah user udah login atau belum, jika admin dan user sudah berhasil login maka session nya berisi login
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
			//jika tidak berhasil login maka akan dikembalikan tau di redirect ke halaman admin lagi
		}
	}
 
	function index(){
		$this->load->view('v_admin');
	}
}