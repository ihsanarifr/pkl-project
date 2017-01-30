<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Golongan_darah_model extends CI_Model
{
   public function viewall()
    {
<<<<<<< HEAD
        return $this->db->get('golongan_darah');
=======
        return $this->db->get('gol_darah');
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
    }

    public function select_by_id($id)
    {
<<<<<<< HEAD
        $this->db->where('golongan_darah.id',$id);
        return $this->db->get('golongan_darah');
=======
        $this->db->where('gol_darah.id',$id);
        return $this->db->get('gol_darah');
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
    }

    public function save($data)
    {
<<<<<<< HEAD
        $this->db->insert('golongan_darah',$data);
=======
        $this->db->insert('gol_darah',$data);
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
    }

    public function update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
<<<<<<< HEAD
        $this->db->update('golongan_darah',$data);
=======
        $this->db->update('gol_darah',$data);
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
    }

    public function delete($id)
    {
<<<<<<< HEAD
        $this->db->delete('golongan_darah',array('id'=>$id));
=======
        $this->db->delete('gol_darah',array('id'=>$id));
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
    } 
}