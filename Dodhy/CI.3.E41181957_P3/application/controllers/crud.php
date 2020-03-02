<?php 

class Crud extends CI_Controller{
    // memanggil model m_data
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
                $this->load->helper('url');
	}
    // menampilkan data yang telah dibuat di model m_data dengan fungsi tampil_data
	function index(){
		$data['user'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_tampil',$data);
    }
    // berfungsi untuk menampilkan v_input
    function tambah(){
        $this->load->view('v_input');
    }
    
    function tambah_aksi(){
        // Menangkap inputan dari form 
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
 
        // data dijadikan bentuk array
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
            );
        // Menginput data ke database dengan model m_data
        $this->m_data->input_data($data,'user');
        // dialihkan ke method index
		redirect('crud/index');
    }

    // variabel id untuk menangkap data id melalui url dari link hapus
    function hapus($id){
        // menjadikan variabel data variabel id ke bentuk array
        $where = array('id' => $id);
        // mengirim data ke model m_data
        $this->m_data->hapus_data($where,'user');
		redirect('crud/index');
    }
    function edit($id){
        // mengubah id menjadi array
        $where = array('id' => $id);
        // mengambil data dari model m_data yang telah diubah
        $data['user'] = $this ->m_data->edit_data($where, 'user')->result();
        // menampilan v_edit
        $this->load->view('v_edit',$data);
    }
    function update(){
        // menangkap data yang diperlukan
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $pekerjaan = $this->input->post('pekerjaan');
        // mengubah data yang ada menjadi bentuk array
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan
        );
        // mengubah id menjadi bentuk array
        $where = array(
            'id' => $id
        );
        
        // berfungsi mengupdate data pada database
        $this->m_data->update_data($where,$data,'user');
        redirect('crud/index');
    }
}