<?php

class HomeController extends CI_Controller{

	public function __construct() 
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function main()
	{
             if($this->session->userdata('is_logged_in'))
             {
             	$this->load->model('DropdownModel');
             	$data['title']= 'Dropdown';
             	$data['groups'] = $this->DropdownModel->getAllGroups();
                $this->load->view('main', $data);
             }else{
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
		$this->load->view('login');
	}

	public function inputItem()
	{
		$this->load->helper('form');
		$this->load->view('input');
	}    
}
?>
