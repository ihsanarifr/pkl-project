<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prakerin_siswa_model extends CI_Model
{
    public function check_prakerin_by_user($id)
    {
        $this->db->where('siswa_id',$id);
        return $this->db->get('prakerin_siswa')->result();
    }

    public function check_prakerin_today($user_id)
    {
        $this->db->where('prakerin_siswa.siswa_id',$user_id);
        $prakerin = $this->db->get('prakerin_siswa')->result();

        foreach($prakerin as $p)
        {
            if($this->getDatesFromRange($p->tanggal_mulai,$p->tanggal_selesai))
            {
                //echo $p->id;
                //die();
                return $p->id;
            }
            // echo "tidak";
        }
        return 0;
    }

    function getDatesFromRange($start, $end, $format = 'Y-m-d') 
    {
        $array = array();
        $interval = new DateInterval('P1D');

        $realEnd = new DateTime($end);
        $realEnd->add($interval);

        $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

        foreach($period as $date) {
            if($date->format($format) == date('Y-m-d'))
            {
                return true;
            }
        }

        return false;
    }

    public function get_data_by_siswa($id){
        $query = $this->db->query("select prak.id, s.nama, s.id, s.nomor_induk, nms.nama as sekolah, ps.nama as pembimbing_sekolah, pu.nama as pembimbing_unit, prak.tanggal_mulai , prak.tanggal_selesai, prak.unit_id, u.nama nama_unit
            from siswa s
            join nama_sekolah nms on s.nama_sekolah_id = nms.id
            join pembimbing_sekolah ps on ps.nama_sekolah_id = nms.id
            join prakerin_siswa prak on prak.siswa_id = s.id
            join unit u on u.id = prak.unit_id
            join pembimbing_unit pu on pu.unit_id = u.id
            where s.id = $id");
        return $query->result();
    }
}