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
                $data['pelanggan'] = $this->db->get_where('pelanggan', ['username' => $this->session->userdata('nama')])->row_array();

                //membuat aturan atau syarat untuk mengubah data pada tabel mitra
                $this->form_validation->set_rules('nama_pelanggan', 'Full Name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('alamat', 'Address', 'required');
                $this->form_validation->set_rules('no_telepon', 'Phone Number', 'required');

                if($this->form_validation->run() == false ){
                    $this->load->view('templates_customer/header');
                    $this->load->view('customer/v_profil', $data);
                    $this->load->view('templates_customer/footer');

                }else{ 
                    //perintah untuk menginputkan data dengan input->post
                $username = $this->input->post('username');
                $nama_pelanggan = $this->input->post('nama_pelanggan');
                $email = $this->input->post('email');
                $alamat = $this->input->post('alamat');
                $no_telepon = $this->input->post('no_telepon');

                //membuat perintah agar bisa menginputkan foto kedalam database
                $foto = $_FILES['foto']['name'];
                if($foto){
                    $config ['upload_path'] = './assets/img/profil/';
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
                    'nama_pelanggan' => $nama_pelanggan,
                    'alamat' => $alamat,
                    'no_telepon ' => $no_telepon,
                    'email' => $email
                );
                $where = array(
                    'username' => $username
                );

                $this->m_profil->update($where,$data, 'pelanggan');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role=""alert>Profil Telah di Ubah</div>');
                redirect('customer/profil');
                }
                
		}
}
	