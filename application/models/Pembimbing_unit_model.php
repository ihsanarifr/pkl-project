<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembimbing_unit_model extends CI_Model
{
   public function viewall()
    {
    	 $query = $this->db->query('select pu.*,u.nama unit from pembimbing_unit pu
             join unit u on u.id = pu.unit_id
    	 	 ');
    	 return $query->result();
    }

    public function select_by_id($id)
    {
        $this->db->where('pembimbing_unit.id',$id);
        return $this->db->get('pembimbing_unit');
    }  

    public function save($data)
    {
        $this->db->insert('pembimbing_unit',$data);
        
    }

    public function update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('pembimbing_unit',$data);
    }


    public function delete($id)
    {

        $this->db->delete('pembimbing_unit',array('id'=>$id));
    }

    public function save_user($data)
    {
       $this->db->insert('user',$data);  
    }

}