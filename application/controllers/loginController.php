<?php 

class LoginController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->library('session');
	}

	public function login()
  {
    $this->session->sess_destroy();
    $this->load->view('login');
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
  public function loginValidation()
  {
    $this->form_validation->set_rules('boxUname','username','required|valid_username');
    $this->form_validation->set_rules('boxPass','password','required|callback_verifyUser');
            
    if($this->form_validation->run()==false)
    {
      $this->load->view('login');
    }
    else
    {
      $data = array(
                  'username' => $this->input->post('username'),
                  'is_logged_in' => 1
                  );
      $this->session->set_userdata($data);
      redirect('HomeController/main');
    }
  }
        
  public function verifyUser()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
            
    $this->load->model('RekapModel');
    if($this->RekapModel->login($username,$password))
    {
      return true;
    }
    else
    {
      $this->form_validation->set_message('verifyUser','incorrect Username or Password, please try again');
      return false;
    }
  }
	
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('LoginController/login');
  }
}

?>