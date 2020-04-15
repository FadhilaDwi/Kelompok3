<?php 

	class Dashboard extends Ci_Controller{
		function __construct(){
			parent::__construct();	
			
			$this->load->model('mdata'); //untuk menjalankan perintah yang ada pada mdata
			
			$this->load->helper('url'); //untuk mengambil data yang disimpan sementara melalui url
	
		}
		function index(){
			$this->load->view('admin/index'); //tampilan uutama untuk login
		}
		 function home()
		{
				$this->load->view('templates_admin/header');
				$this->load->view('templates_admin/sidebar');
				$this->load->view('admin/dashboard');
				$this->load->view('templates_admin/footer');
		}
	}

?>