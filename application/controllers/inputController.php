<?php 

class InputController extends CI_Controller 
{
    public $para;

	public function __construct() 
	{
		parent::__construct();
        $para = $this->input->post('boxKlasifikasi');
	}

    // fungsi validasi input item baru
	public function insert_validation()
	{
        $this->load->library('form_validation');
        $this->load->helper('url');

        $id_order = $this->input->post('boxSurat');
        $this->load->database();
		$order = $this->db->query("SELECT ID_ORDER FROM TABEL_ORDER WHERE SURAT_PESANAN = '".$id_order."'");
		$temp3 = $order->first_row()->ID_ORDER;
        $data = array(
                'ID_ORDER' => $temp3,
                'DIVRE' => $this->input->post('boxDivre'),
                'WITEL' => $this->input->post('boxWitel'),
                'KOTA' => $this->input->post('boxKota'),
                'NAMA_LOKASI' => $this->input->post('boxLokasi'),
                'ALAMAT' => $this->input->post('boxAlamat'),
                'TYPE_LME' => $this->input->post('boxTipe'),
                'ORDERS' => $this->input->post('boxOrder'),
                'KLASIFIKASI_STATUS_SMILE' => $this->input->post('boxKlasifikasi'),
                'STATUS_PROGRESS_WIFI' => $this->input->post('boxStatus'),
                'ALASAN_STATUS_PROGRESS' => $this->input->post('boxKeterangan')
                );

        $this->load->model('RekapModel');
        $this->db->set('waktu', 'NOW()', FALSE);
        $data2 = array(
                    'keterangan' => 'INSERT DATA BARU',
		  			'subjek' => $this->session->userdata('username'),
		  			'witel' => $this->input->post('boxWitel'),
                    'kota' => $this->input->post('boxKota'),
                    'lokasi' => $this->input->post('boxLokasi'),
                    'from' => '-',
                    'to' => '-'
                    );
		  
		$result = $this->RekapModel->log_insert($data2);
        $result = $this->RekapModel->insert_entry($data);

        if($result==true)
        {
            $stat = 'Insert';
            redirect('HomeController/berhasil/' . $stat);
        }

        // klo gagal, balik ke input item
        else
        {
            echo "<script> alert('Insert gagal') </script>";
            header('Refresh:1, URL=../../HomeController/inputItem/' . $id);
        }
    }

    // fungsi untuk update item, sebagian besar sama kayak inservalidation
    public function UpdateValidation($id)
    {
        $this->load->library('form_validation');
        $this->load->helper('url');
        $surat = $this->input->post('boxSurat');
        $this->load->database();
        $id_order = $this->db->query("SELECT ID_ORDER FROM TABEL_ORDER WHERE SURAT_PESANAN = '".$surat."'");
        $temp3 = $id_order->first_row()->ID_ORDER;
        $data = array(
            'DIVRE' => $this->input->post('boxDivre'),
            'WITEL' => $this->input->post('boxWitel'),
            'KOTA' => $this->input->post('boxKota'),
            'ID_ORDER' => $temp3,
            'NAMA_LOKASI' => $this->input->post('boxLokasi'),
            'ALAMAT' => $this->input->post('boxAlamat'),
            'TYPE_LME' => $this->input->post('boxTipe'),
            'ORDERS' => $this->input->post('boxOrder'),
            'KLASIFIKASI_STATUS_SMILE' => $this->input->post('boxKlasifikasi'),
            'STATUS_PROGRESS_WIFI' => $this->input->post('boxStatus'),
            'ALASAN_STATUS_PROGRESS' => $this->input->post('boxKeterangan')
            );
        $this->load->model('RekapModel');
        $data2 = array(
                        'keterangan' => 'UPDATE DATA',
                        'subjek' => $this->session->userdata('username'),
                        'witel' => $this->input->post('boxWitel'),
                        'lokasi' => $this->input->post('boxLokasi'),
                        'kota' => $this->input->post('boxKota'),
                        'from' => $this->session->userdata('from'),
                        'to' => $this->input->post('boxKlasifikasi'),

            );
        $this->db->set('waktu', 'NOW()', FALSE);

        // insert ke log klo sudah update data
        $result = $this->RekapModel->log_insert($data2);

        // panggil ke model rekapmodel untuk update data
        $result = $this->RekapModel->update_entry($data, $id);
        
        if($result==true)
        {
            $stat = 'Update';
            redirect('HomeController/berhasil/' . $stat);
        }
        else
        {
            echo "<script> alert('Update gagal') </script>";
            header('Refresh:1, URL=../../ReportController/editItem/' . $id);
        }
    }

    // fungsi delete item
    public function DeleteValidation($id)
    {
        $con=mysqli_connect("localhost","root","root","telkom_lme");
        if (mysqli_connect_errno())
        {
          echo "Failed to connect : ". mysqli_connect_error();
        }
        $resultDelete = mysqli_query($con,"select witel, alamat from tabel_lme_main where id_lme =".$id);
        $rows = mysqli_fetch_array($resultDelete);
        $this->load->model('RekapModel');
        $data2 = array(
                        'keterangan' => 'DELETE',
                        'subjek' => $this->session->userdata('username'),
                        'witel' => $rows['witel'],
                        'lokasi' => $rows['alamat'],
                        'kota' => $this->input->post('boxKota'),
                        'from' => '-',
                        'to' => '-'
            );
        $this->db->set('waktu', 'NOW()', FALSE);

        // insert ke log kalo sudah delete data
        $result = $this->RekapModel->log_insert($data2);

        // delete entry, panggil ke model rekapmodel
        $result = $this->RekapModel->delete_entry($id);
        if($result==true)
        {
            $stat = 'Delete';
            redirect('HomeController/berhasil/' . $stat);
        }
        else
        {
            echo "<script> alert('Delete gagal') </script>";
            header('Refresh:1, URL=../../ReportController/report1/');
        } 
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */