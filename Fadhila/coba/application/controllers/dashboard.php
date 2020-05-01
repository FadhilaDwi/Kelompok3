<?php 

class dashboard extends CI_Controller{
    public function index()
    {
        $this->load->view('tamplate/header','tamplate/topbar') ;
        $this->load->view('tamplate/sidebar');
        $this->load->view('admin');
        $this->load->view('tamplate/footer');

    }

}