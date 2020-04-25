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
		public function registrasi(){
			$id_pelanggan = $this->input->post('id_pelanggan');
			$username = $this->input->post('username');
			$nama_pelanggan = $this->input->post('nama_pelanggan');
			$alamat = $this->input->post('alamat');
			$no_telepon = $this->input->post('no_telepon');
			$email = $this->input->post('email');
			//$foto_lokasi = $this->input->post('foto_lokasi');
			$password = $this->input->post('password');
			$foto      = $_FILES['gambar']['name'];
					if ($foto =''){}else{
						$confiq ['upload_path'] = './uploads';
						$confiq ['allowed_types'] = 'jpg|jpeg|png|gif';
	
						$this->load->library('upload', $confiq);
						if (!$this->upload->do_upload('foto')){
							echo "Gambar Yang Anda Upload Gagal Rek!!";
						}else{
							$foto=$this->upload->data('file_name');
						}
					}
			$data = array(
				'id_pelanggan' => $id_pelanggan,
				'username' => $username,
				'nama_pelanggan' => $nama_pelanggan,
				'alamat' => $alamat,
				'no_telepon' => $no_telepon,
				'email'=>  $email,
				'foto'=>$foto,
				'password' => md5 ($password)			
	
				);
			$this->M_login->buatakun($data,'pelanggan');
			redirect('login/index');
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