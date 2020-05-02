<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Mitra extends REST_Controller{

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('M_login');
    }

    public function login_post(){
                $username = $this->input->post('username');
				$password = $this->input->post('password');
				//mengubah data string pada database menjadi bentuk array
				$where = array(
					'username' => $username,
					'password' => ($password)
				);
				$cek = $this->M_login->cek_login("mitra", $where)->num_rows();
				if(!$cek){
					$this->response(array('status' => false, 'message' => 'Username dan password salah'), REST_Controller::HTTP_OK);
				}else{
					$this->response(array('status' => true, 'message' => 'Silahkan masuk', 'response'=>$cek), REST_Controller::HTTP_BAD_REQUEST); 
				}
    }
}
?>