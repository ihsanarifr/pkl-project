<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sekolah_model extends CI_Model
{
 public function viewall()
    {
        return $this->db->get('nama_sekolah');
    }

    public function select_by_id($id)
    {
        $this->db->where('nama_sekolah.id',$id);
        return $this->db->get('nama_sekolah');
    }

    public function save($data)
    {
        $this->db->insert('nama_sekolah',$data);
    }

    public function update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('nama_sekolah',$data);
    }

    public function delete($id)
    {
        $this->db->delete('nama_sekolah',array('id'=>$id));
    }   
}