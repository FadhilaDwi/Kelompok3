<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {
	// mengakses helper download
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','download'));				
	}

	// berfungsi untuk menampilkan view v_download
	public function index(){		
		$this->load->view('v_download');
	}

	public function lakukan_download(){	
		//memaksa untuk melakukan download data yang sudah di set sebelumnya 
		force_download('gambar/malasngoding.png',NULL);
	}	

}