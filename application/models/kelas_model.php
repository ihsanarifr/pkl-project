<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kelas_model extends CI_Model
{

    public function viewall()
    {
        return $this->db->get('kelas');
    }

    public function select_by_id($id)
    {
        $this->db->where('kelas.id',$id);
        return $this->db->get('kelas');
    }

    public function save($data)
    {
        $this->db->insert('kelas',$data);
    }

    public function update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('kelas',$data);
    }

    public function delete($id)
    {
        $this->db->delete('kelas',array('id'=>$id));

    }
}
