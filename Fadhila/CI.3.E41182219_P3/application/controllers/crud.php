<?php 
 
class Crud extends CI_Controller{
 /*untuk membuka m_data*/
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
                $this->load->helper('url');
	}
/*pada fungtion index kita menampilkan data dengan fungtion tampil_tampildata yg dibuat dalam database kemudian di tampilkan pada v_tampil*/
	function index(){
		$data['user'] = $this->m_data->tampil_data()->result();
        $this->load->view('v_tampil',$data);
    }
    /*perintah untuk menampilkan v_input */
    function tambah(){
		$this->load->view('v_input');
    }
    
    function tambah_aksi(){
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
 
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);
		$this->m_data->input_data($data,'user');
		redirect('crud/index');
    }
    /*untuk menghapus data berdasarkan data yang dipilih oleh user*/
    function hapus($id){
		$where = array('id' => $id);
		$this->m_data->hapus_data($where,'user');
		redirect('crud/index');
    }
    /*digunakan untuk mengambil ata berdasarkan id dengan dungtion edit data pada m_data kemudian akan ditampilkan pada v_edit*/
    function edit($id){
		$where = array('id' => $id);
		$data['user'] = $this->m_data->edit_data($where,'user')->result();
		$this->load->view('v_edit',$data);
    }
    /*fungtion untuk melakukan update data*/
    function update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $pekerjaan = $this->input->post('pekerjaan');
     /*data yang sudah diedit akan dimasukkan ke variabel $data*/
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan
        );
     /*dan where yang menjadi penentu id yg mana untuk di update */
        $where = array(
            'id' => $id
        );
     
        $this->m_data->update_data($where,$data,'user');
        redirect('crud/index');
    }
}