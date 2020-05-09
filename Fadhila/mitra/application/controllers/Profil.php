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

                $this->form_validation->set_rules('nama_pelanggan', 'Nama Lengkap', 'required');

                if($this->form_validation->run() == false ){
                    $this->load->view('templates_customer/header');
                    $this->load->view('customer/v_profil', $data);
                    $this->load->view('templates_customer/footer');

                }else{ 
                $username = $this->input->post('username');
                $nama_pelanggan = $this->input->post('nama_pelanggan');
                $email = $this->input->post('email');
                $alamat = $this->input->post('alamat');
                $no_telepon = $this->input->post('no_telepon');

                $foto = $_FILES['foto']['name'];
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
                    'nama_pelanggan' => $nama_pelanggan,
                    'alamat' => $alamat,
                    'no_telepon ' => $no_telepon,
                    'email' => $email,
                    'foto' => $foto
                );
                $where = array(
                    'username' => $username
                );

                $this->m_profil->update($where,$data, 'pelanggan');
                redirect('customer/profil');
                }
                
		}
}
	