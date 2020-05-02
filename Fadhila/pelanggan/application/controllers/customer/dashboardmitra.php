<?php 

	class dashboardmitra extends Ci_Controller
{
		public function __construct()
		{
			parent::__construct();
			if(!$this->session->userdata('nama'))
			{
				redirect ('loginmitra');
			}
		}

		public function index()
		{
				$this->load->view('templates_customer/header');
				$this->load->view('customer/dashboardmitra');
				$this->load->view('templates_customer/footer');
		}
}
	
