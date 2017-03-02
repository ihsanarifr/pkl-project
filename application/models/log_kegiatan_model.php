<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_kegiatan_model extends CI_Model
{

	public function viewall()
    {
        return $this->db->get('kegiatan')->result();
    }

    public function get_by_prakerin_id($id)
    {
        return $this->db->where('prakerin_siswa_id',$id)->get('kegiatan')->result();
    }

    public function save($data)
    {
        $this->db->insert('kegiatan',$data);
    }

    public function update($data)
    {
        $id = $data['id']; 
        $this->db->where('id',$id);
        $this->db->update('kegiatan',$data);
    }


    public function delete($id)
    {
        $this->db->delete('kegiatan',array('id'=>$id));
    }

     public function last_user_id()
    {
       return $this->db->get('users')->last_row()->id;
    }

    public function select_by_id($id)
    {
        $this->db->where('kegiatan.id',$id);
        return $this->db->get('kegiatan');
    }
}