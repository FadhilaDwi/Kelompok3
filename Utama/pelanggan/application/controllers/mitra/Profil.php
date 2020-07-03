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
            // menampilkan data berdasarkan username mitra ketika melakukan login
                $data['mitra'] = $this->db->get_where('mitra', ['username' => $this->session->userdata('nama')])->row_array();
            

            //memberikan aturan atau syarat untuk mengubah data profil
                $this->form_validation->set_rules('nama_katering', 'Full Name', 'required');

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

                //perintah untuk memasukkan foto kedalam database
                $foto = $_FILES['foto_lokasi']['name'];
                if($foto){
                    $config ['upload_path'] = './assets/img/mitra/';
                    $config ['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config ['max_size'] = '2048';
    
                    $this->load->library('upload', $config);

                    if($this->upload->do_upload('foto_lokasi')){
                        //menghapus foto lama jika mitra menginputkan foto baru kedalam database kecuali default.png
                        $foto_lama = $data['mitra']['foto_lokasi'];
                        if($foto_lama != 'default.png'){
                            unlink(FCPATH.'/assets/img/profil/'.$foto_lama);
                        }
                        
                        $foto = $this->upload->data('file_name');
                        //untuk foto tidak disatukan kedalam data array dibawah untuk menghindari tampilan foto kosong ketika mengubah data 
                        $this->db->set('foto_lokasi', $foto);
                    }else{
                        echo $this->upload->display_errors();
                    }
                }
                $data = array(
                    'nama_katering' => $nama_katering,
                    'alamat' => $alamat,
                    'no_telepon ' => $no_telepon,
                    'email' => $email,
                );
                $where = array(
                    'username' => $username
                );

                $this->m_profil->update($where,$data, 'mitra');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role=""alert>Profil Telah di Ubah</div>');
                redirect(base_url('mitra/Profil'));
                }
                
		}
}
	