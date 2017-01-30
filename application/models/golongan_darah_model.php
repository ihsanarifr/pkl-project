<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Golongan_darah_model extends CI_Model
{
   public function viewall()
    {
        return $this->db->get('golongan_darah');
    }

    public function select_by_id($id)
    {
        $this->db->where('golongan_darah.id',$id);
        return $this->db->get('golongan_darah');
    }

    public function save($data)
    {
        $this->db->insert('golongan_darah',$data);
    }

    public function update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('golongan_darah',$data);
    }

    public function delete($id)
    {
        $this->db->delete('golongan_darah',array('id'=>$id));
    } 
}