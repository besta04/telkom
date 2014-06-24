<?php 

class InputController extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
	}

	public function insert_validation()
	{
		$this->load->library('form_validation');
        $this->load->helper('url');
        //$this->form_validation->set_rules('nama','Nama','required');
        //$this->form_validation->set_rules('spek','Spek','required');
        //$this->form_validation->set_rules('pemilik','owner','required');
        
        //if($this->form_validation->run() )
        //{
        	$data = array(
            		'Divisi' => $this->input->post('boxDivisi'),
                    'Regional' => $this->input->post('boxRegional'),
                    'Lokasi' => $this->input->post('boxLokasi'),
                    'Status' => $this->input->post('boxStatus'),
                    'Keterangan' => $this->input->post('boxKeterangan')
                    );
        	$this->load->model('RekapModel');
            $this->RekapModel->insert_entry($data);
            redirect('HomeController/berhasil');
        //}
        //else
        //{
        	//echo"tidak lengkap bro";
            //$this->load->view('tambahPC');
       // }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */