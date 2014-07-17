<?php
class ReportController extends CI_Controller 
{
    public function __construct() {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->model("reportModel");
        $this->load->library("pagination");
        $this->load->helper("form");
        $this->load->library('session');
        }

    // fungsi untuk manggil view log
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

    public function R1($id='')
    {
        if($this->session->userdata('is_logged_in'))
        {
            $this->load->helper('form');
            $data = array('id' => $id);
            if($this->session->userdata('is_admin'))
            {
                $this->load->view('R1',$data);
            }
            else if($this->session->userdata('is_staff'))
            {
                $this->load->view('R1',$data);
            }
        }
        else
        {
          redirect('HomeController/restricted');
        }
    }

    public function log()
    {
        if($this->session->userdata('is_logged_in'))
        {
            $config = array();

            // halaman awal log
            $config["base_url"] = site_url() . "/ReportController/log";

            // jumlah total log
            $config["total_rows"] = $this->reportModel->log_count();

            // yang ditampilkan per halaman
            $config["per_page"] = 20;

            // jumlah segment untuk links
            $config["uri_segment"] = 3;

            // jumlah pilihan 
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = $choice>5 ? 5 : $choice;
     
            $this->pagination->initialize($config);
     
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            // ambil data log dari reportmodel
            $data["results"] = $this->reportModel->
                fetch_log($config["per_page"], $page);

            // buat pagination
            $data["links"] = $this->pagination->create_links();

            if($this->session->userdata('is_admin'))
            {
                $this->load->view("log", $data);
            }
            else if ($this->session->userdata('is_staff')) 
            {
                $this->load->view("mainPageStaff", $data);
            }
        }
        else
        {
          redirect('HomeController/restricted');
        }
    }

    // fungsi panggil view laporan
    public function report1() 
    {
        if($this->session->userdata('is_logged_in'))
        {
            $config = array();
            $config["base_url"] = site_url() . "/ReportController/report1";
            $config["total_rows"] = $this->reportModel->record_count();
            $config["per_page"] = 20;
            $config["uri_segment"] = 3;
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = $choice>5 ? 5 : $choice;
     
            $this->pagination->initialize($config);
     
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->reportModel->
                fetch_data($config["per_page"], $page);

            $data["regional"] = $this->reportModel->load_dropdown_region();
            $data["witel"] = $this->reportModel->load_dropdown_witel();
            $data["kota"] = $this->reportModel->load_dropdown_kota();
            $data["namaLokasi"] = $this->reportModel->load_dropdown_namaLokasi();
            $data["alamat"] = $this->reportModel->load_dropdown_alamat();
            $data["suratPesanan"] = $this->reportModel->load_dropdown("SURAT_PESANAN");
            $data["toc"] = $this->reportModel->load_dropdown("TOC");
            $data["order"] = $this->reportModel->load_dropdown("ORDERS");
            $data["status"] = $this->reportModel->load_dropdown("KLAS_STAT_PROGRESS");
            $data["statProg"] = $this->reportModel->load_dropdown("STAT_PROGRESS");
            $data["keterangan"] = $this->reportModel->load_dropdown("KETERANGAN");
            $data["tipe"] = $this->reportModel->load_dropdown("TIPE_LME");

            $data["links"] = $this->pagination->create_links();

            $dataa = array('num'=>$page);
            $this->session->set_userdata($dataa);

            if($this->session->userdata('is_admin'))
            {
                $this->load->view("report1", $data);
            }
            else if ($this->session->userdata('is_staff')) 
            {
                $this->load->view("report1Staff", $data);
            }
        }
        else
        {
          redirect('HomeController/restricted');
        }
    }

