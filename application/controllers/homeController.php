<?php

class HomeController extends CI_Controller{

	public function __construct() 
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
      $this->load->model('data');
	}

	function process()
	{
  		if(isset($_POST["restore"])) 
  		{
    		echo "restored";
  		}
  		if(isset($_POST["deleted"]))
  		{
    	echo "deleted";
  		}   
	}	
	
	public function data()
	{
    $data = $this->data->get_data();
        
    $category = array();
    $category['name'] = 'STATUS';
        
    $series1 = array();
    $series1['name'] = 'JUMLAH';
        
    foreach ($data as $row)
    {
        $category['data'][] = $row->STATUS;
        $series1['data'][] = $row->JUMLAH;
    }
        
    $result = array();
    array_push($result,$category);
    array_push($result,$series1);
    
    print json_encode($result, JSON_NUMERIC_CHECK);
	}
	
	public function statusProgress()
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
       
    public function berhasil($stat = '')
    {
    	$data = array('stat' => $stat);
    	$this->load->view('berhasil', $data);
    }
    
    public function restricted()
    {
    	$this->load->view('restricted');
    }

	public function login()
	{
		if($this->session->userdata('is_logged_in'))
	    {
	      $this->load->helper('form');
	      $this->load->view('login');
	    }
	    else
	    {
	      redirect('HomeController/restricted');
	    }
	}

	public function inputItem()
	{
		if($this->session->userdata('is_logged_in'))
	    {
	    	$this->load->helper('form');
			$this->load->view('input');
		}
	    else
	    {
	      redirect('HomeController/restricted');
	    }
	}    

	public function editItem($id='')
	{
		if($this->session->userdata('is_logged_in'))
	    {
			$this->load->helper('form');
			$data = array('id' => $id);
			$this->load->view('edit',$data);
	    }
	    else
	    {
	      redirect('HomeController/restricted');
	    }
	}

	public function deleteItem($id='')
	{
		if($this->session->userdata('is_logged_in'))
	    {
			$data = array('id'=>$id);
			$this->load->view('delete',$data);
	    }
	    else
	    {
	      redirect('HomeController/restricted');
	    }
	}
}
?>
