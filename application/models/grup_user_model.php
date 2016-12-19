<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grup_user_model extends CI_Model
{
    public function viewall()
    {
        return $this->db->get('groups');
    }

    public function select_by_id($id)
    {
        $this->db->where('groups.id',$id);
        return $this->db->get('groups');
    }

    public function save($data)
    {
        $this->db->insert('groups',$data);
    }

    public function update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('groups',$data);
    }

    public function delete($id)
    {
        $this->db->delete('groups',array('id'=>$id));
    }
}