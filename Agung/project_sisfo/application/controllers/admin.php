<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('role_id') != "1") {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Page Not Allowed to Access!!!
			  </div>');
      redirect(base_url("login"));
    }//function ini digunakan untuk memfilter agar halaman admin hanya dapat di akses oleh admin
    $this->load->library('form_validation');
  }
  public function index()
  {

    $data['title'] = 'Dashboard';
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar', $data);
    $this->load->view('admin/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('admin/footer');
  }//function ini digunakan untuk menampilkan halaman utama
  public function tutor()
  {
    $data['pengajar'] = $this->sisfo_model->get_data('pengajar')->result();
    $data['title'] = 'Dashboard';
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar', $data);
    $this->load->view('admin/topbar', $data);
    $this->load->view('admin/tutor', $data);
    $this->load->view('admin/footer');
  }//function ini digunakan pada halaman yang berisi daftar nama tutor
  public function create()
  {
    $data['pengajar'] = $this->sisfo_model->get_data('pengajar')->result();
    $data['title'] = 'Dashboard';
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar', $data);
    $this->load->view('admin/topbar', $data);
    $this->load->view('admin/form_tambah_data', $data);
    $this->load->view('admin/footer');
  }//function ini digunakan pada halaman yang digunakan untuk menambah tutor baru
  public function add()
  {
    $name = $this->input->post('name');
    $address = $this->input->post('address');
    $email = $this->input->post('email');
    $birthplace = $this->input->post('birthplace');
    $tanggal = $this->input->post('tanggal');

    $data = array(
      'nama' => $name,
      'alamat' => $address,
      'email' => $email,
      'tempat_lahir' => $birthplace,
      'tanggal_lahir' => $tanggal,


    );
    $this->sisfo_model->insert_data($data, 'pengajar');
    $this->session->set_flashdata('message', 'data success');
    redirect('admin/tutor');
  }//function ini digunakan untuk memproses data yang berasal dari halaman form_tambah_data untuk dimasukkan ke dalam database

  function hapus($id)
  {
    $where = array('id' => $id);
    $this->sisfo_model->hapus_data($where, 'pengajar');
    redirect('admin/tutor');
  }//function ini digunakan untuk menghapus data yang dipilih pada halaman tutor
  public function detail($id)
  {
    $data['pengajar'] = $this->sisfo_model->getDataById($id);
    $data['title'] = 'Dashboard';
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar', $data);
    $this->load->view('admin/topbar', $data);
    $this->load->view('admin/form_lihat_data', $data);
    $this->load->view('admin/footer');
  }//function ini digunakan untuk menampilkan data yang dipilih pada halaman tutor
  public function update($id)
  {
    $data['pengajar'] = $this->sisfo_model->getDataById($id);

    $this->form_validation->set_rules('name', 'Name', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar', $data);
      $this->load->view('admin/topbar', $data);
      $this->load->view('admin/form_ubah_data', $data);
      $this->load->view('admin/footer');
    } else {
      $this->sisfo_model->update_data();
      $this->session->set_flashdata('message', 'Data Has Been Change');
      redirect('admin/tutor');
    }
  }//function ini digunakan untuk mengupdate data yang dipilih pada halaman tutor
}
