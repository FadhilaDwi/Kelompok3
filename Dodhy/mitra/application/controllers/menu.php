<?php 

	class menu extends Ci_Controller
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
                $data['mitra'] = $this->db->get_where('mitra', ['username' => $this->session->userdata('nama')])->row_array();

               
                    $this->load->helper('url');
                    $this->load->view('template_admin/header');
                    $this->load->view('template_admin/sidebar');
                    $this->load->view('dashboardmitra', $data);
                    $this->load->view('template_admin/footer');

               
		}
}
	