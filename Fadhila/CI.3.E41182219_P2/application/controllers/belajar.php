<?php

defined('BASEPATH') OR exit('No direct script access allowed');
 
class Belajar extends CI_Controller {
    
    // mengakses model m_data
	function __construct(){
        parent::__construct();
        $this->load->model('m_data');
		
	}
    
    // menampilkan halaman belajar.php di view
	public function index(){
		$this->load->view('belajar');
    }
    
    function user(){
        // berfungsi untuk mengambil data dari fungsi ambil_data di model m_data
        $data['user'] = $this->m_data->ambil_data()->result();
        // menampilkan data di v_user
        $this->load->view('v_user.php', $data);
    }
 
}

?>