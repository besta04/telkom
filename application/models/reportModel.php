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
 
    public function fetch_data($limit, $start) 
    {
        /*$result = mysqli_query($con,"select * FROM tabel_lme_main, tabel_order 
                              where tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER LIMIT 50");
        $this->db->select('*');
        $this->db->from('tabel_lme_main');
        $this->db->from('tabel_order');
        $this->db->where('tabel_lme_main.ID_ORDER', 'tabel_order.ID_ORDER');
        $this->db->limit(50);*/
        //$query = $this->db->limit($limit, $start);
        $query = $this->db->query("select * from tabel_lme_main, tabel_order 
                        where tabel_lme_main.ID_ORDER = tabel_order.ID_ORDER limit ".$start.",".$limit);
        //$query = $this->db->get();
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
}
?>