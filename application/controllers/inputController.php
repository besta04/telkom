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
        	$id_order = $this->input->post('boxSurat');
        	$id_site = $this->input->post('boxLokasi');
			$this->load->database();
			//$this->db->select('ID_ORDER');
			//$this->db->from('TABEL_ORDER');
			//$this->db->where('SURAT_PESANAN', $temp);
			$order = $this->db->query("SELECT ID_ORDER FROM TABEL_ORDER WHERE SURAT_PESANAN = '".$id_order."'");
			$lokasi = $this->db->query("SELECT ID_SITE FROM TABEL_SITE WHERE NAMA_LOKASI = '".$id_site."'");
        	$temp3 = $order->first_row()->ID_ORDER;
        	$temp2 = $lokasi->first_row()->ID_SITE;
        	$data = array(
            	     'DIVISI' => $this->input->post('boxDivisi'),
                    'REGION' => $this->input->post('boxRegional'),
                    'NAMA_PROJECT' => $this->input->post('boxProject'),
                    'PROJECT_SP' => $this->input->post('boxProject/SP'),
                    'ID_ORDER' => $temp3,
                    'WITEL' => $this->input->post('boxWitel'),
                    'ID_SITE' => $temp2,
                    'ORDERS' => $this->input->post('boxOrder'),
                    'KLAS_STAT_PROGRESS' => $this->input->post('boxKlasifikasi'),
                    'STAT_PROGRESS' => $this->input->post('boxStatus'),
                    'KETERANGAN' => $this->input->post('boxKeterangan')
                    );
         //$this
			//$this->db->insert('tabel_lme_main',$data);
        	$this->load->model('RekapModel');
         $this->RekapModel->insert_entry($data);
			
         
         
         redirect('HomeController/berhasil');
        //}
        //else
        //{
        //echo"tidak lengkap bro";
        //$this->load->view('tambahPC');
        //}
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */