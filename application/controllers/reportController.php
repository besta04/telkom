<?php
class ReportController extends CI_Controller 
{
    public function __construct() {
        parent:: __construct();
        //$this->output->enable_profiler(TRUE);
        $this->load->helper("url");
        $this->load->model("reportModel");
        $this->load->library("pagination");
        $this->load->helper("form");
        $this->load->library('session');
        $this->load->library('form_validation');
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

    public function R2($id='')
    {
        if($this->session->userdata('is_logged_in'))
        {
            $this->load->helper('form');
            $data = array('id' => $id);
            if($this->session->userdata('is_admin'))
            {
                $this->load->view('R2',$data);
            }
            else if($this->session->userdata('is_staff'))
            {
                $this->load->view('R2',$data);
            }
        }
        else
        {
          redirect('HomeController/restricted');
        }
    }

    public function R3($id='')
    {
        if($this->session->userdata('is_logged_in'))
        {
            $this->load->helper('form');
            $data = array('id' => $id);
            if($this->session->userdata('is_admin'))
            {
                $this->load->view('R3',$data);
            }
            else if($this->session->userdata('is_staff'))
            {
                $this->load->view('R3',$data);
            }
        }
        else
        {
          redirect('HomeController/restricted');
        }
    }

    public function R4($id='')
    {
        if($this->session->userdata('is_logged_in'))
        {
            $this->load->helper('form');
            $data = array('id' => $id);
            if($this->session->userdata('is_admin'))
            {
                $this->load->view('R4',$data);
            }
            else if($this->session->userdata('is_staff'))
            {
                $this->load->view('R4',$data);
            }
        }
        else
        {
          redirect('HomeController/restricted');
        }
    }

    public function R5($id='')
    {
        if($this->session->userdata('is_logged_in'))
        {
            $this->load->helper('form');
            $data = array('id' => $id);
            if($this->session->userdata('is_admin'))
            {
                $this->load->view('R5',$data);
            }
            else if($this->session->userdata('is_staff'))
            {
                $this->load->view('R5',$data);
            }
        }
        else
        {
          redirect('HomeController/restricted');
        }
    }

    public function R6($id='')
    {
        if($this->session->userdata('is_logged_in'))
        {
            $this->load->helper('form');
            $data = array('id' => $id);
            if($this->session->userdata('is_admin'))
            {
                $this->load->view('R6',$data);
            }
            else if($this->session->userdata('is_staff'))
            {
                $this->load->view('R6',$data);
            }
        }
        else
        {
          redirect('HomeController/restricted');
        }
    }

    public function R7($id='')
    {
        if($this->session->userdata('is_logged_in'))
        {
            $this->load->helper('form');
            $data = array('id' => $id);
            if($this->session->userdata('is_admin'))
            {
                $this->load->view('R7',$data);
            }
            else if($this->session->userdata('is_staff'))
            {
                $this->load->view('R7',$data);
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

    // fungsi panggil view rekap per witel
    public function rekapDetail()
    {
        if($this->session->userdata('is_logged_in'))
        {
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            if($page == 0)
            {
                $dataa = array('witelQuery'=>$this->input->post("selected"));
                $this->session->set_userdata($dataa);
            }
            
            $witel = $this->session->userdata('witelQuery');
            // R1
            if($witel == "bangkabelitung")
            {
                $witelQuery = "TELKOM BANGKA BELITUNG (PANGKAL PINANG)";
            }
            else if($witel == "bengkulu")
            {
                $witelQuery = "TELKOM BENGKULU (BENGKULU)";
            }
            else if($witel == "jambi")
            {
                $witelQuery = "TELKOM JAMBI";
            }
            else if($witel == "lampung")
            {
                $witelQuery = "TELKOM LAMPUNG (BANDAR LAMPUNG)";
            }
            else if($witel == "nad")
            {
                $witelQuery = "TELKOM NAD (ACEH)";
            }
            else if($witel == "riauDar")
            {
                $witelQuery = "TELKOM RIAU DARATAN (PEKANBARU)";
            }
            else if($witel == "riauKep")
            {
                $witelQuery = "TELKOM RIAU KEPULAUAN (BATAM)";
            }
            else if($witel == "sumbar")
            {
                $witelQuery = "TELKOM SUMATERA BARAT (PADANG)";
            }
            else if($witel == "sumsel")
            {
                $witelQuery = "TELKOM SUMATERA SELATAN (PALEMBANG)";
            }
            else if($witel == "sumutbar")
            {
                $witelQuery = "TELKOM SUMUT BARAT (MEDAN)";
            }
            else if($witel == "sumuttim")
            {
                $witelQuery = "TELKOM SUMUT TIMUR (PEMATANG SIANTAR)";
            }

            // R2
            else if($witel == "bantenbarat")
            {
                $witelQuery = "TELKOM BANTEN BARAT (SERANG)";
            }
            else if($witel == "bantentimur")
            {
                $witelQuery = "TELKOM BANTEN TIMUR (TANGERANG)";
            }
            else if($witel == "jabarbar")
            {
                $witelQuery = "TELKOM JABAR BARAT (BOGOR)";
            }
            else if($witel == "jabarut")
            {
                $witelQuery = "TELKOM JABAR BARAT UTARA (BEKASI)";
            }
            else if($witel == "jakbar")
            {
                $witelQuery = "TELKOM JAKARTA BARAT";
            }
            else if($witel == "jakpus")
            {
                $witelQuery = "TELKOM JAKARTA PUSAT";
            }
            else if($witel == "jaksel")
            {
                $witelQuery = "TELKOM JAKARTA SELATAN";
            }
            else if($witel == "jaktim")
            {
                $witelQuery = "TELKOM JAKARTA TIMUR";
            }
            else if($witel == "jakut")
            {
                $witelQuery = "TELKOM JAKARTA UTARA";
            }

            // R3
            else if($witel == "sukabumi")
            {
                $witelQuery = "TELKOM JABAR SELATAN (SUKABUMI)";
            }
            else if($witel == "bandung")
            {
                $witelQuery = "TELKOM JABAR TENGAH (BANDUNG)";
            }
            else if($witel == "tasikmalaya")
            {
                $witelQuery = "TELKOM JABAR TIMSEL (TASIKMALAYA)";
            }
            else if($witel == "cirebon")
            {
                $witelQuery = "TELKOM JABAR TIMUR (CIREBON)";
            }

            // R4
            else if($witel == "purwokerto")
            {
                $witelQuery = "TELKOM JATENG BARAT SELATAN (PURWOKERTO)";
            }
            else if($witel == "pekalongan")
            {
                $witelQuery = "TELKOM JATENG BARAT UTARA (PEKALONGAN)";
            }
            else if($witel == "magelang")
            {
                $witelQuery = "TELKOM JATENG SELATAN (MAGELANG)";
            }
            else if($witel == "jogja")
            {
                $witelQuery = "TELKOM JATENG SELATAN (YOGYAKARTA)";
            }
            else if($witel == "salatiga")
            {
                $witelQuery = "TELKOM JATENG TENGAH (SALATIGA)";
            }
            else if($witel == "solo")
            {
                $witelQuery = "TELKOM JATENG TIMUR SELATAN (SOLO)";
            }
            else if($witel == "kudus")
            {
                $witelQuery = "TELKOM JATENG TIMUR UTARA (KUDUS)";
            }
            else if($witel == "semarang")
            {
                $witelQuery = "TELKOM JATENG UTARA (SEMARANG)";
            }

            // R5
            else if($witel == "banyuwangi")
            {
                $witelQuery = "TELKOM JATIM (BANYUWANGI)";
            }
            else if($witel == "madiun")
            {
                $witelQuery = "TELKOM JATIM BARAT (MADIUN)";
            }
            else if($witel == "malang")
            {
                $witelQuery = "TELKOM JATIM SELATAN (MALANG)";
            }
            else if($witel == "pasuruan")
            {
                $witelQuery = "TELKOM JATIM SELATAN TIMUR (PASURUAN)";
            }
            else if($witel == "surabaya")
            {
                $witelQuery = "TELKOM JATIM SURAMADU (SURABAYA)";
            }
            else if($witel == "sidoarjo")
            {
                $witelQuery = "TELKOM JATIM TENGAH TIMUR (SIDOARJO)";
            }
            else if($witel == "kediri")
            {
                $witelQuery = "TELKOM JATIM TENGAH (KEDIRI)";
            }
            else if($witel == "jember")
            {
                $witelQuery = "TELKOM JATIM TIMUR (JEMBER)";
            }
            else if($witel == "gresik")
            {
                $witelQuery = "TELKOM JATIM UTARA (GRESIK)";
            }

            // R6
            else if($witel == "banjarmasin")
            {
                $witelQuery = "TELKOM BANJARMASIN";
            }
            else if($witel == "pontianak")
            {
                $witelQuery = "TELKOM KALBAR (PONTIANAK)";
            }
            else if($witel == "palangkaraya")
            {
                $witelQuery = "TELKOM KALTENG (PALANGKARAYA)";
            }
            else if($witel == "balikpapan")
            {
                $witelQuery = "TELKOM KALTIMSEL (BALIKPAPAN)";
            }
            else if($witel == "tarakan")
            {
                $witelQuery = "TELKOM KALTIMUT (TARAKAN)";
            }
            else if($witel == "samarinda")
            {
                $witelQuery = "TELKOM SAMARINDA";
            }

            // R7
            else if($witel == "denpasar")
            {
                $witelQuery = "TELKOM BALI SELATAN (DENPASAR)";
            }
            else if($witel == "singaraja")
            {
                $witelQuery = "TELKOM BALI UTARA (SINGARAJA)";
            }
            else if($witel == "mataram")
            {
                $witelQuery = "TELKOM NTB (MATARAM)";
            }
            else if($witel == "kupang")
            {
                $witelQuery = "TELKOM NTT (KUPANG)";
            }
            else if($witel == "makassar")
            {
                $witelQuery = "TELKOM SULSEL MAKASAR";
            }
            else if($witel == "palu")
            {
                $witelQuery = "TELKOM SULTENG PALU";
            }
            else if($witel == "kendari")
            {
                $witelQuery = "TELKOM SULTRA (KENDARI)";
            }
            else if($witel == "manado")
            {
                $witelQuery = "TELKOM SULUT MANADO";
            }
            else if($witel == "sulutsel")
            {
                $witelQuery = "TELKOM SULUT SELATAN";
            }

            $config = array();
            $config["base_url"] = site_url() . "/ReportController/rekapDetail/";  
            $config["total_rows"] = $this->reportModel->fetch_rekap_count($witelQuery);
            $config["per_page"] = 20;
            $config["uri_segment"] = 3;
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = $choice>5 ? 5 : $choice;
            
            $this->pagination->initialize($config);

            $data["results"] = $this->reportModel->
                fetch_rekap($config["per_page"], $page, $witelQuery);

            $data["links"] = $this->pagination->create_links();

            if($this->session->userdata('is_admin'))
            {
                $this->load->view("rekapPerWitel", $data);
            }
            else if ($this->session->userdata('is_staff')) 
            {
                $this->load->view("rekapPerWitel", $data);
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
                    'namaLokasiDrop'=>$this->input->post("namaLokasi"),
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