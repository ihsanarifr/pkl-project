<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembimbing_unit_model extends CI_Model
{
   public function viewall()
    {
    	return $this->db->get('pembimbing_unit')->result();
    }

    public function select_by_id($id)
    {
        $this->db->where('pembimbing_unit.id',$id);
        return $this->db->get('pembimbing_unit');
    }  
}