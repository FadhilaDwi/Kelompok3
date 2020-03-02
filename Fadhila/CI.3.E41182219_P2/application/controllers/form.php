<?php 

class Form extends CI_Controller{
// memanggil library form_validation
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}
// menampilkan halaman v_form
	function index(){
		$this->load->view('v_form');
	}

	function aksi(){
		// melakukan peraturan form terlebih dahulu
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('konfir_email','Konfirmasi Email','required');

		if($this->form_validation->run() != false){
			echo "Form validation oke";
		}else{
			$this->load->view('v_form');
		}
	}
}