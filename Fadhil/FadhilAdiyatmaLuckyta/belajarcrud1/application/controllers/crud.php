<?php 
 
 
class Crud extends CI_Controller{
 
	function __construct(){
		parent::__construct();	
		//Untuk mengambil data dari database yang akan dilakukan oleh models dengan nama m_data	
		$this->load->model('m_data');

		$this->load->helper('url');
 
	}
 
	function index(){
		//disini mengambil data dari database user yang akan dilakukan oleh models 
		$data['user'] = $this->m_data->tampil_data()->result();
		//yang akan menampilkan berupa form melalui view dengan nama v_tampil
		$this->load->view('v_tampil',$data);
	}
 
	function tambah(){
		//pada fungsi tambah ini mengambil data yang berada pada view yang bernama v_input
		$this->load->view('v_input');
	}
 
	function tambah_aksi(){
		//menangkap fungsi dari tambah_aksi yang nantinya akan dijadikan sebagai array
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
 
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);
		//fungsi ini digunakan untuk mengambil data dari database tabel bernama user yang terdiri dari nama,alamat,pekerjaan, yang akan kita input nantinya
		$this->m_data->input_data($data,'user');
		redirect('crud/index');
	}
 
    function hapus($id){
		//pada variabel $id disini digunakan untuk menangkap id yang dikirim melalui url
		$where = array('id' => $id);
		//menampilkan dan menghapus data yang akan dilakukan oleh models, dari database yang bernama user, disini kita tinggal memanggil fungsi yg sudah dibuat di m_data yaitu hapus_data
		$this->m_data->hapus_data($where,'user');
		redirect('crud/index');
    }
    
    function edit($id){
		//pada variabel $id disini digunakan untuk menangkap id yang dikirim melalui url dari link hapus
		$where = array('id' => $id);
		//$whare berisi dari data id yang kita kirim tadi, fungsi dari result itu sendiri adalah merubah query menjadi array
		$data['user'] = $this->m_data->edit_data($where,'user')->result();
		//dan kemudian akan tampil di view bernama v_edit
		$this->load->view('v_edit',$data);
    }
    
    function update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $pekerjaan = $this->input->post('pekerjaan');
     
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan
        );
     
        $where = array(
            'id' => $id
        );
     
        $this->m_data->update_data($where,$data,'user');
        redirect('crud/index');
    }
}