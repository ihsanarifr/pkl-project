<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembimbing_sekolah_model extends CI_Model
{
    public function viewall()
    {
    	$query = $this->db->get('pembimbing_sekolah');
		return $query->result();
    }

    public function view_all_by_sekolah($id_sekolah)
    {
        $query = $this->db->query('select * from pembimbing_sekolah ps where ps.nama_sekolah_id = $id_sekolah');
        return $query->result();
    }  
    
    public function select_by_id($id)
    {
        $this->db->where('pembimbing_sekolah.id',$id);
        return $this->db->get('pembimbing_sekolah');
    }
}