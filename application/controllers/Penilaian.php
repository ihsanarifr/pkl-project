<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller
{
    function __construct(){
        parent::__construct();
        if($this->ion_auth->logged_in() != true){
            redirect('auth/login');
        }

        $this->load->model('penilaian_model');
         $this->load->model('aspek_penilaian_model');
        $this->load->model('kategori_penilaian_model');
        $this->load->model('siswa_model');

        //$this->load->model('grup_user_model');
  	}

    public function index()
    {
        $data['main']='penilaian/siswa/index';
        $data['menu']=1;
        $data['judul']='Penilaian Siswa PKL';
        $data['penilaian'] = $this->penilaian_model->get_by_prakerin_id($this->session->userdata('prakerin_id'));
        $data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
        $this->load->view('layouts/master',$data);
    }
    public function view()
    {
        if(empty($id))
        {
            redirect('/');
        }

        $data['main']='penilaian/siswa/view';
        $data['menu']=1;
        $data['css']=array('css/datatables.min');
        $data['penilaian']= $this->penilaian_model->select_by_id($id);
        $data['prakerin_siswa']= $this->prakerin_siswa_model->get_data_by_siswa($id);
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
        $data['judul']='Lihat Siswa PKL';
        $this->load->view('layouts/master',$data);
    }
    public function add()
    {
        $data['main']='penilaian/siswa/create';
        $data['menu']=1;
        $data['aspek_penilaian'] = $this->aspek_penilaian_model->viewall();
        $data['kelompok_penilaian'] = $this->kategori_penilaian_model->viewall()->result();

        //$data['groups'] = $this->grup_user_model->viewall()->result();
        
        $data['judul']='Tambah Penilaian Siswa PKL';
        $this->load->view('layouts/master',$data);   
    }

    public function save()
    {
        $this->form_validation->set_rules('aspek_penilaian_id', 'Aspek Penilaian', 'required');

        $data = array(
          // 'id' => $this->input->post('id'),
            'prakerin_siswa_id' => $this->session->userdata('prakerin_id'),
            'aspek_penilaian_id' => $this->input->post('aspek_penilaian_id'),  
        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='penilaian/siswa/create';
            $data['menu']=1;
            $data['judul']='Tambah penilaian siswa PKL';
            $data['aspek_penilaian'] = $this->aspek_penilaian_model->viewall();
            $data['kelompok_penilaian'] = $this->kategori_penilaian_model->viewall()->result();
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            $this->penilaian_model->save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Simpan data penilaian sudah selesai');
            redirect('penilaian');
        }
    }
    public function edit($id)
    {
         if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('penilaian');
        }

        $data['main']='penilaian/siswa/edit';
        $data['menu']=1;
        $data['penilaian'] = $this->penilaian_model->select_by_id($id)->row();;
        $data['aspek_penilaian'] = $this->aspek_penilaian_model->viewall();
        $data['kelompok_penilaian'] = $this->kategori_penilaian_model->viewall();
        $data['judul']='Edit penilaian PKL';
        $this->load->view('layouts/master',$data);

    }
    public function update()
    {
        
        $this->form_validation->set_rules('aspek_penilaian_id', 'Aspek Penilaian', 'required');
        $data = array(
            'id' => $this->input->post('id'),
            'aspek_penilaian_id' => $this->input->post('aspek_penilaian_id'), 
            'prakerin_siswa_id' => $this->session->userdata('prakerin_id'),
    
        );
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            return $this->edit($data['id']);

        }
        else
        {
            $this->penilaian_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah penilaian siswa sudah selesai');
            redirect('penilaian');
        }
    }
    public function delete($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('penilaian');
        }
        else
        {        
            $this->penilaian_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus penilaian siswa PKL sudah selesai');
            $this->db->delete('penilaian',array('id'=>$id));
            redirect('penilaian');   
        }
    }

    public function pembimbing_unit_index()
    {
       $data['main']='penilaian/pembimbing_unit/index';
        $data['menu']=1;
        $data['judul']='Penilaian Siswa PKL';
        $data['penilaian'] = $this->penilaian_model->get_by_pembimbing_id($this->ion_auth->user()->row()->id);
        $data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
        $this->load->view('layouts/master',$data);
    }
    public function pembimbing_unit_view()
    {
        if(empty($id))
        {
            redirect('/');
        }

        $data['main']='penilaian/pembimbing_unit/view';
        $data['menu']=1;
        $data['css']=array('css/datatables.min');
        $data['penilaian']= $this->penilaian_model->select_by_id($id);
        $data['prakerin_siswa']= $this->prakerin_siswa_model->get_data_by_siswa($id);
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
        $data['judul']='Lihat Siswa PKL';
        $this->load->view('layouts/master',$data);
    }
    public function pembimbing_unit_add()
    {
         $data['main']='penilaian/pembimbing_unit/create';
        $data['menu']=1;
        $data['aspek_penilaian'] = $this->aspek_penilaian_model->viewall();
        $data['kelompok_penilaian'] = $this->kategori_penilaian_model->viewall()->result();

        //$data['groups'] = $this->grup_user_model->viewall()->result();
        
        $data['judul']='Tambah Penilaian Siswa PKL';
        $this->load->view('layouts/master',$data);   
    }
    public function pembimbing_unit_save()
    {
        $this->form_validation->set_rules('aspek_penilaian_id', 'Aspek Penilaian', 'required');
        $this->form_validation->set_rules('nama', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('nilai_angka', 'Nilai Angka', 'required');
        $this->form_validation->set_rules('nilai_huruf', 'Nilai Huruf', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');





        $data = array(
          // 'id' => $this->input->post('id'),
            'prakerin_siswa_id' => $this->session->userdata('prakerin_id'),
            'aspek_penilaian_id' => $this->input->post('aspek_penilaian_id'),
            'nama' => $this->input->post('nama'),  
            'nilai_angka' => $this->input->post('nilai_angka'), 
            'nilai_huruf' => $this->input->post('nilai_huruf'), 
            'keterangan' => $this->input->post('keterangan'), 

        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='penilaian/pembimbing_unit/create';
            $data['menu']=1;
            $data['judul']='Tambah penilaian siswa PKL';
            $data['aspek_penilaian'] = $this->aspek_penilaian_model->viewall();
            $data['kelompok_penilaian'] = $this->kategori_penilaian_model->viewall()->result();
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            $this->penilaian_model->save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Simpan data penilaian sudah selesai');
            redirect('penilaian');
        }
    }
    public function pembimbing_unit_edit($id)
    {
       if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('penilaian');
        }

        $data['main']='penilaian/pembimbing_unit/edit';
        $data['menu']=1;
        $data['penilaian'] = $this->penilaian_model->select_by_id($id)->row();
        $data['aspek_penilaian'] = $this->aspek_penilaian_model->viewall();
        $data['kelompok_penilaian'] = $this->kategori_penilaian_model->viewall();
        $data['judul']='Edit penilaian PKL';
        $this->load->view('layouts/master',$data);
    }

    public function pembimbing_unit_nilai($id)
    {
       if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('penilaian');
        }

        $data['main']='penilaian/pembimbing_unit/edit';
        $data['menu']=1;
        $data['penilaian'] = $this->penilaian_model->select_by_id($id)->row();
        $data['aspek_penilaian'] = $this->aspek_penilaian_model->viewall();
        $data['kelompok_penilaian'] = $this->kategori_penilaian_model->viewall();
        $data['judul']='Tambah penilaian PKL';
        $this->load->view('layouts/master',$data);
    }
    public function pembimbing_unit_update($id)
    {
        $this->form_validation->set_rules('nilai_angka', 'Nilai Angka', 'required');
        $this->form_validation->set_rules('nilai_huruf', 'Nilai Huruf', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        $data = array(
            'id' => $this->input->post('id'),
            'nilai_angka' => $this->input->post('nilai_angka'), 
            'nilai_huruf' => $this->input->post('nilai_huruf'), 
            'keterangan' => $this->input->post('keterangan'),
    
        );
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            return $this->edit($data['id']);

        }
        else
        {
            $this->penilaian_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah penilaian siswa sudah selesai');
            redirect('penilaian/pembimbing_unit_index');
        }

    }

    public function pembimbing_sekolah_index()
    {
       $data['main']='penilaian/pembimbing_unit/index';
        $data['menu']=1;
        $data['judul']='Penilaian Siswa PKL';
        $data['penilaian'] = $this->penilaian_model->get_by_pembimbing_id($this->ion_auth->user()->row()->id);
        $data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
        $this->load->view('layouts/master',$data);
    }

}