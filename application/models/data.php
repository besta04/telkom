<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data()
    {
    	//$this->db->select('*');
    	//$this->db->from('chart');
    	$query = $this->db->get('chart');
      return $query->result();
    }
}