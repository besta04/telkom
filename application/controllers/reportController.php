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

            $data["suratPesanan"] = $this->reportModel->load_dropdown("SURAT_PESANAN");
            $data["toc"] = $this->reportModel->load_dropdown("TOC");
            $data["namaLokasi"] = $this->reportModel->load_dropdown("NAMA_LOKASI");
            $data["namaProject"] = $this->reportModel->load_dropdown("NAMA_PROJECT");
            $data["projectSP"] = $this->reportModel->load_dropdown("PROJECT_SP");
            $data["witel"] = $this->reportModel->load_dropdown("WITEL");
            $data["order"] = $this->reportModel->load_dropdown("ORDERS");
            $data["status"] = $this->reportModel->load_dropdown("KLAS_STAT_PROGRESS");

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
                $dataa = array('suratPesanan'=>$this->input->post("suratPesanan"));
                $this->session->set_userdata($dataa);
                $dataa = array('toc'=>$this->input->post("toc"));
                $this->session->set_userdata($dataa);
                $dataa = array('namaLokasi'=>$this->input->post("namaLokasi"));
                $this->session->set_userdata($dataa);
                $dataa = array('namaProject'=>$this->input->post("namaProject"));
                $this->session->set_userdata($dataa);
                $dataa = array('projectSP'=>$this->input->post("projectSP"));
                $this->session->set_userdata($dataa);
                $dataa = array('witel'=>$this->input->post("witel"));
                $this->session->set_userdata($dataa);
                $dataa = array('order'=>$this->input->post("order"));
                $this->session->set_userdata($dataa);
                $dataa = array('status'=>$this->input->post("status"));
                $this->session->set_userdata($dataa);

                $dataIndex = array('suratPesananIndex'=>$this->input->post("suratPesanan_index"));
                $this->session->set_userdata($dataIndex);
                $dataIndex = array('tocIndex'=>$this->input->post("toc_index"));
                $this->session->set_userdata($dataIndex);
                $dataIndex = array('namaLokasiIndex'=>$this->input->post("namaLokasi_index"));
                $this->session->set_userdata($dataIndex);
                $dataIndex = array('namaProjectIndex'=>$this->input->post("namaProject_index"));
                $this->session->set_userdata($dataIndex);
                $dataIndex = array('projectSPIndex'=>$this->input->post("projectSP_index"));
                $this->session->set_userdata($dataIndex);
                $dataIndex = array('witelIndex'=>$this->input->post("witel_index"));
                $this->session->set_userdata($dataIndex);
                $dataIndex = array('orderIndex'=>$this->input->post("order_index"));
                $this->session->set_userdata($dataIndex);
                $dataIndex = array('statusIndex'=>$this->input->post("status_index"));
                $this->session->set_userdata($dataIndex);
            }
            
            $suratPesanan = $this->session->userdata('suratPesanan');
            $TOC = $this->session->userdata('toc');
            $namaLokasi = $this->session->userdata('namaLokasi');
            $namaProject = $this->session->userdata('namaProject');
            $projectSP = $this->session->userdata('projectSP');
            $witel = $this->session->userdata('witel');
            $order = $this->session->userdata('order');
            $status = $this->session->userdata('status');

            // panggil fungsi untuk isi dari dropdown di laporan
            $data["suratPesanan"] = $this->reportModel->load_dropdown("SURAT_PESANAN");
            $data["toc"] = $this->reportModel->load_dropdown("TOC");
            $data["namaLokasi"] = $this->reportModel->load_dropdown("NAMA_LOKASI");
            $data["namaProject"] = $this->reportModel->load_dropdown("NAMA_PROJECT");
            $data["projectSP"] = $this->reportModel->load_dropdown("PROJECT_SP");
            $data["witel"] = $this->reportModel->load_dropdown("WITEL");
            $data["order"] = $this->reportModel->load_dropdown("ORDERS");
            $data["status"] = $this->reportModel->load_dropdown("KLAS_STAT_PROGRESS");

            $config = array();
            $config["base_url"] = site_url() . "/ReportController/search";
            $config["total_rows"] = $this->reportModel->record_filter_count($suratPesanan, $TOC, $namaLokasi, $namaProject, $projectSP, $witel, $order, $status);
            $config["per_page"] = 20;
            $config["uri_segment"] = 3;
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = $choice > 5 ? 5 : $choice;
     
            $this->pagination->initialize($config);

            $data["results"] = $this->reportModel->
                filter_data($config["per_page"], $page, $suratPesanan, $TOC, $namaLokasi, $namaProject, $projectSP, $witel, $order, $status);

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