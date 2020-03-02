<?php

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
	}

	public function index()
	{
        // berfungsi menampilkan halaman overview
        $this->load->view("admin/overview");
	}
}