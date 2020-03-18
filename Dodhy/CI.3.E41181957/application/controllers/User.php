<?php 

class User extends CI_Controller{

    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("login")); //perintah untuk memeriksa status login, jika status tidak sama dengan login maka akan dikembalikan kehalaman login
        }

        
    }
    function index(){
        redirect(base_url("dashboard"));
    }
}



?>