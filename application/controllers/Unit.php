<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true)
        {
    		redirect('auth/login');
    	}

        $this->load->model('unit_model');
  	}

	public function index()
	{
		$data['main']='unit/index';
		$data['menu']=2;
		$data['judul']='Data Unit PKL';
        
        $data['unit'] = $this->unit_model->viewall()->result();
        

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

        $data['main']='unit/view';
		$data['menu']=1;
        $data['css']=array('css/datatables.min');
        $data['js']= array('js/datatables.min');
		$data['judul']='Lihat Unit PKL';
		$this->load->view('layouts/master',$data);
    }

    public function add()
    {

        $data['main']='unit/create';
		$data['menu']=1;
		$data['judul']='Tambah Unit PKL';
		$this->load->view('layouts/master',$data);
    }

    public function save()
    {
        $this->form_validation->set_rules('nama', 'Nama Unit', 'required');
        $this->form_validation->set_rules('bidang', 'Nama Bidang', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        $data = array(
            'nama' => $this->input->post('nama'),
            'bidang' => $this->input->post('bidang'),
            'alamat' => $this->input->post('alamat'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='unit/create';
            $data['menu']=1;
            $data['judul']='Tambah Unit PKL';
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            $this->unit_model->save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Simpan data unit pengguna sudah selesai');
            redirect('unit');
        }
    }

    public function edit($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('unit');
        }

        $data['main']='unit/edit';
		$data['menu']=1;
		$data['judul']='Edit Unit PKL';

        $data['unit'] = $this->unit_model->select_by_id($id)->row();
		$this->load->view('layouts/master',$data);

    }

    public function update()
    {
        $this->form_validation->set_rules('nama', 'Nama Unit', 'required');
        $this->form_validation->set_rules('bidang', 'Nama Bidang', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'bidang' => $this->input->post('bidang'),
            'alamat' => $this->input->post('alamat'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            return $this->edit($data['id']);
        }
        else
        {
            $this->unit_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah data unit sudah selesai');
            redirect('unit');
        }
    }

    public function delete($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('unit');
        }
        else
        {
            $this->unit_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus data unit sudah selesai');
            redirect('unit');   
        }
    }
}