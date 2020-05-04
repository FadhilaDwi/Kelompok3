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
	$username = $this->post('username');
	$email = $this->post('email');
	$where = array(
		'username' => $username,
		'email' => $email		
	);
	$cek=$this->M_login->cekuser("pelanggan",$where)->num_rows();
	if ($cek){
					
		echo"Username atau email sudah dipakai bos";
   
   }else{
	$username = $this->post('username');
	$nama_pelanggan = $this->post('nama_pelanggan');
	$email = $this->post('email');
	$password = $this->post('password');
	$data = array(
		'username' => $username,
		'nama_pelanggan' => $nama_pelanggan,				
		'email'=>  $email,
		'password' => md5 ($password)			
		);
	$hasil = $this->M_login->buatakun($data,'pelanggan');
	if($hasil==true){
		$response["value"] = 1;
		$response["message"] = "sukses daftar bos ";
		echo json_encode($response);
	}else{
		echo "gagal daftar bos" ;
	}

	}
				   
			   }

    //public function register_post(){

      //      $username = $this->post('username');
		//	$nama_pelanggan = $this->post('nama_pelanggan');
		//	$email = $this->post('email');
		//	$password = $this->post('password');
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
		//	$data = array(
		//		'username' => $username,
		//		'nama_pelanggan' => $nama_pelanggan,				
		//		'email'=>  $email,
		//		'password' => md5 ($password)			
	
		//		);
		//	$hasil = $this->M_login->buatakun($data,'pelanggan');
            // $data['kodeunik'] = $this->M_login->buat_kode();
            
            //if($hasil==true){
			//	$response["value"] = 1;
			//	$response["message"] = "sukses daftar bos ";
			//	echo json_encode($response);
            //}else{
			//	echo "gagal daftar bos" ;
            //}

            //}

			
            public function login_post(){
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				//mengubah data string pada database menjadi bentuk array
				$where = array(
					'username' => $username,
					'password' => md5 ($password)
				);
				$cek = $this->M_login->cek_login("pelanggan", $where)->num_rows();
				if(	!$cek){
					
     echo"Gagal login bos";

}else{
     $response["value"] = 1;
     $response["message"] = "sukses login bos ";
     echo json_encode($response); //merubah respone menjadi JsonObject  
				}
        	}
    }

?>