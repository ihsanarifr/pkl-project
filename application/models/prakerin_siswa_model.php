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
}