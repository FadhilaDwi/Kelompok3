<?php 

	class Profil extends Ci_Controller
{
		public function __construct()
		{
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('m_profil');
			if(!$this->session->userdata('nama'))
			{
				redirect (base_url());
			}
		}

		public function index()
		{
                $data['mitra'] = $this->db->get_where('mitra', ['username' => $this->session->userdata('nama')])->row_array();

                $this->form_validation->set_rules('nama_katering', 'Nama Lengkap', 'required');

                if($this->form_validation->run() == false ){
                    $this->load->helper('url');
                    $this->load->view('template_admin/header');
                    $this->load->view('template_admin/sidebar');
                    $this->load->view('mitra/vprofile', $data);
                    $this->load->view('template_admin/footer');

                }else{ 
                $username = $this->input->post('username');
                $nama_katering = $this->input->post('nama_katering');
                $email = $this->input->post('email');
                $alamat = $this->input->post('alamat');
                $no_telepon = $this->input->post('no_telepon');

                $foto = $_FILES['foto_lokasi']['name'];
                if ($foto =''){}else{
                    $confiq ['upload_path'] = './assets/img/profil/';
                    $confiq ['allowed_types'] = 'jpg|jpeg|png|gif';
    
                    $this->load->library('upload', $confiq);
                    if (!$this->upload->do_upload('foto')){
                        echo "Foto Yang Anda Upload Gagal Rek!!";
                    }else{
                        $foto=$this->upload->data('file_name');
                    }
                }

                $data = array(
                    'nama_katering' => $nama_katering,
                    'alamat' => $alamat,
                    'no_telepon ' => $no_telepon,
                    'email' => $email,
                    'foto_lokasi' => $foto
                );
                $where = array(
                    'username' => $username
                );

                $this->m_profil->update($where,$data, 'mitra');
                redirect(base_url('mitra/Profil'));
                }
                
		}
}
	