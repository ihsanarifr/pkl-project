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
<<<<<<< HEAD

        $data['golongan_darah'] = $this->golongan_darah_model->viewall()->result();


=======
        $data['gol_darah'] = $this->golongan_darah_model->viewall()->result();
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

<<<<<<< HEAD
=======
    public function view($id)
    {
        if(empty($id))
        {
            redirect('/');
        }

        $data['main']='golongan_darah/view';
        $data['menu']=1;
        $data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
        $data['judul']='Lihat Unit PKL';
        $this->load->view('layouts/master',$data);
    }

>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
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

<<<<<<< HEAD

        $data = array(
            'name' => $this->input->post('nama'),
=======
        $data = array(
            'nama' => $this->input->post('nama'),
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='golongan_darah/create';
            $data['menu']=1;
<<<<<<< HEAD
            $data['judul']='Tambah Golongan Darah';
=======
            $data['judul']='Tambah Program Keahlian';
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            $this->golongan_darah_model->save($data);
            $this->session->set_flashdata('status','success');
<<<<<<< HEAD
            $this->session->set_flashdata('message', 'Simpan golongan darah sudah selesai');
=======
            $this->session->set_flashdata('message', 'Simpan Golongan Darah sudah selesai');
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
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

<<<<<<< HEAD
        $data['grup_user'] = $this->golongan_darah_model->select_by_id($id)->row();
=======
        $data['gol_darah'] = $this->golongan_darah_model->select_by_id($id)->row();
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
		$this->load->view('layouts/master',$data);

    }

    public function update()
    {
<<<<<<< HEAD
        $this->form_validation->set_rules('nama', 'Golongan Darah', 'required');

        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('nama'),
=======
         $this->form_validation->set_rules('nama', 'Golongan Darah', 'required');

        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
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
<<<<<<< HEAD
            $this->session->set_flashdata('message', 'Ubah golongan darah sudah selesai');
=======
            $this->session->set_flashdata('message', 'Ubah data Golongan Darah sudah selesai');
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
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
<<<<<<< HEAD
            $this->session->set_flashdata('message', 'Hapus golongan darah sudah selesai');
            redirect('golongan_darah');
=======
            $this->session->set_flashdata('message', 'Hapus data Golongan Darah sudah selesai');
            redirect('golongan_darah');   
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
        }
    }
}