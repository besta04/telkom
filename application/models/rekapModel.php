<?php
class RekapModel extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    // fungsi input data baru
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
    
    // fungsi insert log baru
    function log_insert($data2)
    {
        $this->load->database();
		try
		{
			$this->db->insert('log',$data2);
			return true;
		}
		catch (Exception $e) 
        {
            return false;
        }
	}

     // fungsi update data
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

    // fungsi delete data
    function delete_entry($id)
    {
        try 
        {
            $query = $this->db->get_where('tabel_lme_main', array('id_lme' => $id));
            if ($query->num_rows() > 0) 
            {
                foreach ($query->result() as $row) 
                {
                    $data = array(
                            'ID_DELETED' => $id,
                            'ID_ORDER' => $row->ID_ORDER,
                            'DIVRE' => $row->DIVRE,
                            'WITEL' => $row->WITEL,
                            'KOTA' => $row->KOTA,
                            'NAMA_LOKASI' => $row->NAMA_LOKASI,
                            'ALAMAT' => $row->ALAMAT,
                            'TYPE_LME' => $row->TYPE_LME,
                            'ORDERS' => $row->ORDERS,
                            'KLASIFIKASI_STATUS_SMILE' => $row->KLASIFIKASI_STATUS_SMILE,
                            'STATUS_PROGRESS_WIFI' => $row->STATUS_PROGRESS_WIFI,
                            'ALASAN_STATUS_PROGRESS' => $row->ALASAN_STATUS_PROGRESS
                            );
                }
            }
            $this->db->insert('tabel_deleted', $data);
            $this->db->delete('tabel_lme_main', array('id_lme' => $id));  

            $con=mysqli_connect("localhost","root","root","telkom_lme");
            if (mysqli_connect_errno())
            {
              echo "Failed to connect : ". mysqli_connect_error();
            }
            $resultDelete = mysqli_query($con,"select witel, alamat from tabel_lme_main where id_lme =".$id);
            $rows = mysqli_fetch_array($resultDelete);
            $this->load->model('RekapModel');
            $data2 = array(
                            'keterangan' => 'DELETE',
                            'id_delete' => $id,
                            'subjek' => $this->session->userdata('username'),
                            'witel' => $rows['witel'],
                            'lokasi' => $rows['alamat'],
                            'kota' => $this->input->post('boxKota'),
                            'from' => '-',
                            'to' => '-'
                );
            $this->db->set('waktu', 'NOW()', FALSE);

            // insert ke log kalo sudah delete data
            $result = $this->RekapModel->log_insert($data2);

            return true;
        } 
        catch (Exception $e) 
        {
            return false;            
        }
    }

    // fungsi restore data
    function restore_entry($idLog, $idDelete)
    {
        try 
        {
            $query = $this->db->get_where('tabel_deleted', array('id_deleted' => $idDelete));
            if ($query->num_rows() > 0) 
            {
                foreach ($query->result() as $row) 
                {
                    $data = array(
                            'ID_ORDER' => $row->ID_ORDER,
                            'DIVRE' => $row->DIVRE,
                            'WITEL' => $row->WITEL,
                            'KOTA' => $row->KOTA,
                            'NAMA_LOKASI' => $row->NAMA_LOKASI,
                            'ALAMAT' => $row->ALAMAT,
                            'TYPE_LME' => $row->TYPE_LME,
                            'ORDERS' => $row->ORDERS,
                            'KLASIFIKASI_STATUS_SMILE' => $row->KLASIFIKASI_STATUS_SMILE,
                            'STATUS_PROGRESS_WIFI' => $row->STATUS_PROGRESS_WIFI,
                            'ALASAN_STATUS_PROGRESS' => $row->ALASAN_STATUS_PROGRESS
                            );
                }
            }
            $this->db->insert('tabel_lme_main', $data);
            $this->db->delete('tabel_deleted', array('id_deleted' => $idDelete));  

            $data = array('id_delete' => '0000000');
            $this->db->where('id_log', $idLog);
            $this->db->update('log', $data);

            return true;
        } 
        catch (Exception $e) 
        {
            return false;            
        }
    }

    // fungsi login dapetin uname & pass dr database
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