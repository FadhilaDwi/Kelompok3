<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
        $this->load->model('m_login');
        $this->load->library('form_validation');

	}

	function index(){
		$this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run()==false){
        $data['title']='Login Page';
        $this->load->view('template/auth_header', $data);
        $this->load->view('v_login');
        $this->load->view('template/auth_footer');  
    } else    {
        $this-> _login();
        }
    } 
	
	
	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user',['email'=> $email])->row_array();
		if($user){

				if($password == $user['password']){
				$data=[
					'email'=>$user['email'],
					'role_id'=>$user['role_id']
				];
				$this->session->set_userdata($data);
				if($user['role_id'] == 1){
					redirect('admin');
				}else{
						redirect('user');
					}
			}else{

				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Wrong Email or Password!!!
			  </div>');
				redirect(base_url("login"));
			}
		
		}

	}

	function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       You Have Been Logged Out
      </div>');
     
		redirect(base_url("login"));
	}
}