<?php 

class dashboard extends CI_Controller{
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
        $data['mitra'] = $this->db->get_where('mitra', ['username' => $this->session->userdata('nama')])->row_array();
	
		$this->load->helper('url');
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('mitra/dashboardmitra', $data);
        $this->load->view('template_admin/footer');

    }
}