<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class siswa_model extends CI_Model
{
    public function viewall()
    {
        return $this->db->get('siswa');
    }

    public function select_by_id($id)
    {
        $this->db->where('siswa.id',$id);
        return $this->db->get('siswa');
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

    public function last_user_id()
    {
       return $this->db->get('users')->last_row()->id;
    }
    
    public function save_user($data)
    {
       $this->db->insert('user',$data);  
    }
}