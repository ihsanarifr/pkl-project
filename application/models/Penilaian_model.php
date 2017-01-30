<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penilaian_model extends CI_Model
{
    public function get_by_prakerin_id($id)
    {
        return $this->db->select('p.*,ap.*')
                    ->from('penilaian p')
                    ->join('aspek_penilaian ap','ap.id=p.aspek_penilaian_id')
                    ->where('prakerin_siswa_id',$id)->get()->result();
    }
}