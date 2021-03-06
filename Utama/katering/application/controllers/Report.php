<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('nama'))
		{
			redirect(base_url());
		}
		$this->load->model('m_report'); //digunakan untuk memanggil model m_dashboard
		$this->load->helper('url');
	}

	public function index()
	{
		$data['komentar'] = $this->m_report->tampil_data()->result(); //berfungsi untuk menampilkan data sesuai model yang telah ditentukan
		// perintah untuk memanggil view
		$this->load->view('templates/v_header');
		$this->load->view('templates/v_sidebar');
		$this->load->view('v_report', $data);
		$this->load->view('templates/v_footer');
	}

}
