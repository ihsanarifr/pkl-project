<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_penilaian_model extends CI_Model
{
    public function viewall()
    {
        return $this->db->get('kelompok_penilaian');
    }

    public function select_by_id($id)
    {
        $this->db->where('kelompok_penilaian.id',$id);
        return $this->db->get('kelompok_penilaian');
    }

    public function get_by_prakerin_id($id)
    {
        return $this->db->where('prakerin_siswa_id',$id)->get('kelompok_penilaian')->result();
    }

    public function save($data)
    {
        $this->db->insert('kelompok_penilaian',$data);
    }

    public function update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('kelompok_penilaian',$data);
    }

    public function delete($id)
    {
        $this->db->delete('kelompok_penilaian',array('id'=>$id));
    } 
}