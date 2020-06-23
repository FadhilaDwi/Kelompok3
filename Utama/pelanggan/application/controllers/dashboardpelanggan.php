<?php 

	class dashboardpelanggan extends Ci_Controller
{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_pelanggan');
			$this->load->library('cart');
			// if(!$this->session->userdata('nama'))
			// {
			// 	redirect (base_url());
			// }
		}

		public function index()
		{
				// $data['mitra'] = $this->m_pelanggan->tampil_data()->result();
				$data['detail_menu'] = $this->m_pelanggan->tampil_menu(['date(hari)'=>date("Y-m-d",strtotime('now'))], 'detail_menu')->result();
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
			$data['mitra'] = $this->m_pelanggan->tampil_data('mitra')->result();
			$this->load->view('templates_customer/header');
			$this->load->view('customer/v_menu', $data);
			$this->load->view('templates_customer/footer');
		}

		public function tambah_keranjang($id_menu){
			$menu = $this->m_pelanggan->find(['id_menu' => $id_menu], 'detail_menu')->row();

			$data = array(
				'id' => $menu->id_menu,
				'qty' => 1,
				'price' => $menu->harga_menu,
				'name' => $menu->nama_menu,
				'shop' => $menu->nama_katering,
				'shop_id' => $menu->id_mitra
			);

			$this->cart->insert($data);
			redirect(base_url('dashboardpelanggan/keranjang'));

		}
		public function keranjang(){
			$data['pelanggan'] = $this->db->get_where('pelanggan', ['username' => $this->session->userdata('nama')])->row_array();
			// $data['pemesanan'] = $this->db->get_where('pemesanan, pelanggan', ['pelanggan.id_pelanggan', 'username' => $this->session->userdata('nama')])->row_array();
			$this->load->view('templates_customer/header');
			$this->load->view('customer/v_keranjang', $data);
			$this->load->view('templates_customer/footer');
		}

		public function beli(){
			$id_pelanggan = $this->input->post('id_pelanggan');
			$total = $this->cart->total();
			$alamat = $this->input->post('alamat');
			$metode_bayar = $this->input->post('metode_bayar');
			// $bayar = $this->input->post('metode_pembayaran');
			// $foto = $_FILES['bukti_pembayaran']['name'];
            //     if ($foto =''){}else{
            //         $config ['upload_path'] = './assets/img/profil/';
			// 		$config ['allowed_types'] = 'jpg|jpeg|png|gif';
			// 		$config ['max_size'] = '2048';
    
            //         $this->load->library('upload', $config);
            //         if (!$this->upload->do_upload('foto')){
            //             echo "Foto Yang Anda Upload Gagal Rek!!";
            //         }else{
            //             $foto=$this->upload->data('file_name');
            //         }
            //     }

			$invoice = array(
				'id_pelanggan' => $id_pelanggan,
				'total_harga' => $total,
				'metode_bayar' => $metode_bayar
			);
				$this->db->insert('pemesanan', $invoice);
				$id_pesan = $this->db->insert_id();

				foreach ($this->cart->contents() as $items) {
					$data = array(
						'id_pesan' => $id_pesan,
						'id_menu' => $items['id'],
						'jumlah_pesanan' => $items['qty'],
						'alamat_pesanan' => $alamat,
						'status_pesanan' => 'belum membayar',
						'bukti_pembayaran' => 'kosong'
					);
					$this->db->insert('detail_pemesanan', $data);
				}
			$this->cart->destroy();
			$p['pesanan'] = $this->m_pelanggan->tampil(['id_pesan' => $data['id_pesan']], 'pesanan')->result();
			$this->load->view('templates_customer/header');
			$this->load->view('customer/v_invoice', $p);
			$this->load->view('templates_customer/footer');
		}

		public function riwayat(){
			$data['pemesanan'] = $this->m_pelanggan->tampil_data('pemesanan')->result();
			$this->load->view('templates_customer/header');
			$this->load->view('customer/v_riwayat', $data);
			$this->load->view('templates_customer/footer');
		}

		// public function detail_riwayat($id_pesan){
		// 	$p['pesanan'] = $this->m_pelanggan->tampil(['id_pesan' => $id_pesan], 'pesanan')->row_array();
		// 	$this->load->view('templates_customer/header');
		// 	$this->load->view('customer/v_invoice', $p);
		// 	$this->load->view('templates_customer/footer');
		// }
}
	
