<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absensi_model extends CI_Model
{
	public function viewall()
    {
    	 $query = $this->db->query('select ab.*,sk.nama status_kehadiran from absensi ab
             join status_kehadiran sk on sk.id = ab.status_kehadiran_id
    	 	 ');
    	 return $query->result();
    }

    public function get_by_id($id)
    {
    	 return $this->db->where('id',$id)->get('absensi')->row();
    }

     public function select_by_id($id)
    {
        $this->db->where('status_kehadiran.id',$id);
        return $this->db->get('status_kehadiran');
    }  


    public function get_by_prakerin_id($id)
    {
        return $this->db->where('prakerin_siswa_id',$id)->get('absensi')->result();
    }

    public function save($data)
    {
        $this->db->insert('absensi',$data);
        
    }

    public function update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('absensi',$data);
    }


    public function delete($id)
    {

        $this->db->delete('absensi',array('id'=>$id));
    }

    public function save_user($data)
    {
       $this->db->insert('user',$data);  
    }
}