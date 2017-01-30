<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aspek_penilaian extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('aspek_penilaian_model');
  	}

	public function index()
	{
		$data['main']='aspek_penilaian/index';
		$data['menu']=1;
		$data['judul']='Data Aspek Penilaian';

        $data['aspek_penilaian'] = $this->aspek_penilaian_model->viewall()->result();


		$data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

    

    public function add()
    {

        $data['main']='aspek_penilaian/create';
		$data['menu']=1;
		$data['judul']='Tambah Aspek Penilaian';
		$this->load->view('layouts/master',$data);
    }

    public function save()
    {
        $this->form_validation->set_rules('nama', 'Nama Aspek Penilaian', 'required');

        $data = array(
            'name' => $this->input->post('nama'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='aspek_penilaian/create';
            $data['menu']=1;
            $data['judul']='Tambah Aspek Penilaian';
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            // memanggil fungsi di model grup_user_model
            $this->grup_user_model->save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Aspek penilaian sudah selesai');
            redirect('aspek_penilaian');
        }
    }

    public function edit($id)
    {
        if(empty($id))
        {
            redirect('home');
        }

        $data['main']='aspek_penilaian/edit';
		$data['menu']=1;
		$data['judul']='Edit Aspek Penilaian';

        $data['aspek_penilaian'] = $this->aspek_penilaian_model->select_by_id($id)->row();
		$this->load->view('layouts/master',$data);

    }

    public function update()
    {
         $this->form_validation->set_rules('nama', 'Aspek Penilaian', 'required');

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
            $this->grup_user_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah aspek penilaian sudah selesai');
            redirect('aspek_penilaian');
        }
    }

    public function delete($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('aspek_penilaian');
        }
        else
        {
            $this->aspek_penilaian->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus aspek penilaian sudah selesai');
            redirect('home');
        }
    }
}