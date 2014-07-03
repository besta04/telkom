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
        	//$id_site = $this->input->post('boxLokasi');
			$this->load->database();
			//$this->db->select('ID_ORDER');
			//$this->db->from('TABEL_ORDER');
			//$this->db->where('SURAT_PESANAN', $temp);
			$order = $this->db->query("SELECT ID_ORDER FROM TABEL_ORDER WHERE SURAT_PESANAN = '".$id_order."'");
			//$lokasi = $this->db->query("SELECT ID_SITE FROM TABEL_SITE WHERE NAMA_LOKASI = '".$id_site."'");
        	$temp3 = $order->first_row()->ID_ORDER;
        	//$temp2 = $lokasi->first_row()->ID_SITE;
        	$data = array(
            	     'DIVISI' => $this->input->post('boxDivisi'),
                    'REGION' => $this->input->post('boxRegional'),
                    'NAMA_PROJECT' => $this->input->post('boxProject'),
                    'PROJECT_SP' => $this->input->post('boxProject/SP'),
                    'SP' => $this->input->post('boxSP'),
                    'ID_ORDER' => $temp3,
                    'WITEL' => $this->input->post('boxWitel'),
                    'ID_SITE' => $this->input->post('boxIdSite'),
                    'NAMA_LOKASI' => $this->input->post('boxLokasi'),
                    'ALAMAT' => $this->input->post('boxAlamat'),
                    'ORDERS' => $this->input->post('boxOrder'),
                    'KLAS_STAT_PROGRESS' => $this->input->post('boxKlasifikasi'),
                    'STAT_PROGRESS' => $this->input->post('boxStatus'),
                    'KETERANGAN' => $this->input->post('boxKeterangan')
                    );
         //$this
			//$this->db->insert('tabel_lme_main',$data);
        	$this->load->model('RekapModel');
         $result = $this->RekapModel->insert_entry($data);
        if($result==true)
        {
            $stat = 'Insert';
            redirect('HomeController/berhasil/' . $stat);
        }
        else
        {
            echo "<script> alert('Insert gagal') </script>";
            header('Refresh:1, URL=../../HomeController/inputItem/' . $id);
        }
        //}
        //else
        //{
        //echo"tidak lengkap bro";
        //$this->load->view('tambahPC');
        //}
    }

    public function UpdateValidation($id)
    {
        $this->load->library('form_validation');
        $this->load->helper('url');

        $surat = $this->input->post('boxSurat');
        $lokasi = $this->input->post('boxLokasi');
        $this->load->database();
        $id_order = $this->db->query("SELECT ID_ORDER FROM TABEL_ORDER WHERE SURAT_PESANAN = '".$surat."'");
        $id_lokasi = $this->db->query("SELECT ID_SITE FROM TABEL_SITE WHERE NAMA_LOKASI = '".$lokasi."'");
        $temp3 = $id_order->first_row()->ID_ORDER;
        $temp2 = $id_lokasi->first_row()->ID_SITE;
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
        $this->load->model('RekapModel');
        $result = $this->RekapModel->update_entry($data, $id);
        //echo "<script> alert('" . $result . "') </script>";
        if($result==true)
        {
            $stat = 'Update';
            redirect('HomeController/berhasil/' . $stat);
        }
        else
        {
            echo "<script> alert('Update gagal') </script>";
            header('Refresh:1, URL=../../HomeController/editItem/' . $id);
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */