<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unit_model extends CI_Model
{
    public function viewall()
    {
        return $this->db->get('unit');
    }

    public function select_by_id($id)
    {
        $this->db->where('unit.id',$id);
        return $this->db->get('unit');
    }

    public function save($data)
    {
        $this->db->insert('unit',$data);
    }

    public function update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('unit',$data);
    }

    public function delete($id)
    {
        $this->db->delete('unit',array('id'=>$id));
    }
}