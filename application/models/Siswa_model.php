<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    public function viewall()
    {
        $query = $this->db->query('select s.*,ns.nama nama_sekolah,pk.nama nama_program_keahlian from user u
                join users us on us.id=u.id
                join siswa s on s.id=u.id
                join nama_sekolah ns on ns.id=s.nama_sekolah_id
                join program_keahlian pk on pk.id=s.program_keahlian_id
                where u.id=2');
        return $query->result();
    }

    public function select_by_id($id)
    {
        $this->db->where('siswa.id',$id);
        return $this->db->get('unit');
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

    public function siswa_detail_by_id($id)
    {
        $query = $this->db->query('select s.*,ns.nama nama_sekolah,pk.nama nama_program_keahlian,go.nama nama_golongan_darah, jk.nama nama_jenis_kelamin
                from user u
                join users us on us.id=u.id
                join siswa s on s.id=u.id
                join nama_sekolah ns on ns.id=s.nama_sekolah_id
                join program_keahlian pk on pk.id=s.program_keahlian_id
                join gol_darah go on go.id=s.gol_darah_id
                join jenis_kelamin jk on jk.id=s.jenis_kelamin_id
                where u.id=2');
        return $query->row();
    } 
}