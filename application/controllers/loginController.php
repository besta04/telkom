<?php 

class LoginController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->helper(array('form'));
	}

	public function login()
  {
    //$this->session->sess_destroy();
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
    $this->form_validation->set_rules('boxUname','Username','required|valid_username');
    $this->form_validation->set_rules('boxPass','Password','required|callback_verifyUser');
    //echo "masuk";
    if($this->form_validation->run()==false)
    {
      $this->load->view('login');
    }
    else
    {
      //$this->session->set_userdata($array);
      $username = $this->input->post('boxUname');
      $this->load->model('UserModel');
      $result = $this->UserModel->GetPrevilege($username);
      if($result == 'admin')
      {
        $data = array(
                  'username' => $username,
                  'is_logged_in' => 1,
                  'is_admin' => 1
                  );
        $this->session->set_userdata($data);
        redirect('HomeController/main');
      }
      else if($result == 'staff')
      {
        $data = array(
                  'username' => $username,
                  'is_logged_in' => 1,
                  'is_staff' => 1
                  );
        $this->session->set_userdata($data);
        redirect('HomeController/main');
      }
      else
      {
        echo "<script> alert('Login tidak ditemukan') </script>";
        redirect('LoginController/login');
      }
      
    }
  }
        
  public function verifyUser()
  {
    $username = $this->input->post('boxUname');
    $password = $this->input->post('boxPass');
            
    $this->load->model('RekapModel');
    $result = $this->RekapModel->login($username,$password);
    if($result)
    {
      return true;
    }
    else
    {
      $this->form_validation->set_message('verifyUser','Incorrect Username or Password, please try again');
      return false;
    }
  }
	
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('HomeController/');
  }
}

?>