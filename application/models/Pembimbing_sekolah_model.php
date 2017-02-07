<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembimbing_sekolah_model extends CI_Model
{
    public function viewall()
    {
      	$query = $this->db->query('select ps.*, ns.nama nama_sekolah from pembimbing_sekolah ps
                                    join nama_sekolah ns on ns.id = ps.nama_sekolah_id');
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
    public function save($data)
    {
        $this->db->insert('pembimbing_sekolah',$data);
        
    }

     public function save_user($data)
    {
       $this->db->insert('user',$data);  
    }

    public function update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('pembimbing_sekolah',$data);
    }


    public function delete($id)
    {

        $this->db->delete('pembimbing_sekolah',array('id'=>$id));
    }

}