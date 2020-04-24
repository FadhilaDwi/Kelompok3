<?php 

	class Dashboard extends Ci_Controller{

		public function index()
		{
				$this->load->view('templates_customer/header');
				$this->load->view('customer/dashboard');
				$this->load->view('templates_customer/footer');
		}
	}

?>