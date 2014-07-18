<?php
class ReportModel extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    // fungsi hitung jumlah data
    public function record_count() {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('tabel_lme_main');
        $this->db->join('tabel_order', 'tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER');
        return $this->db->count_all_results();
    }

    // fungsi hitung jumlah data filter
    public function record_filter_count($regional, $witel, $kota, $namaLokasi, $alamat, $suratPesanan, $TOC, $order, $status, $statProg, $keterangan, $tipe) {
        $this->load->database();
        $this->db->select("*");
        $this->db->from('tabel_lme_main');
        $this->db->join('tabel_order', 'tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER');
        if($suratPesanan != '')
        {
            $this->db->where('SURAT_PESANAN',$suratPesanan);
        }
        if($regional != '')
        {
            $this->db->where('DIVRE',$regional);
        }
        if($kota != '')
        {
            $this->db->where('KOTA',$kota);
        }
        if($alamat != '')
        {
            $this->db->where('ALAMAT',$alamat);
        }
        if($tipe != '')
        {
            $this->db->where('TYPE_LME',$tipe);
        }
        if($TOC != '')
        {
            $this->db->where('TOC',$TOC);
        }
        if($namaLokasi != '')
        {
            $this->db->like('NAMA_LOKASI',$namaLokasi);
        }
        if($witel != '')
        {
            $this->db->where('WITEL',$witel);
        }
        if($order != '')
        {
            $this->db->where('ORDERS',$order);
        }
        if($status != '')
        {
            $this->db->where('KLASIFIKASI_STATUS_SMILE',$status);
        }
        if($statProg != '')
        {
            $this->db->where('STATUS_PROGRESS_WIFI',$statProg);
        }
        if($keterangan != '')
        {
            $this->db->like('ALASAN_STATUS_PROGRESS',$keterangan);
        }
        return $this->db->count_all_results();
    }

    // fungsi hitung jumlah log
    public function log_count() {
        $this->load->database();
        return $this->db->count_all("log");
    }

    // fungsi select data untuk dropdown
    public function load_dropdown($key)
    {
        $this->db->distinct();
        if($key == "SURAT_PESANAN")
        {
            $this->db->select('SURAT_PESANAN');
        }
        else if($key == "TOC")
        {
            $this->db->select('TOC');
        }
        else if($key == "ORDERS")
        {
            $this->db->select('ORDERS');
        }
        else if($key == "KLAS_STAT_PROGRESS")
        {
            $this->db->select('KLASIFIKASI_STATUS_SMILE');
        }
        else if($key == "STAT_PROGRESS")
        {
            $this->db->select('STATUS_PROGRESS_WIFI');
        }
        else if($key == "TIPE_LME")
        {
            $this->db->select('TYPE_LME');
        }

        $this->db->from('tabel_lme_main');
        $this->db->join('tabel_order', 'tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function load_dropdown_region()
    {
        $this->db->distinct();
        $this->db->select('DIVRE');
        $this->db->from('tabel_lme_main');
        $this->db->join('tabel_order', 'tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER');
        if($this->session->userdata('witel') != '')
        {
             $this->db->where('WITEL',$this->session->userdata('witel'));
        }  
        if($this->session->userdata('kota') != '')
        {
             $this->db->where('KOTA',$this->session->userdata('kota'));
        } 
        if($this->session->userdata('namaLokasi') != '')
        {
             $this->db->like('NAMA_LOKASI',$this->session->userdata('namaLokasi'));
        } 
        if($this->session->userdata('alamat') != '')
        {
             $this->db->where('ALAMAT',$this->session->userdata('alamat'));
        } 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function load_dropdown_witel()
    {
        $this->db->distinct();
        $this->db->select('WITEL');
        $this->db->from('tabel_lme_main');
        $this->db->join('tabel_order', 'tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER');
        if($this->session->userdata('regional') != '')
        {
             $this->db->where('DIVRE',$this->session->userdata('regional'));
        }  
        if($this->session->userdata('kota') != '')
        {
             $this->db->where('KOTA',$this->session->userdata('kota'));
        } 
        if($this->session->userdata('namaLokasi') != '')
        {
             $this->db->like('NAMA_LOKASI',$this->session->userdata('namaLokasi'));
        } 
        if($this->session->userdata('alamat') != '')
        {
             $this->db->where('ALAMAT',$this->session->userdata('alamat'));
        } 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function load_dropdown_kota()
    {
        $this->db->distinct();
        $this->db->select('KOTA');
        $this->db->from('tabel_lme_main');
        $this->db->join('tabel_order', 'tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER');
        if($this->session->userdata('regional') != '')
        {
             $this->db->where('DIVRE',$this->session->userdata('regional'));
        }  
        if($this->session->userdata('witel') != '')
        {
             $this->db->where('WITEL',$this->session->userdata('witel'));
        } 
        if($this->session->userdata('namaLokasi') != '')
        {
             $this->db->like('NAMA_LOKASI',$this->session->userdata('namaLokasi'));
        } 
        if($this->session->userdata('alamat') != '')
        {
             $this->db->where('ALAMAT',$this->session->userdata('alamat'));
        } 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function load_dropdown_namaLokasi()
    {
        $this->db->distinct();
        $this->db->select('NAMA_LOKASI');
        $this->db->from('tabel_lme_main');
        $this->db->join('tabel_order', 'tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER');
        if($this->session->userdata('regional') != '')
        {
             $this->db->where('DIVRE',$this->session->userdata('regional'));
        }  
        if($this->session->userdata('kota') != '')
        {
             $this->db->where('KOTA',$this->session->userdata('kota'));
        } 
        if($this->session->userdata('witel') != '')
        {
             $this->db->where('WITEL',$this->session->userdata('witel'));
        } 
        if($this->session->userdata('alamat') != '')
        {
             $this->db->where('ALAMAT',$this->session->userdata('alamat'));
        } 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function load_dropdown_alamat()
    {
        $this->db->distinct();
        $this->db->select('ALAMAT');
        $this->db->from('tabel_lme_main');
        $this->db->join('tabel_order', 'tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER');
        if($this->session->userdata('regional') != '')
        {
             $this->db->where('DIVRE',$this->session->userdata('regional'));
        }  
        if($this->session->userdata('kota') != '')
        {
             $this->db->where('KOTA',$this->session->userdata('kota'));
        } 
        if($this->session->userdata('namaLokasi') != '')
        {
             $this->db->like('NAMA_LOKASI',$this->session->userdata('namaLokasi'));
        } 
        if($this->session->userdata('witel') != '')
        {
             $this->db->where('WITEL',$this->session->userdata('witel'));
        } 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    // fungsi select data utama untuk report
    public function fetch_data($limit, $start) 
    {
        $this->db->select('*');
        $this->db->from('tabel_lme_main');
        $this->db->join('tabel_order', 'tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER');
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

   // fungsi select data untuk log
   public function fetch_log($limit, $start)
   {
        $this->db->select('*');
        $this->db->from('log');
        $this->db->order_by('waktu', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

   // fungsi untuk filter data report
   public function filter_data($limit, $start, $regional, $witel, $kota, $namaLokasi, $alamat, $suratPesanan, $TOC, $order, $status, $statProg, $keterangan, $tipe)
   {
        $this->db->select("*");
        $this->db->from('tabel_lme_main');
        $this->db->join('tabel_order', 'tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER');
        if($suratPesanan != '')
        {
            $this->db->where('SURAT_PESANAN',$suratPesanan);
        }
        if($regional != '')
        {
            $this->db->where('DIVRE',$regional);
        }
        if($kota != '')
        {
            $this->db->where('KOTA',$kota);
        }
        if($alamat != '')
        {
            $this->db->where('ALAMAT',$alamat);
        }
        if($statProg != '')
        {
            $this->db->where('STATUS_PROGRESS_WIFI',$statProg);
        }
        if($keterangan != '')
        {
            $this->db->like('ALASAN_STATUS_PROGRESS',$keterangan);
        }
        if($tipe != '')
        {
            $this->db->where('TYPE_LME',$tipe);
        }
        if($TOC != '')
        {
            $this->db->where('TOC',$TOC);
        }
        if($namaLokasi != '')
        {
            //$this->db->where('NAMA_LOKASI',$namaLokasi);
            $this->db->like('NAMA_LOKASI', $namaLokasi);
        }
        if($witel != '')
        {
            $this->db->where('WITEL',$witel);
        }
        if($order != '')
        {
            $this->db->where('ORDERS',$order);
        }
        if($status != '')
        {
            $this->db->where('KLASIFIKASI_STATUS_SMILE',$status);
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
}
?>