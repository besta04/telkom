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
        try
        {
            $this->db->insert('tabel_lme_main',$data);
            return true;
        }
        catch (Exception $e) 
        {
            return false;
        }
    }

    function update_entry($data, $id)
    {
        try 
        {
            $this->db->where('id_lme', $id)->update('tabel_lme_main' ,$data);   
            return true;
        } 
        catch (Exception $e) 
        {
            return false;            
        }
    }

    function login($username, $password)
    {
        $this->load->database();
        $this->db->select('username','password');
        $this->db->from('tabel_login');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else 
        {
            return false;
        }
    }
}
?>