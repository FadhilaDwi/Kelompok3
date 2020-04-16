<?php 

	class dashboard extends Ci_Controller{
		function __construct(){
			parent::__construct();	
			
			
			$this->load->helper('url'); //untuk mengambil data yang disimpan sementara melalui url
	
		}
		function index(){
			$this->load->view('index.html'); //tampilan uutama untuk login
		}
		
	}

?>