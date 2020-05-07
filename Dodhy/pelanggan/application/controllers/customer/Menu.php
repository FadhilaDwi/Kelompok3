<?php

    class Menu extends CI_Controller{


        public function __construct(){
            parent::__construct();
        }


        public function index(){
            $this->load->view('templates_customer/header');
            $this->load->view('customer/v_menu');
            $this->load->view('templates_customer/footer');
        }

    }






?>