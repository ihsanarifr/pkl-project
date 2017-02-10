<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_keahlian extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('program_keahlian_model');
  	}

	public function index()
	{
		$data['main']='program_keahlian/index';
		$data['menu']=2;
		$data['judul']='Data Program Keahlian';
		$data['css']=array('css/datatables.min');
        $data['Program_keahlian'] = $this->program_keahlian_model->viewall()->result();
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

    

    public function add()
    {
        $data['main']='program_keahlian/create';
		$data['menu']=1;
		$data['judul']='Tambah Program Keahlian';
        $data['program_keahlian'] = $this->program_keahlian_model->viewall()->result();
		$this->load->view('layouts/master',$data);
    }

    public function save()
    {
       $this->form_validation->set_rules('nama', 'Nama Program Keahlian', 'required');

        $data = array(
            'nama' => $this->input->post('nama'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='Program_keahlian/create';
            $data['menu']=1;
            $data['judul']='Tambah Program Keahlian';
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            $this->program_keahlian_model->save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Simpan data Program Keahlian sudah selesai');
            redirect('program_keahlian');
        }
    }

    public function edit($id)
    {
        if(empty($id))
        {
            redirect('home');
        }

        $data['main']='program_keahlian/edit';
		$data['menu']=1;
		$data['judul']='Edit Program Keahlian';

         $data['program_keahlian'] = $this->program_keahlian_model->select_by_id($id)->row();

		$this->load->view('layouts/master',$data);

    }

    public function update()
    {
 $this->form_validation->set_rules('nama', 'Nama program keahlian', 'required');

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
            $this->program_keahlian_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah data program keahlian sudah selesai');
            redirect('program_keahlian');
        }
    }

    public function delete($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('program_keahlian');
        }
        else
        {
            $this->program_keahlian_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus data program keahlian sudah selesai');
            redirect('program_keahlian');   
        }
    }
}