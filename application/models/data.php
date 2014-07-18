<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data()
    {
    	$query = $this->db->get('chart');
      return $query->result();
    }
}