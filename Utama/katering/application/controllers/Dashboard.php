<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->load->view('templates/v_header');
		$this->load->view('templates/v_sidebar');
		$this->load->view('v_dashboard');
		$this->load->view('templates/v_footer');
	}

}
