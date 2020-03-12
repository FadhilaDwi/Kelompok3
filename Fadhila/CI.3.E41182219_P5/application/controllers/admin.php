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
	function hapus($idpendaftaran){
		$where = array('idpendaftaran' => $idpendaftaran);
		$this->mdata->hapus_data($where,'pendaftaran');
		redirect('admin/iindex');
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
        redirect('admin/index');
	}
	public function cancel(){ /*menampilakan Vbelajar */
		redirect ('admin/index');
    }
}