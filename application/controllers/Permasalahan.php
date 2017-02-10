<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permasalahan extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('permasalahan_model');
  	}

	public function index()
	{
		$data['main']='permasalahan/index';
		$data['menu']=2;
		$data['judul']='Data Rencana Kegiatan';
        $data['permasalahan'] = $this->permasalahan_model->get_by_prakerin_id($this->session->userdata('prakerin_id'));
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

        $data['main']='permasalahan/view';
        $data['menu']=2;
        $data['css']=array('css/datatables.min');
        $data['permasalahan']= $this->permasalahan_model->select_by_id($id);
        $data['prakerin_siswa']= $this->prakerin_siswa_model->get_data_by_siswa($id);
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
        $data['judul']='Lihat Siswa PKL';
        $this->load->view('layouts/master',$data);
    }

    public function add()
    {
        $data['main']='permasalahan/create';
		$data['menu']=2;
		$data['judul']='Tambah Permasalahan';
		$this->load->view('layouts/master',$data);
    }

    public function save()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('masalah', 'Masalah', 'required');
        $this->form_validation->set_rules('solusi', 'Solusi', 'required');
        $this->form_validation->set_rules('oleh', 'Oleh', 'required');


        $data = array(
            //'id' => $this->permasalahan_model->last_user_id(),
            'tanggal' => $this->input->post('tanggal'),
            'masalah' => $this->input->post('masalah'),
            'solusi' => $this->input->post('solusi'),
            'oleh' => $this->input->post('oleh'),
            'prakerin_siswa_id' => $this->session->userdata('prakerin_id'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='permasalahan/create';
            $data['menu']=2;
            $data['judul']='Tambah Permasalahan Kerja';
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            // memanggil fungsi di model grup_user_model
            $this->permasalahan_model->save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Simpan data permasalahan sudah selesai');
            redirect('permasalahan');
        }
    }

    public function edit($id)
    {
        if(empty($id))
        {
            redirect('home');
        }

        $data['main']='permasalahan/edit';
		$data['menu']=2;
        $data['permasalahan'] = $this->permasalahan_model->select_by_id($id)->row();
		$data['judul']='Edit Permasalahan';
		$this->load->view('layouts/master',$data);

    }

    public function update()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('masalah', 'Masalah', 'required');
        $this->form_validation->set_rules('solusi', 'Solusi', 'required');
        $this->form_validation->set_rules('oleh', 'Oleh', 'required');


        $data = array(
            'id' => $this->input->post('id'),
            'tanggal' => $this->input->post('tanggal'),
            'masalah' => $this->input->post('masalah'),
            'solusi' => $this->input->post('solusi'),
            'oleh' => $this->input->post('oleh'),
            'prakerin_siswa_id' => $this->session->userdata('prakerin_id'),
        );
        //print_r($data);exit;
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            return $this->edit($data['id']);
        }
        else
        {
            $this->permasalahan_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah data Permasalahan sudah selesai');
            redirect('permasalahan');
        }
    }

    public function delete($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('permasalahan');
        }
        else
        {
            $this->permasalahan_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus data permasalahan sudah selesai');
            $this->db->delete('permasalahan',array('id'=>$id));
            redirect('permasalahan');   
        }
    }
}