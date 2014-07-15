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

  // fungsi manggil halaman login
	public function login()
  {
    //$this->session->sess_destroy();
    $this->load->view('login');
	}
  
  // fungsi manggil halaman utama setelah login
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

  // fungsi login validasi
  public function loginValidation()
  {
    $this->form_validation->set_rules('boxUname','Username','required|valid_username');
    $this->form_validation->set_rules('boxPass','Password','required|callback_verifyUser');
    
    // jalankan form validation, klo salah balik ke login, klo bener lanjut
    if($this->form_validation->run()==false)
    {
      $this->load->view('login');
    }
    else
    {
      $username = $this->input->post('boxUname');
      $this->load->model('UserModel');

      // manggil fungsi untuk cek apakah dia admin/user biasa
      $result = $this->UserModel->GetPrevilege($username);

      // kalo admin
      if($result == 'admin')
      {
        $data = array(
                  'username' => $username,
                  'is_logged_in' => 1,
                  'is_admin' => 1
                  );

        // masukkin ke cookies kali yg login admin
        $this->session->set_userdata($data);
        redirect('HomeController/main');
      }

      // kalo user
      else if($result == 'staff')
      {
        $data = array(
                  'username' => $username,
                  'is_logged_in' => 1,
                  'is_staff' => 1
                  );

        // masukkin ke cookies kali yg login user biasa
        $this->session->set_userdata($data);
        redirect('HomeController/main');
      }

      // kalo gagal (gak ditemukan), balik ke login
      else
      {
        echo "<script> alert('Login tidak ditemukan') </script>";
        redirect('LoginController/login');
      }
    }
  }
        
  // fungsi verifikasi user, dipanggil ketika form validation dijalankan
  public function verifyUser()
  {
    // ambil username dari view
    $username = $this->input->post('boxUname');

    // ambil password dari view
    $password = $this->input->post('boxPass');
            
    $this->load->model('RekapModel');

    // panggil fungsi login dari model rekapmodel
    $result = $this->RekapModel->login($username,$password);

    if($result)
    {
      // kalo hasilnya bener, balik ke fungsi validation dgn hasil true
      return true;
    }
    else
    {
      // kalo salah ada pesan klo salah, balik ke fungsi validation dgn hasil false
      $this->form_validation->set_message('verifyUser','Incorrect Username or Password, please try again');
      return false;
    }
  }
	
  // fungsi logout, ballik ke halaman utama sebelum login
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('HomeController/');
  }
}

?>