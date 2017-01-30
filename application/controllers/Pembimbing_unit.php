<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembimbing_unit extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('pembimbing_unit_model');
  	}

	public function index()
	{
		$data['main']='pembimbing_unit/index';
		$data['menu']=2;
		$data['judul']='Data Pembimbing Unit';
		$data['css']=array('css/datatables.min');
        $data['pembimbing_unit'] = $this->pembimbing_unit_model->viewall()->result();
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

    

    public function add()
    {
        $data['main']='pembimbing_unit/create';
		$data['menu']=1;
		$data['judul']='Tambah Pembimbing Unit';
		$this->load->view('layouts/master',$data);
    }

    public function save()
    {
       $this->form_validation->set_rules('nama', 'Nama Pembimbing Unit', 'required');

        $data = array(
            'nama' => $this->input->post('nama'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='pembimbing_unit/create';
            $data['menu']=1;
            $data['judul']='Tambah Pembimbing Unit';
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            $this->pembimbing_unit_model->save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Simpan data Pembimbing Unit sudah selesai');
            redirect('pembimbing_unit');
        }
    }

    public function edit($id)
    {
        if(empty($id))
        {
            redirect('home');
        }

        $data['main']='pembimbing_unit/edit';
		$data['menu']=1;
		$data['judul']='Edit Pembimbing Unit';

         $data['pembimbing_unit'] = $this->pembimbing_unit_model->select_by_id($id)->row();

		$this->load->view('layouts/master',$data);

    }

    public function update()
    {
        $this->form_validation->set_rules('nama', 'Nama Pembimbing Unit', 'required');

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
            $this->pembimbing_unit_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah data Pembimbing Unit sudah selesai');
            redirect('pembimbing_unit');
        }
    }

    public function delete($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('pembimbing_unit');
        }
        else
        {
            $this->pembimbing_unit_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus data Pembimbing Unit sudah selesai');
            redirect('pembimbing_unit');   
        }
    }
}