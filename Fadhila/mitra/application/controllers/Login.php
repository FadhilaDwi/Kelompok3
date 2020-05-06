<?php 

	class Login extends Ci_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model('m_login');
		}

		public function index()
		{
				$this->load->view('v_login');
				
		}
		function aksi_login(){
			//perintah ini digunakan untuk memasukkan data sesuai dengan kolom pada tabel database
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			//mengubah data string pada database menjadi bentuk array
			$where = array(
				'username' => $username,
				'password' => md5 ($password)
			);
			$cek = $this->m_login->cek_login("admin", $where)->num_rows(); //melakukan cek tabel user berdasarkan id
			//jika terdapat id maka melakukan cek data yang diinput dengan database, jika cocok membuka controller dashboard admin.
			if($cek > 0){
				$data_session = array(
					'nama' => $username,
					'status' => "login"
				);
				$this->session->set_userdata($data_session);
				redirect(base_url('admin/dashboard_admin'));
			
			}else{
				echo "maaf username dan password salah";
			}
		}
		public function logout(){
			$this->session->unset_userdata('nama'); //perintah untuk menghentikan session
			$this->session->unset_userdata('status'); //perintah untuk menghentikan session
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> anda telah crot!</div>');
			redirect(base_url()); // pindah ke halaman login
		}
	}

?>