<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Pelanggan extends REST_Controller{

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('M_login');
    
    }

	//panggil di android dengan awalan, misal ingin memanggil login_post, cukup dengan mengetik login.


    public function register_post(){

            $username = $this->input->post('username');
			$nama_pelanggan = $this->input->post('nama_pelanggan');
			$alamat = $this->input->post('alamat');
			$no_telepon = $this->input->post('no_telepon');
			$email = $this->input->post('email');
			//$foto_lokasi = $this->input->post('foto_lokasi');
			$password = $this->input->post('password');
			// $foto      = $_FILES['gambar']['name'];
			// 		if ($foto =''){}else{
			// 			$confiq ['upload_path'] = './uploads';
			// 			$confiq ['allowed_types'] = 'jpg|jpeg|png|gif';
	
			// 			$this->load->library('upload', $confiq);
			// 			if (!$this->upload->do_upload('foto')){
			// 				echo "Gambar Yang Anda Upload Gagal Rek!!";
			// 			}else{
			// 				$foto=$this->upload->data('file_name');
			// 			}
			// 		}
			$data = array(
				
				'username' => $username,
				'nama_pelanggan' => $nama_pelanggan,
				'alamat' => $alamat,
				'no_telepon' => $no_telepon,
				'email'=>  $email,
				// 'foto'=>$foto,
				'password' => md5 ($password)			
	
				);
			$hasil = $this->M_login->buatakun($data,'pelanggan');
            // $data['kodeunik'] = $this->M_login->buat_kode();
            
            if($hasil == true){
                $this->response(array('status' => $hasil, 'message' => 'Register success'), REST_Controller::HTTP_OK);
            }else{
                $this->response(array('status' => $hasil, 'message' => 'Register gagal'), REST_Controller::HTTP_BAD_REQUEST); 
            }

            }

			
            public function login_post(){
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				//mengubah data string pada database menjadi bentuk array
				$where = array(
					'username' => $username,
					'password' => ($password)
				);
				$cek = $this->M_login->cek_login("pelanggan", $where)->num_rows();
				if(!$cek){
					$this->response(array('status' => false, 'message' => 'Username dan password salah'), REST_Controller::HTTP_OK);
				}else{
					$this->response(array('status' => true, 'message' => 'Silahkan masuk', 'response'=>$cek), REST_Controller::HTTP_BAD_REQUEST); 
				}
        	}
    }




?>