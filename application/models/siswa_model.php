<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class siswa_model extends CI_Model
{
    public function viewall()
    {
<<<<<<< HEAD
        return $this->db->get('siswa');
=======
        $this->lang->load('auth');

        if($this->ion_auth->is_admin())
        {
            $query = $this->db->query('select s.*,ns.nama nama_sekolah,pk.nama nama_program_keahlian from user u
                join users us on us.id=u.id
                join siswa s on s.id=u.id
                join nama_sekolah ns on ns.id=s.nama_sekolah_id
                join program_keahlian pk on pk.id=s.program_keahlian_id
                where u.jenis_user_id=2');   
        }
        else if($this->ion_auth->in_group('Pembimbing Sekolah'))
        {
            $user_id = $this->ion_auth->user()->row()->id;
            $query = $this->db->query("select distinct s.*,ns.nama nama_sekolah,pk.nama nama_program_keahlian from user u
                    join users us on us.id=u.id
                    join siswa s on s.id=u.id
                    join nama_sekolah ns on ns.id=s.nama_sekolah_id
                    join program_keahlian pk on pk.id=s.program_keahlian_id
                    join prakerin_siswa ps on ps.siswa_id=s.id
                    where u.jenis_user_id=2 and ps.pembimbing_sekolah_id=$user_id"); 
        }
        else if($this->ion_auth->in_group('Pembimbing Unit'))
        {
            $user_id = $this->ion_auth->user()->row()->id;
            $query = $this->db->query("select distinct s.*,ns.nama nama_sekolah,pk.nama nama_program_keahlian from user u
                    join users us on us.id=u.id
                    join siswa s on s.id=u.id
                    join nama_sekolah ns on ns.id=s.nama_sekolah_id
                    join program_keahlian pk on pk.id=s.program_keahlian_id
                    join prakerin_siswa ps on ps.siswa_id=s.id
                    where u.jenis_user_id=2 and ps.pembimbing_unit_id=$user_id");
        }

        return $query->result();
>>>>>>> 520c3c875e69505cd44845ed69e9e8b8da038bc7
    }

    public function select_by_id($id)
    {
        $this->db->where('siswa.id',$id);
        return $this->db->get('siswa');
    }

    public function save($data)
    {
        $this->db->insert('siswa',$data);
<<<<<<< HEAD
=======
        
>>>>>>> 520c3c875e69505cd44845ed69e9e8b8da038bc7
    }

    public function update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('siswa',$data);
    }

<<<<<<< HEAD
    public function delete($id)
    {
        $this->db->delete('siswa',array('id'=>$id));
=======

    public function delete($id)
    {
        $this->db->delete('siswa',array('id'=>$id));
        $this->db->delete('user',array('id'=>$id));
        $this->ion_auth->delete_user($id);
    }

    public function last_user_id()
    {
       return $this->db->get('users')->last_row()->id;
>>>>>>> 520c3c875e69505cd44845ed69e9e8b8da038bc7
    }
    
    public function save_user($data)
    {
       $this->db->insert('user',$data);  
    }
    public function siswa_detail_by_id($id)
    {
        $query = $this->db->query("select s.*,ns.nama nama_sekolah,pk.nama nama_program_keahlian,go.nama nama_golongan_darah, jk.nama nama_jenis_kelamin
                    from user u
                    left join users us on us.id=u.id
                    left join siswa s on s.id=u.id
                    left outer join nama_sekolah ns on ns.id=s.nama_sekolah_id
                    left outer join program_keahlian pk on pk.id=s.program_keahlian_id
                    left outer join gol_darah go on go.id=s.gol_darah_id
                    left outer join jenis_kelamin jk on jk.id=s.jenis_kelamin_id
                    where u.id=$id");
        return $query->row();
    } 

    public function kegiatan_siswa_save($data)
    {
        $this->db->insert('prakerin_siswa',$data);
        
    }

    public function siswa_sedang_berlangsung(){
        $query = $this->db->query("select prak.id, s.nama, s.nomor_induk, nms.nama as sekolah, ps.nama as pembimbing, prak.tanggal_mulai , prak.tanggal_selesai
            from siswa s
            left outer join nama_sekolah nms on s.nama_sekolah_id = nms.id
            left outer join pembimbing_sekolah ps on ps.nama_sekolah_id = nms.id
            left outer join prakerin_siswa prak on prak.siswa_id = s.id
            where NOW() >= prak.tanggal_mulai AND NOW() <= prak.tanggal_selesai");
        return $query->result();
    }

 public function siswa_belum_berlangsung(){
        $query = $this->db->query("select prak.id, s.nama, s.nomor_induk, nms.nama as sekolah, ps.nama as pembimbing, prak.tanggal_mulai , prak.tanggal_selesai
            from siswa s
            left outer join nama_sekolah nms on s.nama_sekolah_id = nms.id
            left outer join pembimbing_sekolah ps on ps.nama_sekolah_id = nms.id
            left outer join prakerin_siswa prak on prak.siswa_id = s.id
            where NOW() >= prak.tanggal_mulai ");
        return $query->result();
    }

    public function siswa_selesai(){
        $query = $this->db->query("select prak.id, s.nama, s.nomor_induk, nms.nama as sekolah, ps.nama as pembimbing, prak.tanggal_mulai , prak.tanggal_selesai
            from siswa s
            left outer join nama_sekolah nms on s.nama_sekolah_id = nms.id
            left outer join pembimbing_sekolah ps on ps.nama_sekolah_id = nms.id
            left outer join prakerin_siswa prak on prak.siswa_id = s.id
            where (NOW() >= prak.tanggal_selesai)");
        return $query->result();
    }

    public function kegiatan_siswa_update($data)
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('prakerin_siswa',$data);
    }

    

    public function get_data_by_id($id){
        $query = $this->db->query("select prak.id, s.id id_siswa, prak.unit_id id_unit, prak.pembimbing_unit_id, prak.pembimbing_sekolah_id, prak.tanggal_mulai, prak.tanggal_selesai, prak.kelas_id id_kelas, prak.jabatan_pembimbing, prak.jabatan_pembimbing_sekolah
            from siswa s
            left outer join nama_sekolah nms on s.nama_sekolah_id = nms.id
            left outer join pembimbing_sekolah ps on ps.nama_sekolah_id = nms.id
            left outer join prakerin_siswa prak on prak.siswa_id = s.id
            where prak.id = $id");
        return $query->row();
    }    
}