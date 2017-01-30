<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembimbing_sekolah extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('pembimbing_sekolah_model');
  	}

	public function index()
	{
		$data['main']='pembimbing_sekolah/index';
		$data['menu']=2;
		$data['judul']='Data Pembimbing Sekolah';
		$data['css']=array('css/datatables.min');
        $data['pembimbing_sekolah'] = $this->pembimbing_sekolah_model->viewall()->result();
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

    

    public function add()
    {
        $data['main']='pembimbing_sekolah/create';
		$data['menu']=1;
		$data['judul']='Tambah Pembimbing Sekolah';
		$this->load->view('layouts/master',$data);
    }

    public function save()
    {
       $this->form_validation->set_rules('nama', 'Nama Pembimbing Sekolah', 'required');

        $data = array(
            'nama' => $this->input->post('nama'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='pembimbing_sekolah/create';
            $data['menu']=1;
            $data['judul']='Tambah Pembimbing Sekolah';
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            $this->pembimbing_sekolah_model->save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Simpan data Pembimbing Sekolah sudah selesai');
            redirect('pembimbing_sekolah');
        }
    }

    public function edit($id)
    {
        if(empty($id))
        {
            redirect('home');
        }

        $data['main']='pembimbing_sekolah/edit';
		$data['menu']=1;
		$data['judul']='Edit Pembimbing Sekolah';

         $data['pembimbing_sekolah'] = $this->pembimbing_sekolah_model->select_by_id($id)->row();

		$this->load->view('layouts/master',$data);

    }

    public function update()
    {
 $this->form_validation->set_rules('nama', 'Nama Pembimbing Sekolah', 'required');

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
            $this->pembimbing_sekolah_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah data Pembimbing Sekolah sudah selesai');
            redirect('pembimbing_sekolah');
        }
    }

    public function delete($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('pembimbing_sekolah');
        }
        else
        {
            $this->pembimbing_sekolah_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus data Pembimbing Sekolah sudah selesai');
            redirect('pembimbing_sekolah');   
        }
    }
}