<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Belajar extends CI_Controller { /*kelas belajar dengan controller CI */
	
	function __construct(){
		parent::__construct();
		
	}
 
	public function index(){ /*method */
		echo "ini method index pada controller belajar index";
	}
 
	public function halo(){ /*menampilakan Vbelajar */
		$this->load->view('v_belajar');
    }
    public function hai(){ /*parsing*/
        $data['nama_web'] = "MalasNgoding.com";
        $this->load->view('view_belajar',$data);
    }
    public function hei(){				
		$data = array(
			'judul' => "Cara Membuat View Pada CodeIgniter",
			'tutorial' => "CodeIgniter"
			);
		$this->load->view('view_coba', $data);
    }
  		 
	function user(){ /*mengambil data pada pada database melalui mdata kemudian ditampilkan di vuser*/
        $this->load->model('m_data');
		$data['user'] = $this->m_data->ambil_data()->result();
		$this->load->view('v_user.php',$data);
	}
 
}

?>