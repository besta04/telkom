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
            $this->load->view("report1", $data);
        }
        else
        {
          redirect('HomeController/restricted');
        }
    }

    public function search()
    {
        if($this->session->userdata('is_logged_in'))
        {
            $config = array();
            $config["base_url"] = site_url() . "/ReportController/search";
            $config["total_rows"] = $this->reportModel->record_count();
            $config["per_page"] = 20;
            $config["uri_segment"] = 3;
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = $choice > 5 ? 5 : $choice;
     
            $this->pagination->initialize($config);
     
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

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

                /*
                $suratPesanan = $this->input->post("suratPesanan");
                $TOC = $this->input->post("toc");
                $namaLokasi = $this->input->post("namaLokasi");
                $namaProject = $this->input->post("namaProject");
                $projectSP = $this->input->post("projectSP");
                $witel = $this->input->post("witel");
                $order = $this->input->post("order");
                $status = $this->input->post("status");*/
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

            $data["results"] = $this->reportModel->
                filter_data($config["per_page"], $page, $suratPesanan, $TOC, $namaLokasi, $namaProject, $projectSP, $witel, $order, $status);

            $data["suratPesanan"] = $this->reportModel->load_dropdown("SURAT_PESANAN");
            $data["toc"] = $this->reportModel->load_dropdown("TOC");
            $data["namaLokasi"] = $this->reportModel->load_dropdown("NAMA_LOKASI");
            $data["namaProject"] = $this->reportModel->load_dropdown("NAMA_PROJECT");
            $data["projectSP"] = $this->reportModel->load_dropdown("PROJECT_SP");
            $data["witel"] = $this->reportModel->load_dropdown("WITEL");
            $data["order"] = $this->reportModel->load_dropdown("ORDERS");
            $data["status"] = $this->reportModel->load_dropdown("KLAS_STAT_PROGRESS");

            $data["links"] = $this->pagination->create_links();

            $this->load->view("report1", $data);
        }
        else
        {
          redirect('HomeController/restricted');
        }
    }
}
?>