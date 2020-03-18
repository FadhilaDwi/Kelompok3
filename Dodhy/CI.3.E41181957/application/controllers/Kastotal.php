<?php 

class Kastotal extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_kas');
        $this->load->helper('url');
    }

    function index(){
        $data['kas_total'] = $this->m_kas->gabungan_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_total');
        $this->load->view('templates/footer');
    }

}



?>