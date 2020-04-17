<?php  

    class data_mitra extends CI_Controller {

function __construct(){
		parent::__construct();	
		
		$this->load->model('model_hewan'); //untuk menjalankan perintah yang ada pada mdata
		
		$this->load->helper('url'); //untuk mengambil data yang disimpan sementara melalui url

    }
    
    public function index()
    {
        $data['kodeunik'] = $this->model_hewan->buat_kode(); // variable $kodeunik merujuk ke file model_user.php pada function buat_kode. paham kan ya? harus paham dong
    $data['mitra'] = $this->model_hewan->tmpmitra()->result();   
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('admin/data_mitra', $data);
    $this->load->view('template_admin/footer');
    }
    
    public function tambah_aksi(){
		$id_mitra = $this->input->post('id_mitra');
		$username = $this->input->post('username');
		$nama_katering = $this->input->post('nama_katering');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$alamat = $this->input->post('alamat');
        $no_telepon = $this->input->post('no_telepon');
        $email = $this->input->post('email');
        //$foto_lokasi = $this->input->post('foto_lokasi');
        $password = $this->input->post('password');
		$data = array(
			'id_mitra' => $id_mitra,
			'username' => $username,
			'nama_katering' => $nama_katering,
			'nama_pemilik' => $nama_pemilik,
			'alamat' => $alamat,
            'no_telepon' => $no_telepon,
            'email'=>  $email,
			//'foto_lokasi'=>$foto_lokasi,
			'password' => $password			

			);
		$this->model_hewan->tambah_mitra($data,'mitra');
		redirect('admin/data_mitra/index');
	}
	//fungsi untuk hapus data
	public function hapus($id_mitra){
		$where = array('id_mitra' => $id_mitra);
		$this->model_hewan->hapus_data($where,'mitra');
		redirect('admin/data_mitra');
    }
	//ini untuk edit 
	public function edit($id_mitra){
		$where = array('id_mitra' => $id_mitra);
		$data['mitra'] = $this->model_hewan->edit_data($where,'mitra')->result();
		$this->load->view('admin/formedit',$data);
	}
	//ini untuk menyimpan data yang sudah di edit ke dalam database. data yang sudah di update akan ditampilkan kembali ke dalam halaman tampil
	
	function cancel(){ //untuk button cancel yang diarahkan ke halaman tampil
		redirect ('admin/data_mitra');
	}
	
}
    