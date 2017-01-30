
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rencana_kegiatan_model extends CI_Model
{
    public function get_by_prakerin_id($id)
    {
        return $this->db->where('prakerin_siswa_id',$id)->get('rencana_kegiatan')->result();
    }
}