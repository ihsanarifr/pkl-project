<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kota_kabupaten extends CI_Controller{
	function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('kota_kabupaten_model');
  	}

	public function index()
	{
		$data['main']='kota_kabupaten/index';
		$data['menu']=2;
		$data['judul']='Data kota_kabupaten';
		$data['css']=array('css/datatables.min');
        $data['kota_kabupaten'] = $this->kota_kabupaten_model->viewall();
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}  

	public function view($id)
    {
        if(empty($id))
        {
            redirect('/');
        }

        $data['main']='kota_kabupaten/view';
        $data['menu']=2;
        $data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
        $data['judul']='Lihat Data kota_kabupaten';
        $this->load->view('layouts/master',$data);
    }

    public function add()
    {
    	$data['main']='kota_kabupaten/create';
		$data['menu']=2;
		$data['judul']='Tambah Data kota_kabupaten';
		$this->load->view('layouts/master',$data);
    }
    
	public function save()
    {
        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('inisial', 'Inisial', 'required');
        $this->form_validation->set_rules('kode', 'Kode', 'required');

        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'inisial' => $this->input->post('inisial'),
            'kode' => $this->input->post('kode'),
        );
        if ($this->form_validation->run() == FALSE)
        {
        	 $data['main']='kota_kabupaten/create';
            $data['menu']=2;
            $data['judul']='Tambah Data kota_kabupaten';
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            $this->kota_kabupaten_model->save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Simpan data kota kabupaten sudah selesai');
            redirect('kota_kabupaten');
        }
    }

    public function edit($id)
     {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('kota_kabupaten');
        }

        $data['main']='kota_kabupaten/edit';
        $data['menu']=2;
        $data['judul']='Edit Data kota_kabupaten';

        $data['kota_kabupaten'] = $this->kota_kabupaten_model->select_by_id($id)->row();
        $this->load->view('layouts/master',$data);

    }
     public function update()
     {
        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
         $this->form_validation->set_rules('inisial', 'Inisial', 'required');
         

        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'inisial' => $this->input->post('inisial'),
             
        );
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            return $this->edit($data['id']);
        }
        else
        {
            $this->kota_kabupaten_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah data kota kabupaten sudah selesai');
            redirect('kota_kabupaten');
        }
    }

     public function delete($id)
    {
        if(empty($id))
       {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('kota_kabupaten');
        }
        else
        {
            $this->kota_kabupaten_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus data kota kabupaten sudah selesai');
            redirect('kota_kabupaten');   
        }
    }

}