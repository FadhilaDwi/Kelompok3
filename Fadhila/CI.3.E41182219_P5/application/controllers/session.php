<?php 
 
class session extends CI_Controller{
 /*untuk mengetahui sesion dari admin. jika admin belum login makan akan dialihkan ke halaman login */
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("admin"));
		}
	}
 /*jika admin berhasil login maka akan di alihkan ke halaman admin */
	function index(){
		$this->load->view('tampil');
	}
}