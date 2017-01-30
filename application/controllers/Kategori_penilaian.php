<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_penilaian extends CI_Controller
{
    function __construct(){
        parent::__construct();
        if($this->ion_auth->logged_in() != true)
        {
            redirect('auth/login');
        }

        $this->load->model('kategori_penilaian_model');
<<<<<<< HEAD
    }

    public function index()
    {
        $data['main']='kategori_penilaian/index';
        $data['menu']=1;
        $data['judul']='Data Kategori Penilaian';
        $data['css']=array('css/datatables.min');

     $data['kategori_penilaian'] = $this->kategori_penilaian_model->viewall()->result();


        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
        $this->load->view('layouts/master',$data);
    }   

      public function view($id)
=======
  	}

	public function index()
	{
		$data['main']='kategori_penilaian/index';
		$data['menu']=1;
		$data['judul']='Data Kategori Penilaian';


        $data['kategori_penilaian'] = $this->kategori_penilaian_model->viewall()->result();

		$data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');

		$this->load->view('layouts/master',$data);
	}   

    public function view($id)
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
    {
        if(empty($id))
        {
            redirect('/');
        }

        $data['main']='kategori_penilaian/view';
        $data['menu']=1;
        $data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
<<<<<<< HEAD
        $data['judul']='Lihat kategori penilaian';
=======
        $data['judul']='Lihat Status Kehadiran PKL';
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
        $this->load->view('layouts/master',$data);
    }

    public function add()
    {

        $data['main']='kategori_penilaian/create';
        $data['menu']=1;
        $data['judul']='Tambah Kategori penilaian';
        $this->load->view('layouts/master',$data);
    }

    public function save()
    {
<<<<<<< HEAD
 $this->form_validation->set_rules('nama', 'Nama Kategori Penilaian', 'required');
=======
            $this->form_validation->set_rules('nama', 'Kategori Penilaian', 'required');
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179

        $data = array(
            'nama' => $this->input->post('nama'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='kategori_penilaian/create';
            $data['menu']=1;
            $data['judul']='Tambah Kategori Penilaian';
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            $this->kategori_penilaian_model->save($data);
            $this->session->set_flashdata('status','success');
<<<<<<< HEAD
            $this->session->set_flashdata('message', 'Simpan Data Kategori Penilaian Sudah Selesai');
=======
            $this->session->set_flashdata('message', 'Simpan data kategori penilaian sudah selesai');
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
            redirect('kategori_penilaian');
        }
    }

    public function edit($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('kategori_penilaian');
        }

        $data['main']='kategori_penilaian/edit';
<<<<<<< HEAD
        $data['menu']=1;
        $data['judul']='Edit Kategori Penilaian';
=======
		$data['menu']=1;
		$data['judul']='Edit Kategori Penilaian';

        $data['kategori_penilaian'] = $this->kategori_penilaian_model->select_by_id($id)->row();
$this->load->view('layouts/master',$data);
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179

        $data['kategori_penilaian'] = $this->kategori_penilaian_model->select_by_id($id)->row();
        $this->load->view('layouts/master',$data);
    }

    public function update()
    {
<<<<<<< HEAD
 $this->form_validation->set_rules('nama', 'Nama Kategori Penilaian', 'required');

        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
=======
        $this->form_validation->set_rules('nama', 'Nama', 'required');

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
            $this->kategori_penilaian_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah data kategori penilaian sudah selesai');
<<<<<<< HEAD
            redirect('kategori_penilaian');
=======
            redirect('Kategori_penilaian');
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
        }
    }

    public function delete($id)
    {
        if(empty($id))
        {
<<<<<<< HEAD
            $this->session->set_flashdata('status','danger');
=======
             $this->session->set_flashdata('status','danger');
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('kategori_penilaian');
        }
        else
        {
            $this->kategori_penilaian_model->delete($id);
            $this->session->set_flashdata('status','success');
<<<<<<< HEAD
            $this->session->set_flashdata('message', 'Hapus status kehadiran sudah selesai');
=======
            $this->session->set_flashdata('message', 'Hapus data kategori penilaian sudah selesai');
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
            redirect('kategori_penilaian');   
        }
    }
}