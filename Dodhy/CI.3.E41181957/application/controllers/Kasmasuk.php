<?php 

class Kasmasuk extends CI_Controller{


    function __construct(){
        parent::__construct();
        $this->load->model('m_kas');
        $this->load->helper('url');
    }

    public function index(){
        $data['kas_masuk'] = $this->m_kas->tampil_data()->result(); //berfungsi untuk menampilkan data sesuai model yang telah ditentukan
        $data['hitung_jumlah'] = $this->m_kas->get_sum('kas_masuk'); //menjumlahkan semua data pada tabel kas_masuk
        // perintah untuk memanggil view
        $this->load->view('templates/v_header');
        $this->load->view('templates/v_sidebar');
        $this->load->view('v_kasmasuk', $data);
        $this->load->view('templates/v_footer');
    }

    function tambah_data(){
        //perintah ini digunakan untuk memasukkan data sesuai dengan kolom pada tabel database
        $bulan = $this->input->post('bulan');
        $keterangan = $this->input->post('keterangan');
        $uang = $this->input->post('uang');
        //mengubah data string pada database menjadi bentuk array
        $data = array(
            'bulan' => $bulan,
            'keterangan' => $keterangan,
            'uang' => $uang
        );
        $this->m_kas->tambah_data($data, 'kas_masuk'); //perintah yang digunakan untuk memasukkan data sesuai variabel yang telah ditentukan
        redirect('kasmasuk/index');

    }
    
    function input_data(){
        //perintah ini digunakan untuk memasukkan data sesuai dengan kolom pada tabel database
        $bulan = $this->input->post('bulan');
        $keterangan = $this->input->post('keterangan');
        $uang = $this->input->post('uang');
        //mengubah data string pada database menjadi bentuk array
        $data = array(
            'bulan' => $bulan,
            'keterangan' => $keterangan,
            'uang' => $uang
        );
        $this->m_kas->tambah_data($data, 'kas_keluar');//perintah yang digunakan untuk memasukkan data sesuai variabel yang telah ditentukan
        redirect('kaskeluar/index');
    }
}

?>