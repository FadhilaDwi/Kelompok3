<?php 

	class dashboardpelanggan extends Ci_Controller
{
		public function __construct()
		{
			parent::__construct();
			if(!$this->session->userdata('nama'))
			{
				redirect (base_url());
			}
		}

		public function index()
		{
				$this->load->view('templates_customer/header');
				$this->load->view('customer/dashboardpelanggan');
				$this->load->view('templates_customer/footer');
		}
}
	
