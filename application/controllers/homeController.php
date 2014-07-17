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
	    $category['name'] = 'WAKTU';
	        
	    $series1 = array();
	    $series1['name'] = 'NON PROGRESS';

	    $series2 = array();
	    $series2['name'] = 'SURVEY';

	    $series3 = array();
	    $series3['name'] = 'ON PROGRESS';
	        
	    $series4 = array();
	    $series4['name'] = 'SELESAI INSTALASI';
	    
	    $series5 = array();
	    $series5['name'] = 'REKON';

	    $series6 = array();
	    $series6['name'] = 'KENDALA SITAC';

	    $series7 = array();
	    $series7['name'] = 'KENDALA NON SITAC';

	    $series8 = array();
	    $series8['name'] = 'BATAL';

	    foreach ($data as $row)
	    {
	        $category['data'][] = $row->WAKTU;
	        $series1['data'][] = $row->NON_PROGRESS;
	        $series2['data'][] = $row->SURVEY;
	        $series3['data'][] = $row->ON_PROGRESS;
	        $series4['data'][] = $row->SELESAI_INSTALASI;
	        $series5['data'][] = $row->REKON;
	        $series6['data'][] = $row->KENDALA_SITAC;
	        $series7['data'][] = $row->KENDALA_NON_SITAC;
	        $series8['data'][] = $row->BATAL;
	    }
	        
	    $result = array();
	    array_push($result,$category);
	    array_push($result,$series1);
	    array_push($result,$series2);
	    array_push($result,$series3);
	    array_push($result,$series4);
	    array_push($result,$series5);
	    array_push($result,$series6);
	    array_push($result,$series7);
	    array_push($result,$series8);
	    
	    print json_encode($result, JSON_NUMERIC_CHECK);
	}
	
	// fungsi manggil view chart
	public function statusProgress()
	{
		// kalo sudah login
		if($this->session->userdata('is_logged_in'))
		{
			$this->load->view('test');
		}
		// kalo belum login, gabisa masuk
		else
		{
			redirect('HomeController/restricted');
		}	
	}

	// fungsi halaman utama sebelum login
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('index');
	}

	// fungsi halaman utama sesudah login
	public function main()
	{
		if($this->session->userdata('is_logged_in'))
		{
			// kalo admin
			if($this->session->userdata('is_admin'))
			{
				$this->load->view('mainPage');
			}
			// kalo bukan admin (user)
			else if($this->session->userdata('is_staff'))
			{
				$this->load->view('mainPageStaff');
			}
		}
		else
		{
			redirect('HomeController/restricted');
		}	
	}
       
    // fungsi manggil view kalau berhasil insert/update
    public function berhasil($stat = '')
    {
    	$data = array('stat' => $stat);
    	$this->load->view('berhasil', $data);
    }
    
    // fungsi manggil view kalo gagal, karena belum login (restricted access)
    public function restricted()
    {
    	$this->load->view('restricted');
    }

    // fungsi manggil halaman utama setelah login
	public function login()
	{
		if($this->session->userdata('is_logged_in'))
	    {
	    	$this->load->helper('form');
	    	if($this->session->userdata('is_admin'))
			{
				$this->load->view('mainPage');
			}
			else if($this->session->userdata('is_staff'))
			{
				$this->load->view('mainPageStaff');
			}
	    }
	    else
	    {
	      redirect('HomeController/restricted');
	    }
	}

	// fungsi manggl halaman input item
	public function inputItem()
	{
		if($this->session->userdata('is_logged_in'))
	    {
	    	$this->load->helper('form');
	    	if($this->session->userdata('is_admin'))
			{
				$this->load->view('input');
			}
			else if($this->session->userdata('is_staff'))
			{
				$this->load->view('restricted');
			}
		}
	    else
	    {
	      redirect('HomeController/restricted');
	    }
	}    

	// fungsi manggil halaman edit item berdasarkan id yg diparsing
	public function editItem($id='')
	{
		if($this->session->userdata('is_logged_in'))
	    {
	    	$this->load->helper('form');
			$data = array('id' => $id);
	    	if($this->session->userdata('is_admin'))
			{
				$this->load->view('edit',$data);
			}
			else if($this->session->userdata('is_staff'))
			{
				$this->load->view('editStaff',$data);
			}
	    }
	    else
	    {
	      redirect('HomeController/restricted');
	    }
	}


	public function reportDivre($id='')
	{
		if($this->session->userdata('is_logged_in'))
	    {
	    	$this->load->helper('form');
			$data = array('id' => $id);
	    	if($this->session->userdata('is_admin'))
			{
				$this->load->view('reportDivre',$data);
			}
			else if($this->session->userdata('is_staff'))
			{
				$this->load->view('reportDivre',$data);
			}
	    }
	    else
	    {
	      redirect('HomeController/restricted');
	    }
	}


	// fungsi manggil halaman konfirmasi delete
	public function deleteItem($id='')
	{
		if($this->session->userdata('is_logged_in'))
	    {
	    	if($this->session->userdata('is_admin'))
			{
				$data = array('id'=>$id);
				$this->load->view('delete',$data);
			}
			else if($this->session->userdata('is_staff'))
			{
				$this->load->view('restricted');
			}
	    }
	    else
	    {
	      redirect('HomeController/restricted');
	    }
	}
}
?>
