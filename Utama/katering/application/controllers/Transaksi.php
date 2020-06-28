<?php
class Transaksi extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('nama'))
        {
			redirect(base_url());
		}
    }
    public function index(){
        $data['pesanan'] = $this->db->get('pesanan')->result_array();

        $this->load->view('templates/v_header');
		$this->load->view('templates/v_sidebar');
		$this->load->view('v_transaksi', $data);
		$this->load->view('templates/v_footer');
    }
}





?>