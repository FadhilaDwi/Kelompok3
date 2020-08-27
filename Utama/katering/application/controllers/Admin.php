<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
        parent::__construct();
        if(!$this->session->userdata('nama'))
		{
			redirect(base_url());
		}
		$this->load->model('m_dashboard'); //digunakan untuk memanggil model m_dashboard
		$this->load->helper('url');
	}

	public function index()
	{
		$data['admin'] = $this->m_dashboard->tampil_data()->result(); //berfungsi untuk menampilkan data sesuai model yang telah ditentukan
		// perintah untuk memanggil view
		$this->load->view('templates/v_header');
		$this->load->view('templates/v_sidebar');
		$this->load->view('v_admin', $data);
		$this->load->view('templates/v_footer');
	}

	function tambah_data(){
        $username       = $this->input->post('username');
        $nama_admin            = $this->input->post('nama_admin');
        $alamat        = $this->input->post('alamat');
        $no_telepon    = $this->input->post('no_telepon');
        $password    = $this->input->post('password');
        $foto         = $_FILES['foto']['name'];
            if ($foto =''){}else{
                $confiq ['upload_path'] = '/assets/img/admin';
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
            'password'    => md5 ($password) 
        );

        $this->m_dashboard->tambah_data($data, 'admin');
        redirect('admin/index');
    }
	function hapus($id){
		$where = array('id_admin' => $id); // mengubah id menjadi bentuk array
		$this->m_dashboard->hapus_data($where,'admin'); //perintah untuk menghapus data sesuai dengan tabel dan id yang diinginkan
		redirect('admin/index');
	}
	function edit($id_admin){
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
                'password'          => md5 ($password)
            );

            $where = array(
                'id_admin' => $id_admin
            );

            $this->m_dashboard->update_data($where,$data,'admin');
            redirect('admin/index');
	}
}
