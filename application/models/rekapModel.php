<?php
class RekapModel extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function insert_entry($data)
    {
        $this->load->database();
        $this->db->insert('tabel_lme_main',$data);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();
        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

    function login($username, $password)
    {
        $this->load->database();
        $this->db->select('username','password');
        $this->db->from('tabel_login');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get();
        if($query->num_rows() == 1)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
}
?>