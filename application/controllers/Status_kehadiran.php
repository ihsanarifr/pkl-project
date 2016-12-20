<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_kehadiran extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true)
        {
    		redirect('auth/login');
    	}

        $this->load->model('status_kehadiran_model');
  	}

	public function index()
	{
		$data['main']='status_kehadiran/index';
		$data['menu']=3;
		$data['judul']='Data Status Kehadiran';
        
        $data['status_kehadiran'] = $this->status_kehadiran_model->viewall()->result();
        

		$data['css']=array('css/datatables.min');
        $data['js']= array('js/datatables.min');
		$this->load->view('layouts/master',$data);
	}   

    public function view($id)
    {
        if(empty($id))
        {
            redirect('/');
        }

        $data['main']='status_kehadiran/view';
		$data['menu']=3;
        $data['css']=array('css/datatables.min');
        $data['js']= array('js/datatables.min');
		$data['judul']='Lihat Status Kehadiran PKL';
		$this->load->view('layouts/master',$data);
    }

    public function add()
    {

        $data['main']='status_kehadiran/create';
		$data['menu']=1;
		$data['judul']='Tambah Status Kehadiran PKL';
		$this->load->view('layouts/master',$data);
    }

    public function save()
    {
        $this->form_validation->set_rules('nama', 'Nama Status Kehadiran', 'required');

        $data = array(
            'nama' => $this->input->post('nama'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='status_kehadiran/create';
            $data['menu']=1;
            $data['judul']='Tambah Status Kehadiran';
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            $this->status_kehadiran_model->save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Simpan data status kehadiran sudah selesai');
            redirect('status_kehadiran');
        }
    }

    public function edit($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('status_kehadiran');
        }

        $data['main']='status_kehadiran/edit';
		$data['menu']=1;
		$data['judul']='Edit Status Kehadiran';

        $data['status_kehadiran'] = $this->status_kehadiran_model->select_by_id($id)->row();
		$this->load->view('layouts/master',$data);

    }

    public function update()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            return $this->edit($data['id']);
        }
        else
        {
            $this->status_kehadiran_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah status kehadiran sudah selesai');
            redirect('status_kehadiran');
        }
    }

    public function delete($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('status_kehadiran');
        }
        else
        {
            $this->status_kehadiran_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus status kehadiran sudah selesai');
            redirect('status_kehadiran');   
        }
    }
}