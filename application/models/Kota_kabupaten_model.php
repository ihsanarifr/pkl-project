<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kota_kabupaten_model extends CI_Model
{

	public function viewall()
    {
        return $this->db->get('kota_kabupaten')->result();
    }
    public function select_by_id($id)
    {
        $this->db->where('kota_kabupaten.id',$id);
        return $this->db->get('kota_kabupaten');
    }

    public function save($data)
    {
        $this->db->insert('kota_kabupaten',$data);
    }

    public function update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('kota_kabupaten',$data);
    }

    public function delete($id)
    {
        $this->db->delete('kota_kabupaten',array('id'=>$id));
    }   
}
