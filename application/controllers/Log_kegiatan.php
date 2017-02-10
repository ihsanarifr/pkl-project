<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_kegiatan extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('log_kegiatan_model');
  	}

	public function index()
	{
		$data['main']='log_kegiatan/index';
		$data['menu']=2;
		$data['judul']='Data Log Kegiatan';
        $data['kegiatan'] = $this->log_kegiatan_model->get_by_prakerin_id($this->session->userdata('prakerin_id'));
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

    

    public function add()
    {
        $data['main']='log_kegiatan/create';
		$data['menu']=2;
		$data['judul']='Tambah Log Kegiatan';
		$this->load->view('layouts/master',$data);
    }

    public function save()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('mulai', 'Jam Mulai', 'required');
        $this->form_validation->set_rules('selesai', 'Jam Selesai', 'required');
        $this->form_validation->set_rules('uraian_kegiatan', 'Uraian Kegiatan', 'required');
        $this->form_validation->set_rules('sarana', 'Sarana', 'required');



        $data = array(
            //'id' => $this->permasalahan_model->last_user_id(),
            'tanggal' => $this->input->post('tanggal'),
            'mulai' => $this->input->post('mulai'),
            'selesai' => $this->input->post('selesai'),
            'uraian_kegiatan' => $this->input->post('uraian_kegiatan'),
            'sarana' => $this->input->post('sarana'),
            'prakerin_siswa_id' => $this->session->userdata('prakerin_id'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='log_kegiatan/create';
            $data['menu']=2;
            $data['judul']='Tambah Permasalahan Kerja';
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            // memanggil fungsi di model grup_user_model
            $this->log_kegiatan_model->save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Simpan data permasalahan sudah selesai');
            redirect('log_kegiatan');
        }
    }

    public function edit($id)
    {
        if(empty($id))
        {
            redirect('home');
        }

        $data['main']='log_kegiatan/edit';
		$data['menu']=2;
        $data['kegiatan'] = $this->log_kegiatan_model->select_by_id($id)->row();
		$data['judul']='Edit Log Kegiatan';
		$this->load->view('layouts/master',$data);

    }

    public function update()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('mulai', 'Jam Mulai', 'required');
        $this->form_validation->set_rules('selesai', 'Jam Selesai', 'required');
        $this->form_validation->set_rules('uraian_kegiatan', 'Uraian Kegiatan', 'required');
        $this->form_validation->set_rules('sarana', 'Sarana', 'required');


        $data = array(
            'id' => $this->input->post('id'),
            'tanggal' => $this->input->post('tanggal'),
            'mulai' => $this->input->post('mulai'),
            'selesai' => $this->input->post('selesai'),
            'uraian_kegiatan' => $this->input->post('uraian_kegiatan'),
            'sarana' => $this->input->post('sarana'),
            'prakerin_siswa_id' => $this->session->userdata('prakerin_id'),
        );
    
        //print_r($data);exit;
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            return $this->edit($data['id']);
        }
        else
        {
            $this->log_kegiatan_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah data Permasalahan sudah selesai');
            redirect('log_kegiatan');
        }
    }

    public function delete($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('log_kegiatan');
        }
        else
        {
            $this->log_kegiatan_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus data log kegiatan sudah selesai');
            $this->db->delete('kegiatan',array('id'=>$id));
            redirect('log_kegiatan');   
        }
    }
}