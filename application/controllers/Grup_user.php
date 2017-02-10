<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grup_user extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('grup_user_model');
  	}

	public function index()
	{
		$data['main']='grup_user/index';
		$data['menu']=2;
		$data['judul']='Data Siswa PKL';
        
        $data['grup_user'] = $this->grup_user_model->viewall()->result();
        

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

        $data['main']='data_siswa/view';
		$data['menu']=1;
        $data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$data['judul']='Lihat Siswa PKL';
		$this->load->view('layouts/master',$data);
    }

    public function add()
    {

        $data['main']='grup_user/create';
		$data['menu']=1;
		$data['judul']='Tambah Siswa PKL';
		$this->load->view('layouts/master',$data);
    }

    public function save()
    {
        $this->form_validation->set_rules('nama', 'Nama Grup', 'required');


        $data = array(
            'name' => $this->input->post('nama'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='grup_user/create';
            $data['menu']=1;
            $data['judul']='Tambah Siswa PKL';
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            // memanggil fungsi di model grup_user_model
            $this->grup_user_model->save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Simpan data grup pengguna sudah selesai');
            redirect('grup_user');
        }
    }

    public function edit($id)
    {
        if(empty($id))
        {
            redirect('home');
        }

        $data['main']='grup_user/edit';
		$data['menu']=1;
		$data['judul']='Edit Grup User PKL';

        $data['grup_user'] = $this->grup_user_model->select_by_id($id)->row();
		$this->load->view('layouts/master',$data);

    }

    public function update()
    {
        $this->form_validation->set_rules('nama', 'Nama Grup', 'required');

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
            $this->session->set_flashdata('message', 'Ubah data grup pengguna sudah selesai');
            redirect('grup_user');
        }
    }

    public function delete($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('grup_user');
        }
        else
        {
            $this->grup_user_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus data grup pengguna sudah selesai');
            redirect('grup_user');   
        }
    }
}