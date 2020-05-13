<?php 

class tambahmenu extends CI_Controller{
    public function __construct()
    {
		parent::__construct();	
		if(!$this->session->userdata('nama'))
		{
			redirect(base_url());
        }
        
        $this->load->model('m_profil'); //untuk menjalankan perintah yang ada pada mdata
    }
    public function index()
    {
        $id_mitra = $this->input->post('id_mitra');
        $id_menu = $this->input->post('id_menu');
		$nama_menu = $this->input->post('nama_menu');
		$harga_menu = $this->input->post('harga_menu');
		$tgl_set = $this->input->post('tgl_set');
       	$foto        = $_FILES['foto']['name'];
                if ($foto =''){}else{
                    $confiq ['upload_path'] = './uploads';
                    $confiq ['allowed_types'] = 'jpg|jpeg|png|gif';

                    $this->load->library('upload', $confiq);
                    if (!$this->upload->do_upload('foto')){
                        echo "Gambar Yang Anda Upload Gagal Rek!!";
                    }else{
                        $foto=$this->upload->data('file_name');
                    }
                }
        
    $data = array(
          'id_menu' =>$id_menu ,
          'nama_menu' =>$nama_menu ,
          'foto' => $foto
      );
      //pada prosess receive hanya ada 1 barang pada tiap receiver karena pada tiap satu kode receive hanya memiliki 1 kode barang
      $data1 = array(
        'id_mitra' =>$id_mitra,
        'id_menu' =>$id_menu ,
        'harga_menu' =>$harga_menu ,
        'tgl_set' => $tgl_set
    );
      $this->m_profil->add($data,'menu');
      $this->m_profil->add($data1,'detail_katering');
      redirect(base_url('dashboard'));

    }
}