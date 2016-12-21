<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Program_keahlian_model extends CI_Model
{
   public function viewall()
    {
        return $this->db->get('program_keahlian');
    }

    public function select_by_id($id)
    {
        $this->db->where('program_keahlian.id',$id);
        return $this->db->get('program_keahlian');
    }

    public function save($data)
    {
        $this->db->insert('program_keahlian',$data);
    }

    public function update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('program_keahlian',$data);
    }

    public function delete($id)
    {
        $this->db->delete('program_keahlian',array('id'=>$id));
    } 
}