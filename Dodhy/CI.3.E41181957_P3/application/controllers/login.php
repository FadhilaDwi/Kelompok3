<?php 

class Login extends CI_Controller{
	// berfungsi untuk memanggil model m_login
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');

	}
	//berfungsi untuk memanggil v_login
	function index(){
		$this->load->view('v_login');
	}

	function aksi_login(){
		// menangkap data username dan password yang telah diinput
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// mengubah data kebentuk array
		$where = array(
			'username' => $username,
			'password' => $password
			);
		// melakukan cek ketersediaan username dan password dengan fungsi cek_login di m_login
		$cek = $this->m_login->cek_login("admin",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);
			// memindahkan ke admin.php jika password dan username benar
			redirect(base_url("admin"));

			// hasil untuk username dan password salah
		}else{
			echo "Username dan password salah !";
		}
	}
	// berfungsi untuk kembali ke halaman login
	function logout(){
		// berfungsi untuk menghapus semua session
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}