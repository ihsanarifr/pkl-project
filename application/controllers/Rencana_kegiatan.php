<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rencana_kegiatan extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('rencana_kegiatan_model');
  	}

	public function index()
	{
		$data['main']='rencana_kegiatan/index';
		$data['menu']=0;
		$data['judul']='Data Rencana Kegiatan';
        $data['rencana_kegiatan'] = $this->rencana_kegiatan_model->viewall();
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

     public function view($id)
    {
        if(empty($id))
        {
            redirect('/');
        }

        $data['main']='data_siswa/view';
        $data['menu']=1;
        $data['css']=array('css/datatables.min');
        $data['rencana_kegiatan']= $this->rencana_kegiatan_model->select_by_id($id);
        $data['prakerin_siswa']= $this->prakerin_siswa_model->get_data_by_siswa($id);
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
        $data['judul']='Lihat Siswa PKL';
        $this->load->view('layouts/master',$data);
    }

    public function add()
    {
        $data['main']='rencana_kegiatan/create';
		$data['menu']=1;
		$data['judul']='Tambah Rencana Kegiatan';
		$this->load->view('layouts/master',$data);
    }

    public function save()
    {
        $this->form_validation->set_rules('uraian_kegiatan', 'Uraian Kegiatan', 'required');
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        $data = array(
            //'id' => $this->rencana_kegiatan_model->last_user_id(),
            'uraian_kegiatan' => $this->input->post('uraian_kegiatan'),
            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
            'tanggal_selesai' => $this->input->post('tanggal_selesai'),
            'keterangan' => $this->input->post('keterangan'),
            'prakerin_siswa_id' => $this->session->userdata('prakerin_id'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='rencana_kegiatan/create';
            $data['menu']=1;
            $data['judul']='Tambah Siswa PKL';
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());
            $this->load->view('layouts/master',$data);
        }
        else
        {
            // memanggil fungsi di model grup_user_model
            $this->rencana_kegiatan_model->save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Simpan rencana kegiatan pengguna sudah selesai');
            redirect('rencana_kegiatan');
        }
    }

    public function edit($id)
    {
        if(empty($id))
        {
            redirect('home');
        }

        $data['main']='rencana_kegiatan/edit';
		$data['menu']=1;
        $data['rencana_kegiatan'] = $this->rencana_kegiatan_model->select_by_id($id)->row();
		$data['judul']='Edit Rencana Kegiatan';
		$this->load->view('layouts/master',$data);

    }

    public function update()
    {
        $this->form_validation->set_rules('uraian_kegiatan', 'Uraian Kegiatan', 'required');
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');


        $data = array(
            'id' => $this->input->post('id'),
            'uraian_kegiatan' => $this->input->post('uraian_kegiatan'),
            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
            'tanggal_selesai' => $this->input->post('tanggal_selesai'),
            'keterangan' => $this->input->post('keterangan'),
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
            $this->rencana_kegiatan_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah data rencana kegiatan sudah selesai');
            redirect('rencana_kegiatan');
        }
    }

    public function delete($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('rencana_kegiatan');
        }
        else
        {
            $this->rencana_kegiatan_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus data rencana kegiatan sudah selesai');
            redirect('rencana_kegiatan');   
        }
    }
}