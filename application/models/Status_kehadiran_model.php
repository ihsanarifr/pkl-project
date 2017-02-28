<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status_kehadiran_model extends CI_Model
{
    public function viewall()
    {
        return $this->db->get('status_kehadiran');
    }

    public function select_by_id($id)
    {
        $this->db->where('status_kehadiran.id',$id);
        return $this->db->get('status_kehadiran');
    }

    public function save($data)
    {
        $this->db->insert('status_kehadiran',$data);
    }

    public function update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('status_kehadiran',$data);
    }

    public function delete($id)
    {
        $this->db->delete('status_kehadiran',array('id'=>$id));
    }    
}