<?php 
 
class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login'); /* perintah untuk menjalankan program pada m_data */
 
	}
 /*perintah untuk menjalankan tampilan form login*/
	function index(){
		$this->load->view('v_login');
	}
 /*untuk mengetahui user login dengan benar atau tidak. user harus mengisi username dan password, kemudain sistem akan melakukan cek ke database apakah username dan pass yg dimasukkan sudah sesuai. jika sesuai maka akan diijinan login. jika tidak maka username dan pass yg dimasukkan salah*/
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->m_login->cek_login("admin",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}