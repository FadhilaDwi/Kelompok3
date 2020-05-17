<?php 

class authmitra extends CI_Controller{
    public function __construct()
    {
		parent::__construct();	
		if(!$this->session->userdata('nama'))
		{
			redirect(base_url());
        }
        
        $this->load->model('model_hewan'); //untuk menjalankan perintah yang ada pada mdata
    }
    public function index()
    {
        
	
		$this->load->helper('url');
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('vprofile');
        $this->load->view('template_admin/footer');

    }

    public function profil()
    {
        
	
		$this->load->helper('url');
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('vprofile');
        $this->load->view('template_admin/footer');

    }
}