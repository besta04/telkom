<?php

class HomeController extends CI_Controller{

	public function __construct() 
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function iciplaa()
	{
		$this->load->view('test');
	}
	

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('index');
	}

	public function main()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$this->load->view('mainPage');
		}
		else
		{
			redirect('HomeController/restricted');
		}	
	}
       
    public function berhasil()
    {
    	$this->load->view('berhasil');
    }
      
    public function restricted()
    {
    	$this->load->view('restricted');
    }

	public function login()
	{
		$this->load->helper('form');
		$this->load->view('login');
	}

	public function inputItem()
	{
		$this->load->helper('form');
		$this->load->view('input');
	}    
}
?>
