<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aspek_penilaian_model extends CI_Model
{
	 public function viewall()
    {
        $query = $this->db->query('select ap.*, ns.nama nama_sekolah, kp.nama nama_kelompok_penilaian from aspek_penilaian ap
                                    join nama_sekolah ns on ns.id = ap.nama_sekolah_id
                                    join kelompok_penilaian kp on kp.id = ap.kelompok_penilaian_id');
        return $query->result();
    }

    public function select_by_id($id)
    {
        $this->db->where('aspek_penilaian.id',$id);
        return $this->db->get('aspek_penilaian');
    }

    public function save($data)
    {
        $this->db->insert('aspek_penilaian',$data);
    }

    public function update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('aspek_penilaian',$data);
    }

    public function delete($id)
    {
        $this->db->delete('aspek_penilaian',array('id'=>$id));
    }
    
}