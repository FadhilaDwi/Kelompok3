<?php  

    class data_admin extends CI_Controller {

        function __construct(){
            parent::__construct();	
            
            $this->load->model('model_hewan'); //untuk menjalankan perintah yang ada pada mdata
    
        }

        public function index()
        {
        $data['admin'] = $this->model_hewan->tampil_data()->result();   
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/data_admin', $data);
        $this->load->view('template_admin/footer');
        }

        public function tambah_aksi()
        {
            
            $username       = $this->input->post('username');
            $nama_admin            = $this->input->post('nama_admin');
            $alamat        = $this->input->post('alamat');
            $no_telepon    = $this->input->post('no_telepon');
            $foto         = $_FILES['foto']['name'];
            $password    = $this->input->post('password');

                if ($foto =''){}else{
                    $confiq ['upload_path'] = './uploads';
                    $confiq ['allowed_types'] = 'jpg|jpeg|png|gif';

                    $this->load->library('upload', $confiq);
                    if (!$this->upload->do_upload('foto')){
                        echo "Foto Yang Anda Upload Gagal Rek!!";
                    }else{
                        $foto=$this->upload->data('file_name');
                    }
                }
            $data = array(
                 
                'username'    => $username,
                'nama_admin'  => $nama_admin,
                'alamat'      => $alamat,
                'no_telepon'  => $no_telepon,
                'foto'        => $foto,
                'password'    => $password 
            );

            $this->model_hewan->tambah_admin($data, 'admin');
            redirect('admin/data_admin/index');
        }

        public function edit($id){
            $where = array('id_admin' => $id);
            $data['admin'] = $this->model_hewan->edit_admin($where, 'admin')->result();

            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/edit_admin', $data);
            $this->load->view('template_admin/footer');
        }

        public function update(){
            $id_admin       = $this->input->post('id_admin');
            $username       = $this->input->post('username');
            $nama_admin    = $this->input->post('nama_admin');
            $alamat        = $this->input->post('alamat');
            $no_telepon    = $this->input->post('no_telepon');
            $password      = $this->input->post('password');

            $data = array(

                'username'       => $username,
                'nama_admin'       => $nama_admin,
                'alamat'              => $alamat,
                'no_telepon'          => $no_telepon,
                'password'          => $password
            );

            $where = array(
                'id_admin' => $id_admin
            );

            $this->model_hewan->update_admin($where,$data,'admin');
            redirect('admin/data_admin/index');
        }

        public function hapus ($id){

            $where = array ('id_admin' => $id);
            $this->model_hewan->hapus_admin($where, 'admin');
            redirect('admin/data_admin/index');
        }
    }
