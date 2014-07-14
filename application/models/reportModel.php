<?php
class ReportModel extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
 
    public function record_count() {
        $this->load->database();
        return $this->db->count_all("tabel_lme_main");
    }

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
        if($key == "NAMA_LOKASI")
        {
            $this->db->select('NAMA_LOKASI');
        }
        if($key == "NAMA_PROJECT")
        {
            $this->db->select('NAMA_PROJECT');
        }
        if($key == "PROJECT_SP")
        {
            $this->db->select('PROJECT_SP');
        }
        if($key == "WITEL")
        {
            $this->db->select('WITEL');
        }
        if($key == "ORDERS")
        {
            $this->db->select('ORDERS');
        }
        if($key == "KLAS_STAT_PROGRESS")
        {
            $this->db->select('KLAS_STAT_PROGRESS');
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

    public function fetch_data($limit, $start) 
    {
        /*$result = mysqli_query($con,"select * FROM tabel_lme_main, tabel_order 
                              where tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER LIMIT 50");*/
        $this->db->select('*');
        $this->db->from('tabel_lme_main');
        //$this->db->from('tabel_order');
        //$this->db->where('tabel_lme_main.ID_ORDER', 'tabel_order.ID_ORDER');
        $this->db->join('tabel_order', 'tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER');
        $this->db->limit($limit, $start);
        //$query = $this->db->limit($limit, $start);
        //$query = $this->db->query("select * from tabel_lme_main, tabel_order 
                        //where tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER limit ".$start.",".$limit);
        $query = $this->db->get();
        //$query = $this->db->get("Country");
        //echo "<script>alert(".$start.")</script>";
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

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

   public function filter_data($limit, $start, $suratPesanan, $TOC, $namaLokasi, $namaProject, $projectSP, $witel, $order, $status)
   {
        $this->db->select("*");
        $this->db->from('tabel_lme_main');
        $this->db->join('tabel_order', 'tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER');
        if($suratPesanan != '')
        {
            //echo "<script>alert('masuk')</script>";
            $this->db->where('SURAT_PESANAN',$suratPesanan);
        }
        if($TOC != '')
        {
            $this->db->where('TOC',$TOC);
        }
        if($namaLokasi != '')
        {
            $this->db->where('NAMA_LOKASI',$namaLokasi);
        }
        if($namaProject != '')
        {
            $this->db->where('NAMA_PROJECT',$namaProject);
        }
        if($projectSP != '')
        {
            $this->db->where('PROJECT_SP',$projectSP);
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
            $this->db->where('KLAS_STAT_PROGRESS',$status);
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