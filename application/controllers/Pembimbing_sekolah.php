<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembimbing_sekolah extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('pembimbing_sekolah_model');
         $this->load->model('siswa_model');
        $this->load->model('sekolah_model');
  	}

	public function index()
	{
		$data['main']='pembimbing_sekolah/index';
		$data['menu']=2;
		$data['judul']='Data Pembimbing Sekolah';
		$data['css']=array('css/datatables.min');
        $data['pembimbing_sekolah'] = $this->pembimbing_sekolah_model->viewall();
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

     public function view($id)
    {
        if(empty($id))
        {
            redirect('/');
        }

        $data['main']='pembimbing_sekolah/view';
        $data['menu']=1;
        $data['css']=array('css/datatables.min');
        $data['pembimbing_sekolah']= $this->pembimbing_sekolah_model->select_by_id($id);
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
        $data['judul']='Lihat Siswa PKL';
        $this->load->view('layouts/master',$data);
    }

    public function add()
    {
        $data['main']='pembimbing_sekolah/create';
		$data['menu']=1;
         $data['nama_sekolah'] = $this->sekolah_model->viewall()->result();
		$data['judul']='Tambah Pembimbing Sekolah';
		$this->load->view('layouts/master',$data);
    }

    public function save()
    {
       $this->form_validation->set_rules('nama', 'Nama Pembimbing Sekolah', 'required');
       $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required');
       $this->form_validation->set_rules('nama_sekolah_id', 'Nama Sekolah', 'required');

        $data = array(
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'nama_sekolah_id' => $this->input->post('nama_sekolah_id'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='pembimbing_sekolah/create';
            $data['menu']=1;
            $data['judul']='Tambah Pembimbing Sekolah';
            $data['nama_sekolah'] = $this->sekolah_model->viewall()->result();

            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('username');
            $additional_data = array(
                'first_name' => $this->input->post('nama'),
            );
            $group = array('3'); // Sets user to admin.

            if ($this->ion_auth->register($username, $password, $email, $additional_data, $group))
            {

                $data = array(
                   'id' => $this->siswa_model->last_user_id(),
                   'nama' => $this->input->post('nama'),
                   'no_hp' => $this->input->post('no_hp'),
                   'nama_sekolah_id' => $this->input->post('nama_sekolah_id'), 
                );

                $data_user = array(
                    'id' => $this->siswa_model->last_user_id(),
                   'username' =>$this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'jenis_user_id'=> 3,
                );

                $this->pembimbing_sekolah_model->save_user($data_user);
                $this->pembimbing_sekolah_model->save($data);
                $this->session->set_flashdata('status','success');
                $this->session->set_flashdata('message', 'Simpan data pembimibing sudah selesai');
                redirect('pembimbing_sekolah');
            }

            else
            {
                
                $this->session->set_flashdata('status','success');
                $this->session->set_flashdata('message', 'Simpan data Pembimbing Sekolah sudah selesai');
                redirect('pembimbing_sekolah');
            }
        }
    }

    public function edit($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('pembimbing_sekolah');
        }

        $data['main']='pembimbing_sekolah/edit';
		$data['menu']=1;
		$data['judul']='Edit Pembimbing Sekolah';

        $data['pembimbing_sekolah'] = $this->pembimbing_sekolah_model->select_by_id($id)->row();
        $data['nama_sekolah'] = $this->sekolah_model->viewall()->result();
		$this->load->view('layouts/master',$data);
        
    }

    public function update()
    {
        $this->form_validation->set_rules('nama', 'Nama Pembimbing Sekolah', 'required');
         $this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required');
        $this->form_validation->set_rules('nama_sekolah_id', 'Nama Sekolah', 'required');


        $data = array(
            'id'=> $this->input->post('id'),
             'nama' => $this->input->post('nama'),
             'no_hp' => $this->input->post('no_hp'),
             'nama_sekolah_id' => $this->input->post('nama_sekolah_id'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            return $this->edit($data['id']);

        }
        else
        {
            $this->pembimbing_sekolah_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah data Pembimbing Sekolah sudah selesai');
            redirect('pembimbing_sekolah');
        }
    }

    public function delete($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('pembimbing_sekolah');
        }
        else
        {
            $this->pembimbing_sekolah_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus data Pembimbing Sekolah sudah selesai');
            $this->db->delete('pembimbing_sekolah',array('id'=>$id));
            redirect('pembimbing_sekolah');   
        }
    }
}