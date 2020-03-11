<?php 
 
class admin extends CI_Controller{
 
    function __construct(){
		parent::__construct();		
		$this->load->model('mdata');
                $this->load->helper('url');
	}
 
	function index(){
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
		redirect('admin/index');
    }
}