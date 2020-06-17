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
          'id_menu' =>$id_menu,
          'id_mitra' =>$id_mitra,
          'nama_menu' =>$nama_menu,
          'foto' => $foto,
          'harga_menu' =>$harga_menu
      );

      
      //pada prosess receive hanya ada 1 barang pada tiap receiver karena pada tiap satu kode receive hanya memiliki 1 kode barang
      $this->m_profil->add($data,'menu');
     
      redirect(base_url('dashboard'));

    }

    public function editmenu()
    {
        $id_mitra = $this->input->post('id_mitra');
        $id_menu = $this->input->post('id_menu');
		$nama_menu = $this->input->post('nama_menu');
		$harga_menu = $this->input->post('harga_menu');
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
        'id_menu' =>$id_menu,
        'id_mitra' =>$id_mitra,
        'nama_menu' =>$nama_menu,
        'foto' => $foto,
        'harga_menu' =>$harga_menu
      );
      //pada prosess receive hanya ada 1 barang pada tiap receiver karena pada tiap satu kode receive hanya memiliki 1 kode barang
    $where1 = array(
        'id_menu' => $id_menu
    );

  
      $this->m_profil->update($where1,$data,'menu');
      redirect(base_url('dashboard'));

    }
    public function hapus($id_menu){
		$where = array('id_menu' => $id_menu);
		$this->m_profil->hapus_data($where,'menu');
        redirect('dashboard');
    }
}