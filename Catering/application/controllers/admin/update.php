<?php  

    class update extends CI_Controller {

function __construct(){
		parent::__construct();	
		
		$this->load->model('model_hewan'); //untuk menjalankan perintah yang ada pada mdata
		
		$this->load->helper('url'); //untuk mengambil data yang disimpan sementara melalui url

    }
    
    public function index()
    {
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
			'password' => $password	
        );
     /*dan where yang menjadi penentu id yg mana untuk di update */
        $where = array(
            'id_mitra' => $id_mitra
        );
     
        $this->model_hewan->update_data($where,$data,'mitra');
        redirect('admin/data_mitra');
	}
	
}
    