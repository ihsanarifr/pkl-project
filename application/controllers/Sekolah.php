<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('sekolah_model');
  	}

	public function index()
	{
		$data['main']='sekolah/index';
		$data['menu']=2;
		$data['judul']='Data Sekolah';

        $data['nama_sekolah'] = $this->sekolah_model->viewall()->result();
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

        $data['main']='sekolah/view';
        $data['menu']=1;
        $data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
        $data['judul']='Lihat Data Sekolah';
        $this->load->view('layouts/master',$data);
    }


    public function add()
    {
        $data['main']='sekolah/create';
		$data['menu']=1;
		$data['judul']='Tambah Sekolah';
		$this->load->view('layouts/master',$data);
    }

    public function save()
    {
        $this->form_validation->set_rules('nama', 'Nama Sekolah', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
         $this->form_validation->set_rules('hp', 'Hp', 'required');

        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'hp' => $this->input->post('hp'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='sekolah/create';
            $data['menu']=1;
            $data['judul']='Tambah sekolah';
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            $this->sekolah_model->save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Simpan data unit pengguna sudah selesai');
            redirect('nama_sekolah');
        }
    }

    public function edit($id)
    {
        if(empty($id))
        {
            redirect('home');
        }

        $data['main']='sekolah/edit';
		$data['menu']=1;
		$data['judul']='Edit Sekolah';

        $data['nama_sekolah'] = $this->sekolah_model->select_by_id($id)->row();
		$this->load->view('layouts/master',$data);

    }

    public function update()
     {
        $this->form_validation->set_rules('nama', 'Nama Sekolah', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
         $this->form_validation->set_rules('hp', 'Hp', 'required');

        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
             'hp' => $this->input->post('hp'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            return $this->edit($data['id']);
        }
        else
        {
            $this->sekolah_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah data sekolah sudah selesai');
            redirect('nama_sekolah');
        }
    }

    public function delete($id)
    {
        if(empty($id))
       {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('nama_sekolah');
        }
        else
        {
            $this->sekolah_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus data grup pengguna sudah selesai');
            redirect('nama_sekolah');   
        }
    }
}