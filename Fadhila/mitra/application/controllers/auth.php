<?php  

    class auth extends CI_Controller {

function __construct(){
		parent::__construct();	
		if(!$this->session->userdata('nama'))
		{
			redirect(base_url());
		}
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
		$foto_lokasi         = $_FILES['gambar']['name'];
                if ($foto_lokasi =''){}else{
                    $confiq ['upload_path'] = './uploads';
                    $confiq ['allowed_types'] = 'jpg|jpeg|png|gif';

                    $this->load->library('upload', $confiq);
                    if (!$this->upload->do_upload('foto_lokasi')){
                        echo "Gambar Yang Anda Upload Gagal Rek!!";
                    }else{
                        $foto_lokasi=$this->upload->data('file_name');
                    }
                }
		$data = array(
			'id_mitra' => $id_mitra,
			'username' => $username,
			'nama_katering' => $nama_katering,
			'nama_pemilik' => $nama_pemilik,
			'alamat' => $alamat,
            'no_telepon' => $no_telepon,
            'email'=>  $email,
			'foto_lokasi'=>$foto_lokasi,
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
		$data['mitra'] = $this->model_hewan->edit_hewan($where,'mitra')->result();

		$data['kodeunik'] = $this->model_hewan->buat_kode(); // variable $kodeunik merujuk ke file model_user.php pada function buat_kode. paham kan ya? harus paham dong
		   
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/edit_mitra', $data);
		$this->load->view('template_admin/footer');

		
		
	}

	public function update ($id_mitra){
		$id_mitra = $this->input->post('id_mitra');
		$username = $this->input->post('username');
		$nama_katering = $this->input->post('nama_katering');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$alamat = $this->input->post('alamat');
        $no_telepon = $this->input->post('no_telepon');
        $email = $this->input->post('email');
     /*data yang sudah diedit akan dimasukkan ke variabel $data*/
        $data = array(
			'id_mitra' => $id_mitra,
			'username' => $username,
			'nama_katering' => $nama_katering,
			'nama_pemilik' => $nama_pemilik,
			'alamat' => $alamat,
            'no_telepon' => $no_telepon,
            'email'=>  $email,
			//'foto_lokasi'=>$foto_lokasi,
			
        );
     /*dan where yang menjadi penentu id yg mana untuk di update */
        $where = array(
            'id_mitra' => $id_mitra
        );
     
        $this->model_hewan->update_data($where,$data,'mitra');
        redirect('admin/data_mitra');
	}
	//ini untuk menyimpan data yang sudah di edit ke dalam database. data yang sudah di update akan ditampilkan kembali ke dalam halaman tampil
	
	function cancel(){ //untuk button cancel yang diarahkan ke halaman tampil
		redirect ('admin/data_mitra/index');
	}
	
}
    