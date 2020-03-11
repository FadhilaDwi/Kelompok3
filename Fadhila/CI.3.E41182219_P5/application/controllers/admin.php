<?php 
 
class admin extends CI_Controller{
 
    function __construct(){
		parent::__construct();		
		$this->load->model('mdata');
                $this->load->helper('url');
	}
 
	function index(){
		$data['pendaftaran'] = $this->mdata->tampil_data()->result();
        $this->load->view('form',$data);
    }
    
}