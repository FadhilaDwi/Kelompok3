<?php 
 
class admin extends CI_Controller{

	
 
    function __construct(){
		parent::__construct();	
		
		$this->load->model('mdata'); //untuk menjalankan perintah yang ada pada mdata
		
		$this->load->helper('url'); //untuk mengambil data yang disimpan sementara melalui url

	}
	function index(){
		$this->load->view('masuk'); //tampilan uutama untuk login
	}
	
 /*untuk mengetahui user login dengan benar atau tidak. user harus mengisi username dan password, kemudain sistem akan melakukan cek ke database apakah username dan pass yg dimasukkan sudah sesuai. jika sesuai maka akan diijinan login. jika tidak maka username dan pass yg dimasukkan salah*/
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->mdata->cek_login("admin",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				
				'nama' => $username,
				
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("cek"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
 //fungsi logout
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}
	
	//untuk menampilkan data dari database
	function tampil(){
		$data['pendaftaran'] = $this->mdata->tampil_data()->result();
        $this->load->view('tampil',$data);
	}
	//untuk menampilkan form tambah data
	function tambah(){
		$this->load->view('form');
    }
	//fungsi untuk tambah data ke database
	function tambah_aksi(){
		$idpendaftaran = $this->input->post('idpendaftaran');
		$idadmin = $this->input->post('idadmin');
		$nama_pen = $this->input->post('nama_pen');
		$jk = $this->input->post('jk');
		$kasus = $this->input->post('kasus');
		$sidang = $this->input->post('sidang');
 
		$data = array(
			'idpendaftaran' => $idpendaftaran,
			'idadmin' => $idadmin,
			'nama_pen' => $nama_pen,
			'jk' => $jk,
			'kasus' => $kasus,
			'sidang' => $sidang

			);
		$this->mdata->input_data($data,'pendaftaran');
		redirect('admin/tampil');
	}
	//fungsi untuk hapus data
	function hapus($idpendaftaran){
		$where = array('idpendaftaran' => $idpendaftaran);
		$this->mdata->hapus_data($where,'pendaftaran');
		redirect('admin/tampil');
    }
	//ini untuk edit 
	function edit($idpendaftaran){
		$where = array('idpendaftaran' => $idpendaftaran);
		$data['pendaftaran'] = $this->mdata->edit_data($where,'pendaftaran')->result();
		$this->load->view('formedit',$data);
	}
	//ini untuk menyimpan data yang sudah di edit ke dalam database. data yang sudah di update akan ditampilkan kembali ke dalam halaman tampil
	function update(){
		$idpendaftaran = $this->input->post('idpendaftaran');
		$idadmin = $this->input->post('idadmin');
        $nama_pen = $this->input->post('nama_pen');
		$jk = $this->input->post('jk');
		$kasus = $this->input->post('kasus');
        $sidang = $this->input->post('sidang');
     /*data yang sudah diedit akan dimasukkan ke variabel $data*/
        $data = array(
			'idpendaftaran' => $idpendaftaran,
			'idadmin' => $idadmin,
			'nama_pen' => $nama_pen,
			'jk' => $jk,
            'kasus' => $kasus,
            'sidang' => $sidang
        );
     /*dan where yang menjadi penentu id yg mana untuk di update */
        $where = array(
            'idpendaftaran' => $idpendaftaran
        );
     
        $this->mdata->update_data($where,$data,'pendaftaran');
        redirect('admin/tampil');
	}
	function cancel(){ //untuk button cancel yang diarahkan ke halaman tampil
		redirect ('admin/tampil');
	}
	
	
}