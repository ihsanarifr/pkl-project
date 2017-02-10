
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permasalahan_model extends CI_Model
{
    
	public function viewall()
    {
        return $this->db->get('permasalahan')->result();
    }
    public function get_by_prakerin_id($id)
    {
        return $this->db->where('prakerin_siswa_id',$id)->get('permasalahan')->result();
    }

    public function save($data)
    {
        $this->db->insert('permasalahan',$data);
    }

    public function update($data)
    {
        $id = $data['id']; 
        $this->db->where('id',$id);
        $this->db->update('permasalahan',$data);
    }


    public function delete($id)
    {
        $this->db->delete('permasalahan',array('id'=>$id));
    }

     public function last_user_id()
    {
       return $this->db->get('users')->last_row()->id;
    }

    public function select_by_id($id)
    {
        $this->db->where('permasalahan.id',$id);
        return $this->db->get('permasalahan');
    }
}