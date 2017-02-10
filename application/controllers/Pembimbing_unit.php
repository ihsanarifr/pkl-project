<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembimbing_unit extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('pembimbing_unit_model');
        $this->load->model('unit_model');
        $this->load->model('siswa_model');
  	}

	public function index()
	{
		$data['main']='pembimbing_unit/index';
		$data['menu']=2;
		$data['judul']='Data Pembimbing Unit';
		$data['css']=array('css/datatables.min');
        $data['pembimbing_unit'] = $this->pembimbing_unit_model->viewall();
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

    

    public function add()
    {
        $data['main']='pembimbing_unit/create';
		$data['menu']=1;
        $data['unit'] = $this->unit_model->viewall()->result();
        $data['pembimbing_unit'] = $this->pembimbing_unit_model->viewall();
		$data['judul']='Tambah Pembimbing Unit';
		$this->load->view('layouts/master',$data);
    }

    public function save()
    {
       $this->form_validation->set_rules('nama', 'Nama Pembimbing Unit', 'required');
       $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required');
       $this->form_validation->set_rules('nip', 'NIP', 'required');
       $this->form_validation->set_rules('unit_id', 'Unit', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='pembimbing_unit/create';
            $data['menu']=1;
            $data['judul']='Tambah Pembimbing Unit';
            $data['unit'] = $this->unit_model->viewall()->result();
            


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
            $group = array('4'); // Sets user to admin.

            if ($this->ion_auth->register($username, $password, $email, $additional_data, $group))
            {
                $messages = $this->ion_auth->messages();
                echo $messages;

                $data = array(
                    'id'=> $this->siswa_model->last_user_id(),
                     'nama' => $this->input->post('nama'),
                    'no_hp' => $this->input->post('no_hp'),
                    'nip' => $this->input->post('nip'),
                    'unit_id' => $this->input->post('unit_id'),
                );

                $data_user = array(
                    'id' => $this->siswa_model->last_user_id(),
                   'username' =>$this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'jenis_user_id'=> 7,
                );

                $this->pembimbing_unit_model->save_user($data_user);
                $this->pembimbing_unit_model->save($data);
                $this->session->set_flashdata('status','success');
                $this->session->set_flashdata('message', 'Simpan data siswa pengguna sudah selesai');
                redirect('pembimbing_unit');
            }
            else
            {
                $this->session->set_flashdata('status','danger');
                $this->session->set_flashdata('message',  $this->ion_auth->errors());
            }
            redirect('pembimbing_unit');
        }
    }

    public function edit($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('data_siswa');
        }

        $data['main']='pembimbing_unit/edit';
        $data['menu']=1;
        $data['unit'] = $this->unit_model->viewall()->result();
        $data['pembimbing_unit'] = $this->pembimbing_unit_model->select_by_id($id)->row();

        $data['judul']='Edit Siswa PKL';
        $this->load->view('layouts/master',$data);
    }
       
    public function update()
    {
       $this->form_validation->set_rules('nama', 'Nama Pembimbing Unit', 'required');
       $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required');
       $this->form_validation->set_rules('nip', 'NIP', 'required');
       $this->form_validation->set_rules('unit_id', 'Unit', 'required');

        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'nip' => $this->input->post('nip'),
            'unit_id' => $this->input->post('unit_id'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            return $this->edit($data['id']);
        }
        else
        {
            $this->pembimbing_unit_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah data Pembimbing Unit sudah selesai');
            redirect('pembimbing_unit');
        }
    }

    public function delete($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('pembimbing_unit');
        }
        else
        {
            $this->pembimbing_unit_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus data Pembimbing Unit sudah selesai');
            $this->db->delete('pembimbing_unit',array('id'=>$id));
            redirect('pembimbing_unit');   
        }
    }
}