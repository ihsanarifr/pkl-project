<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aspek_penilaian_model extends CI_Model
{
	 public function viewall()
    {
        return $this->db->get('Aspek_penilaian_model');
    }

    public function select_by_id($id)
    {
        $this->db->where('Aspek_penilaian_model.id',$id);
        return $this->db->get('groups');
    }

    public function save($data)
    {
        $this->db->insert('Aspek_penilaian_model',$data);
    }

    public function update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('Aspek_penilaian_model',$data);
    }

    public function delete($id)
    {
        $this->db->delete('Aspek_penilaian_model',array('id'=>$id));
    }
    
}