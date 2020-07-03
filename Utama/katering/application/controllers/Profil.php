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
                $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('nama')])->row_array();

                //membuat aturan atau syarat untuk mengubah data pada tabel mitra
                $this->form_validation->set_rules('nama_admin', 'Nama Lengkap', 'required');
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('alamat', 'Alamat', 'required');
                $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required');

                if($this->form_validation->run() == false ){
                    $this->load->view('templates/v_header');
		            $this->load->view('templates/v_sidebar');
		            $this->load->view('vprofile',$data);
		            $this->load->view('templates/v_footer');

                }else{ 
                    //perintah untuk menginputkan data dengan input->post
                $username = $this->input->post('username');
                $nama_admin = $this->input->post('nama_admin');
                $alamat = $this->input->post('alamat');
                $no_telepon = $this->input->post('no_telepon');
                //membuat perintah agar bisa menginputkan foto kedalam database
                $foto = $_FILES['foto']['name'];
                if($foto){
                    $config ['upload_path'] = './assets/img/admin/';
                    $config ['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config ['max_size'] = '2048';
    
                    $this->load->library('upload', $config);

                    if($this->upload->do_upload('foto')){
                        // perintah untuk menghapus foto lama jika ada foto baru yang diupload kecuali default.png
                        $foto_lama = $data['pelanggan']['foto'];
                        if($foto_lama != 'default.png'){
                            unlink(FCPATH.'/assets/img/profil/'.$foto_lama);
                        }
                        
                        $foto = $this->upload->data('file_name');
                        $this->db->set('foto', $foto);
                    }else{
                        echo $this->upload->display_errors();
                    }
                }
               

                $data = array(
                    'username' => $username,
                    'nama_admin' => $nama_admin,
                    'alamat' => $alamat,
                    'no_telepon ' => $no_telepon,
                    
                );
                $where = array(
                    'username' => $username
                );

                $this->m_profil->update($where,$data, 'admin');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role=""alert>Profil Telah di Ubah</div>');
                redirect('Profil');
                }
                
		}
}
	