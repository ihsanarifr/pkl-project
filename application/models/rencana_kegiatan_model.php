<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rencana_kegiatan_model extends CI_Model
{
<<<<<<< HEAD
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
=======
    public function get_by_prakerin_id($id)
    {
        return $this->db->where('prakerin_siswa_id',$id)->get('rencana_kegiatan')->result();
>>>>>>> 3370d79c8f3fdc9905bf4ea4bb993a825eaa45f3
    }
}