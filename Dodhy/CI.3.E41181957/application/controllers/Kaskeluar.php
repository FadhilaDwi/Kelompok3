<?php 

class Kaskeluar extends CI_Controller{


    function __construct(){
        parent::__construct();
        $this->load->model('m_kas');
        $this->load->helper('url');
    }

		
    public function index(){
        $data['kas_keluar'] = $this->m_kas->show_data()->result(); //berfungsi untuk menampilkan data sesuai model yang telah ditentukan
        $data['hitung_jumlah'] = $this->m_kas->get_sum('kas_keluar'); //menjumlahkan semua data pada tabel kas_keluar
        // perintah untuk memanggil view
        $this->load->view('templates/v_header');
        $this->load->view('templates/v_sidebar');
        $this->load->view('v_kaskeluar', $data);
        $this->load->view('templates/v_footer');
    }

}

?>