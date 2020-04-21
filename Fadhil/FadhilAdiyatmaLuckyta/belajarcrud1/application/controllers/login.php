<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');

	}

	function index(){
        //pada controller ini akan kita tampilkan di v_tampil di view
		$this->load->view('v_login');
	}

    //membuat fungsi aksi_login 
	function aksi_login(){
        //gunanya data username dan password yang kemudian dikirim dan dimasukkan kedalan array, dan dikirim lagi ke model
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
			//fungsi dari num_rows yaitu menghitung jumlah record
        $cek = $this->m_login->cek_login("admin",$where)->num_rows();
        
        //fungsi ini digunakan untuk data yang kita masukkan sesuai dengan data, jika kita berhasil login maka session akan memanggil nama atau username, yang berarti kita berhasil login
		if($cek > 0){

			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

            redirect(base_url("admin"));
            
        //jika data yang kita inputkan tidak ditemukan oleh admin, maka kita tidak bisa untuk login 
		}else{
			echo "Username dan password salah !";
		}
	}

	function logout(){
		//destroy ini berguna untuk menghaput semua session 
        $this->session->sess_destroy();
        //pada saat logout kita akan dialihkan kembali ke halaman login (redirect)
		redirect(base_url('login'));
	}
}