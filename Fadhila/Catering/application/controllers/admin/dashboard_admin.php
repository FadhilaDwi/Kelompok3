<?php 

class dashboard_admin extends CI_Controller{
    public function __construct(){
		parent::__construct();	
		if(!$this->session->userdata('nama'))
		{
			redirect(base_url());
		}
		

    }
    public function index()
    {
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('template_admin/footer');

    }

}