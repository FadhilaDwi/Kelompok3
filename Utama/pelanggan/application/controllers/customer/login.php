<?php 

	class login extends Ci_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('M_login');
			$this->load->library('form_validation');
		}

		public function index()
		{
			
			$this->load->view('login');
		}
		public function registrasi(){

			$this->form_validation->set_rules('nama_pelanggan', 'Full Name', 'required|trim');
			$this->form_validation->set_rules('alamat', 'Address', 'required|trim');
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[pelanggan.username]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[pelanggan.email]|valid_email');
			$this->form_validation->set_rules('no_telepon', 'Number phone', 'required|trim|min_length[11]|max_length[13]');

			if ($this->form_validation->run() == False) {
				$this->load->view('login');
			}else{
			$username = $this->input->post('username');
			$nama_pelanggan = $this->input->post('nama_pelanggan');
			$alamat = $this->input->post('alamat');
			$no_telepon = $this->input->post('no_telepon');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$data = array(
				
				'username' => $username,
				'nama_pelanggan' => $nama_pelanggan,
				'alamat' => $alamat,
				'no_telepon' => $no_telepon,
				'email'=>  $email,
				'foto' => 'default.png',
				'password' => md5 ($password)			
	
				);
			$this->M_login->buatakun($data,'pelanggan');
			$data['kodeunik'] = $this->M_login->buat_kode();
			redirect('customer/login/index');
			}
		}
		public function aksi_login(){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			//mengubah data string pada database menjadi bentuk array
			$where = array(
				'username' => $username,
				'password' => md5 ($password)
			);
			$cek = $this->M_login->cek_login("pelanggan", $where)->num_rows(); //melakukan cek tabel user berdasarkan id
			//jika terdapat id maka melakukan cek data yang diinput dengan database, jika cocok membuka controller dashboard admin.
			if($cek > 0){
				$data_session = array(
					'nama' => $username,
					'status' => "login"
				);
				$this->session->set_userdata($data_session);
				redirect(base_url('dashboardpelanggan'));
			
			}else{
				echo "maaf username dan password salah";
			}
		}
		function logout(){
			$this->session->sess_destroy(); //perintah untuk menghentikan session
			redirect(base_url('dashboardpelanggan'));
		}

}
?>