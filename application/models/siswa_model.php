<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    
    public function delete($id)
    {
        $this->db->delete('groups',array('id'=>$id));
    }
}