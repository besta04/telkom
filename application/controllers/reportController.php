<?php
class ReportController extends CI_Controller 
{
    public function __construct() {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->model("reportModel");
        $this->load->library("pagination");
    }
 
    public function report1() {
        $config = array();
        $config["base_url"] = site_url() . "/ReportController/report1";
        $config["total_rows"] = $this->reportModel->record_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = $choice>10 ? 5 : $choice;
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->reportModel->
            fetch_data($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
 
        $this->load->view("report1", $data);
    }
}
?>