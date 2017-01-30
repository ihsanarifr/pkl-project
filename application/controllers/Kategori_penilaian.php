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
    {
        if(empty($id))
        {
            redirect('/');
        }

        $data['main']='kategori_penilaian/view';
        $data['menu']=1;
        $data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
        $data['judul']='Lihat kategori penilaian';
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
 $this->form_validation->set_rules('nama', 'Nama Kategori Penilaian', 'required');

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
            $this->session->set_flashdata('message', 'Simpan Data Kategori Penilaian Sudah Selesai');
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
        $data['menu']=1;
        $data['judul']='Edit Kategori Penilaian';

        $data['kategori_penilaian'] = $this->kategori_penilaian_model->select_by_id($id)->row();
        $this->load->view('layouts/master',$data);
    }

    public function update()
    {
 $this->form_validation->set_rules('nama', 'Nama Kategori Penilaian', 'required');

        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
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
            redirect('kategori_penilaian');
        }
    }

    public function delete($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('kategori_penilaian');
        }
        else
        {
            $this->kategori_penilaian_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus status kehadiran sudah selesai');
            redirect('kategori_penilaian');   
        }
    }
}