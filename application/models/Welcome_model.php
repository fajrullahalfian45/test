<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    
    function search_hotel($term)
    {
        $this->db->select('keyword as id, concat("<i class=\"icon fa fa-",icon,"\"></i>",name) as name, name as cap, icon');
        $this->db->from('vie_hoteldestination');
        $this->db->where('name like "%'.$term.'%"');
        return $this->db->get()->result();
    }
    
   
}
