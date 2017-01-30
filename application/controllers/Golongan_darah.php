<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Golongan_darah extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('golongan_darah_model');
  	}

	public function index()
	{
		$data['main']='golongan_darah/index';
		$data['menu']=2;
		$data['judul']='Data Golongan Darah';

        $data['golongan_darah'] = $this->golongan_darah_model->viewall()->result();


		$data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

    public function add()
    {

        $data['main']='golongan_darah/create';
		$data['menu']=1;
		$data['judul']='Tambah Golongan Darah';
		$this->load->view('layouts/master',$data);
    }

    public function save()
    {
        $this->form_validation->set_rules('nama', 'Golongan Darah', 'required');


        $data = array(
            'name' => $this->input->post('nama'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='golongan_darah/create';
            $data['menu']=1;
            $data['judul']='Tambah Golongan Darah';
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            $this->golongan_darah_model->save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Simpan golongan darah sudah selesai');
            redirect('golongan_darah');
        }
    }

    public function edit($id)
    {
        if(empty($id))
        {
            redirect('home');
        }

        $data['main']='golongan_darah/edit';
		$data['menu']=1;
		$data['judul']='Edit Golongan Darah';

        $data['grup_user'] = $this->golongan_darah_model->select_by_id($id)->row();
		$this->load->view('layouts/master',$data);

    }

    public function update()
    {
        $this->form_validation->set_rules('nama', 'Golongan Darah', 'required');

        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('nama'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            return $this->edit($data['id']);
        }
        else
        {
            $this->golongan_darah_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah golongan darah sudah selesai');
            redirect('golongan_darah');
        }
    }

    public function delete($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('golongan_darah');
        }
        else
        {
            $this->golongan_darah_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus golongan darah sudah selesai');
            redirect('golongan_darah');
        }
    }
}