    // fungsi filter laporan
    public function search()
    {
        if($this->session->userdata('is_logged_in'))
        {     
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            // di set hanya pada result saat page pertama
            if($page == 0)
            {
                $dataa = array(
                    'regional'=>$this->input->post("regional"),
                    'witel'=>$this->input->post("witel"),
                    'kota'=>$this->input->post("kota"),
                    'namaLokasi'=>$this->input->post("namaLokasiText"),
                    'alamat'=>$this->input->post("alamat"),
                    'suratPesanan'=>$this->input->post("suratPesanan"),
                    'toc'=>$this->input->post("toc"),
                    'order'=>$this->input->post("order"),
                    'status'=>$this->input->post("status"),
                    'statProg'=>$this->input->post("statProg"),
                    'keterangan'=>$this->input->post("keterangan"),
                    'tipe'=>$this->input->post("tipe")
                    );
                $this->session->set_userdata($dataa);

                $dataIndex = array(
                    'regionalIndex'=>$this->input->post("regional_index"),
                    'witelIndex'=>$this->input->post("witel_index"),
                    'kotaIndex'=>$this->input->post("kota_index"),
                    'namaLokasiIndex'=>$this->input->post("namaLokasi_index"),
                    'alamatIndex'=>$this->input->post("alamat_index"),
                    'suratPesananIndex'=>$this->input->post("suratPesanan_index"),
                    'tocIndex'=>$this->input->post("toc_index"),
                    'orderIndex'=>$this->input->post("order_index"),
                    'statusIndex'=>$this->input->post("status_index"),
                    'statProgIndex'=>$this->input->post("statProg_index"),
                    'keteranganIndex'=>$this->input->post("keterangan_index"),
                    'tipeIndex'=>$this->input->post("tipe_index")
                    );
                $this->session->set_userdata($dataIndex);
            }
            
            $regional = $this->session->userdata('regional');
            $witel = $this->session->userdata('witel');
            $kota = $this->session->userdata('kota');
            $namaLokasi = $this->session->userdata('namaLokasi');
            $alamat = $this->session->userdata('alamat');
            $suratPesanan = $this->session->userdata('suratPesanan');
            $TOC = $this->session->userdata('toc');
            $order = $this->session->userdata('order');
            $status = $this->session->userdata('status');
            $statProg = $this->session->userdata('statProg');
            $keterangan = $this->session->userdata('keterangan');
            $tipe = $this->session->userdata('tipe');

            // panggil fungsi untuk isi dari dropdown di laporan
            $data["regional"] = $this->reportModel->load_dropdown_region();
            $data["witel"] = $this->reportModel->load_dropdown_witel();
            $data["kota"] = $this->reportModel->load_dropdown_kota();
            $data["namaLokasi"] = $this->reportModel->load_dropdown_namaLokasi();
            $data["alamat"] = $this->reportModel->load_dropdown_alamat();
            $data["suratPesanan"] = $this->reportModel->load_dropdown("SURAT_PESANAN");
            $data["toc"] = $this->reportModel->load_dropdown("TOC");
            $data["order"] = $this->reportModel->load_dropdown("ORDERS");
            $data["status"] = $this->reportModel->load_dropdown("KLAS_STAT_PROGRESS");
            $data["statProg"] = $this->reportModel->load_dropdown("STAT_PROGRESS");
            $data["keterangan"] = $this->reportModel->load_dropdown("KETERANGAN");
            $data["tipe"] = $this->reportModel->load_dropdown("TIPE_LME");

            $config = array();
            $config["base_url"] = site_url() . "/ReportController/search";
            $config["total_rows"] = $this->reportModel->record_filter_count($regional, $witel, $kota, $namaLokasi, $alamat, $suratPesanan, $TOC, $order, $status, $statProg, $keterangan, $tipe);
            $config["per_page"] = 20;
            $config["uri_segment"] = 3;
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = $choice > 5 ? 5 : $choice;
     
            $this->pagination->initialize($config);

            $data["results"] = $this->reportModel->
                filter_data($config["per_page"], $page, $regional, $witel, $kota, $namaLokasi, $alamat, $suratPesanan, $TOC, $order, $status, $statProg, $keterangan, $tipe);

            $data["links"] = $this->pagination->create_links();

            $dataa = array('num'=>$page);
            $this->session->set_userdata($dataa);

            if($this->session->userdata('is_admin'))
            {
                $this->load->view("report1", $data);
            }
            else if ($this->session->userdata('is_staff')) 
            {
                $this->load->view("report1Staff", $data);
            }
        }
        else
        {
          redirect('HomeController/restricted');
        }
    }
}
?>