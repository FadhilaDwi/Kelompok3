<?php 

	class login extends Ci_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('M_login');
		}

		public function index()

		{
			$this->load->view('login');
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
				redirect(base_url('customer/dashboard'));
			
			}else{
				echo "maaf username dan password salah";
			}
		}
		function logout(){
			$this->session->sess_destroy(); //perintah untuk menghentikan session
			redirect(base_url('login')); // pindah ke halaman login
		}

}
?>