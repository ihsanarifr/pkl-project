<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('absensi_model');
        $this->load->model('status_kehadiran_model');
  	}

	public function index()
	{
		$data['main']='absensi/index';
		$data['menu']=2;
		$data['judul']='Data Absensi';
        $data['absensi'] = $this->absensi_model->get_by_prakerin_id($this->session->userdata('prakerin_id'));
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

    

    public function add()
    {
        $data['main']='absensi/create';
		$data['menu']=2;
		$data['judul']='Tambah Absensi';
        $data['absensi'] = $this->absensi_model->viewall();
        $data['status_kehadiran'] = $this->status_kehadiran_model->viewall()->result();
		$this->load->view('layouts/master',$data);
    }

    public function save()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('datang', 'Jam Datang', 'required');
        $this->form_validation->set_rules('pulang', 'Jam Pulang', 'required');
        $this->form_validation->set_rules('status_kehadiran_id', 'Status Kehadiran', 'required');

        $data = array(
                    //'id'=> $this->siswa_model->last_user_id(),
                    'tanggal' => $this->input->post('tanggal'),
                    'datang' => $this->input->post('datang'),
                    'pulang' => $this->input->post('pulang'),
                    'status_kehadiran_id' => $this->input->post('status_kehadiran_id'),
                    'prakerin_siswa_id' => $this->session->userdata('prakerin_id'),

            );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='absensi/create';
            $data['menu']=2;
            $data['judul']='Tambah siswa';
            $data['status_kehadiran'] = $this->status_kehadiran_model->viewall()->result();

            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
         else
        {
            //print_r($data);exit;
            // memanggil fungsi di model grup_user_model
            $this->absensi_model->save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Simpan data absen pengguna sudah selesai');
            redirect('absensi');
        }
    
    }

    public function edit($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('absensi');
        }

        $data['main']='absensi/edit';
		$data['menu']=2;
		$data['judul']='Edit Absensi';
        $data['status_kehadiran'] = $this->status_kehadiran_model->viewall()->result();
        $data['absensi'] = $this->absensi_model->get_by_id($id);
		$this->load->view('layouts/master',$data);

    }

    public function update()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('datang', 'Jam Datang', 'required');
        $this->form_validation->set_rules('pulang', 'Jam Pulang', 'required');
        $this->form_validation->set_rules('status_kehadiran_id', 'Status Kehadiran', 'required');

        $data = array(
                    'id'=> $this->input->post('id'),
                    'tanggal' => $this->input->post('tanggal'),
                    'datang' => $this->input->post('datang'),
                    'pulang' => $this->input->post('pulang'),
                    'status_kehadiran_id' => $this->input->post('status_kehadiran_id'),
                    'prakerin_siswa_id' => $this->session->userdata('prakerin_id'),

            );

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());
            return $this->edit($data['id']);
        }
        else
        {
            $this->absensi_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah data absensi sudah selesai');
            redirect('absensi');
        }
    }

    public function delete($id)
    {
         if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('absensi');
        }
        else
        {        
            $this->absensi_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus data absensi siswa sudah selesai');
            $this->db->delete('status_kehadiran',array('id'=>$id));
            redirect('absensi');   
        }
    }
}