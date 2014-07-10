<?php
class UserModel extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    function GetPrevilege($username)
    {
        $this->load->database();
        $this->db->select('keterangan');
        $this->db->from('tabel_login');
        $this->db->where('username',$username);
        $query = $this->db->get();
        foreach ($query->result() as $row)
        {
            $keterangan = $row->keterangan;
        }
        return $keterangan;
    }
}
?>