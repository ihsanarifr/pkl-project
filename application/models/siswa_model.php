<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    public function viewall()
    {
        return $this->db->get('data_siswa');
    }

    public function select_by_id($id)
    {
        $this->db->where('data_siswa.id',$id);
        return $this->db->get('data_siswa');
    }

    public function save($data)
    {
        $this->db->insert('data_siswa',$data);
    }

    public function update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('data_siswa',$data);
    }

    public function delete($id)
    {
        $this->db->delete('data_siswa',array('id'=>$id));
    }

}