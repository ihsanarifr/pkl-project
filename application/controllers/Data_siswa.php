<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('siswa_model');
  	}

	public function index()
	{
		$data['main']='data_siswa/index';
		$data['menu']=1;
		$data['judul']='Data Siswa PKL';

        $data['data_siswa'] = $this->siswa_model->viewall()->result();
        

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

        $data['main']='data_siswa/create';
		$data['menu']=1;
		$data['judul']='Tambah Siswa PKL';
		$this->load->view('layouts/master',$data);
    }

    public function edit($id)
    {
        if(empty($id))
        {
            redirect('home');
        }

        $data['main']='data_siswa/edit';
		$data['menu']=1;
		$data['judul']='Edit Siswa PKL';
		$this->load->view('layouts/master',$data);

    }

    public function update()
    {
        $this->form_validation->set_rules('nama', 'Nama Siswa', 'required');

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
            $this->session->set_flashdata('message', 'Ubah data siswa sudah selesai');
            redirect('data_siswa');
        }
    }

    public function delete($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('data_siswa');
        }
        else
        {
            $this->data_siswa_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus data siswa sudah selesai');
            redirect('data_siswa');   
        }
    }

    public function kegiatan_siswa()
    {
        $data['main']='data_siswa/kegiatan_siswa';
		$data['menu']=1;
		$data['judul']='Data Kegiatan Siswa PKL';
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
    }

    public function detail_kegiatan($id)
    {
        $data['main']='data_siswa/detail_kegiatan';
		$data['menu']=1;
		$data['judul']='Data Detail Kegiatan Siswa PKL';
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);   
    }
}