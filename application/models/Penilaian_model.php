<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penilaian_model extends CI_Model
{
    public function get_by_prakerin_id($prakerin_siswa_id)
    {
        return $this->db->select('p.id,p.prakerin_siswa_id, kp.nama nama_kelompok_penilaian,ap.nama nama_aspek_penilaian,p.nilai_angka,p.nilai_huruf,p.keterangan, s.id id_siswa, s.nama nama_siswa')
                    ->from('penilaian p')
                    ->join('aspek_penilaian ap','ap.id=p.aspek_penilaian_id')
                    ->join('kelompok_penilaian kp','kp.id=ap.kelompok_penilaian_id')
                    ->join('prakerin_siswa ps','ps.id = p.prakerin_siswa_id')
                    ->join('siswa s','s.id = ps.siswa_id')
                    ->where('prakerin_siswa_id',$prakerin_siswa_id)->get()->result();
    }

    public function get_by_pembimbing_id($pembimbing_id)
    {
        return $this->db->select('p.id,p.prakerin_siswa_id, kp.nama nama_kelompok_penilaian,ap.nama nama_aspek_penilaian,p.nilai_angka,p.nilai_huruf,p.keterangan')
                    ->from('penilaian p')
                    ->join('aspek_penilaian ap','ap.id=p.aspek_penilaian_id')
                    ->join('kelompok_penilaian kp','kp.id=ap.kelompok_penilaian_id')
                    ->join('prakerin_siswa ps','ps.id = p.prakerin_siswa_id')
                    ->where('ps.pembimbing_unit_id',$pembimbing_id)
                    ->or_where('ps.pembimbing_sekolah_id',$pembimbing_id)
                    ->get()->result();
    }


    public function viewall()
    {
      	$query = $this->db->query('select p.*, ap.nama aspek_penilaian from penilaian p
                                    join aspek_penilaian ap on ap.id = p.aspek_penilaian_id');
		return $query();
    }

    public function select_by_id($id)
    {
        return $this->db->select('p.*, kp.nama nama_kelompok_penilaian,ap.nama nama_aspek_penilaian,s.id id_siswa, s.nama nama_siswa')
                    ->from('penilaian p')
                    ->join('aspek_penilaian ap','ap.id=p.aspek_penilaian_id')
                    ->join('kelompok_penilaian kp','kp.id=ap.kelompok_penilaian_id')
                    ->join('prakerin_siswa ps','ps.id = p.prakerin_siswa_id')
                    ->join('siswa s','s.id = ps.siswa_id')
                    ->where('p.id',$id)->get();
    }
    
    public function save($data)
    {
        $this->db->insert('penilaian',$data);
        
    }

     public function save_user($data)
    {
       $this->db->insert('user',$data);  
    }

    public function update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('penilaian',$data);
    }


    public function delete($id)
    {

        $this->db->delete('penilaian',array('id'=>$id));
    } 
}