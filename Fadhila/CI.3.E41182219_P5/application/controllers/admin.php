<?php 
 
class admin extends CI_Controller{

	
 
    function __construct(){
		parent::__construct();	
			
		$this->load->model('mdata');
				$this->load->helper('url');

	}

	function index(){
		
        $this->load->view('masuk');
	}
	
	function tampil(){
		$data['pendaftaran'] = $this->mdata->tampil_data()->result();
        $this->load->view('tampil',$data);
	}
	
	function tambah(){
		$this->load->view('form');
    }
	
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
	function hapus($idpendaftaran){
		$where = array('idpendaftaran' => $idpendaftaran);
		$this->mdata->hapus_data($where,'pendaftaran');
		redirect('admin/tampil');
    }
	
	function edit($idpendaftaran){
		$where = array('idpendaftaran' => $idpendaftaran);
		$data['pendaftaran'] = $this->mdata->edit_data($where,'pendaftaran')->result();
		$this->load->view('formedit',$data);
	}
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
	public function cancel(){ /*menampilakan Vbelajar */
		redirect ('admin/tampil');
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
				'username' => $username,
				
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("session"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index'));
	}
}