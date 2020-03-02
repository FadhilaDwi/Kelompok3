<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ngoding extends CI_Controller {
	function index(){
		// berfungsi untuk mengakses library yang kita buat
		$this->load->library('malasngoding');
		// menampilkan fungsi nama_saya
		$this->malasngoding->nama_saya();
				echo "<br/>";
				// menampilkan fungsi nama_kamu setelah menginputkan data
                $this->malasngoding->nama_kamu("Andi");
	}

}
?>