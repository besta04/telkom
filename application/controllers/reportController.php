<?php
class ReportController extends CI_Controller 
{
    public function __construct() {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->model("reportModel");
        $this->load->library("pagination");
        $this->load->helper("form");
    }
 
    public function report1() 
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

    public function search()
    {
        $suratPesanan = $this->input->post("suratPesanan");
        $TOC = $this->input->post("toc");
        $namaLokasi = $this->input->post("namaLokasi");
        $namaProject = $this->input->post("namaProject");
        $projectSP = $this->input->post("projectSP");
        $witel = $this->input->post("witel");
        $order = $this->input->post("order");
        $status = $this->input->post("status");
        
        //echo "<script>alert(".$suratPesanan.")</script>";

        $config = array();
        $config["base_url"] = site_url() . "/ReportController/search";
        $config["total_rows"] = $this->reportModel->record_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = $choice>5 ? 5 : $choice;
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
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
}
?>