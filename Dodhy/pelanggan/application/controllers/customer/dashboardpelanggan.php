<?php 

	class dashboardpelanggan extends Ci_Controller
{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_pelanggan');
			if(!$this->session->userdata('nama'))
			{
				redirect (base_url());
			}
		}

		public function index()
		{
				$data['mitra'] = $this->m_pelanggan->tampil_data()->result();
				$this->load->view('templates_customer/header');
				$this->load->view('customer/dashboardpelanggan', $data);
				$this->load->view('templates_customer/footer');
		}

		public function detail($id_mitra){
				$data['detail_menu'] = $this->m_pelanggan->tampil_menu(['id_mitra' => $id_mitra], 'detail_menu')->result();
				$this->load->view('templates_customer/header');
				$this->load->view('customer/v_detil', $data);
				$this->load->view('templates_customer/footer');
		}
}
	
