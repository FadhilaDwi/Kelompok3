<?php 

	class dashboardpelanggan extends Ci_Controller
{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_pelanggan');
			$this->load->library('cart');
			if(!$this->session->userdata('nama'))
			{
				redirect (base_url());
			}
		}

		public function index()
		{
				// $data['mitra'] = $this->m_pelanggan->tampil_data()->result();
				$data['detail_menu'] = $this->m_pelanggan->tampil_menu(['date(tgl_set)'=>date("Y-m-d",strtotime('now'))], 'detail_menu')->result();
				$this->load->view('templates_customer/header');
				$this->load->view('customer/dashboardpelanggan', $data);
				$this->load->view('templates_customer/footer');
		}

		public function detail($id_mitra){
				$data['mitra'] = $this->m_pelanggan->tampil(['id_mitra' => $id_mitra], 'mitra')->result_array();
				$data['detail_menu'] = $this->m_pelanggan->tampil_menu(['id_mitra' => $id_mitra], 'detail_menu')->result();
				$this->load->view('templates_customer/header');
				$this->load->view('customer/v_detil', $data);
				$this->load->view('templates_customer/footer');
		}

		public function mitra(){
			$data['mitra'] = $this->m_pelanggan->tampil_data()->result();
			$this->load->view('templates_customer/header');
			$this->load->view('customer/v_menu', $data);
			$this->load->view('templates_customer/footer');
		}

		public function tambah_keranjang($id_mitra,$id_menu){
			$menu = $this->m_pelanggan->find(['id_menu' => $id_menu, 'id_mitra' => $id_mitra], 'detail_menu')->row();

			$data = array(
				'id' => $menu->id_menu,
				'qty' => 1,
				'price' => $menu->harga_menu,
				'name' => $menu->nama_menu,
				'shop' => $menu->nama_katering,
				'shop_id' => $menu->id_mitra
			);

			$this->cart->insert($data);

		}
		public function keranjang(){
			$this->load->view('templates_customer/header');
			$this->load->view('customer/v_keranjang');
			$this->load->view('templates_customer/footer');
		}
}
	
