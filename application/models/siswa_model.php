<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
   public function viewall()
    {
        return $this->db->get('siswa');
    }

    public function select_by_id($id)
    {
        $this->db->where('siswa.id',$id);
        return $this->db->get('unit');
    }

    public function save($data)
    {
        $this->db->insert('siswa',$data);
    }

    public function update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('siswa',$data);
    }

    public function delete($id)
    {
        $this->db->delete('siswa',array('id'=>$id));
    } 
}