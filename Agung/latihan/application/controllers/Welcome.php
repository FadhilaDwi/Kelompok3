<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('html');
	}
//function ini digunakan untuk memanggil helper html
	public function index(){
		$this->load->view('welcome');
	}
}
//function ini digunakan untuk menampilkan welcome pada halaman index kita