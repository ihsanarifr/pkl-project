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
  	}

	public function index()
	{
		$data['main']='absensi/index';
		$data['menu']=1;
		$data['judul']='Data Absensi';
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

    

    public function add()
    {
        $data['main']='absensi/create';
		$data['menu']=1;
		$data['judul']='Tambah Absensi';
		$this->load->view('layouts/master',$data);
    }

    public function save()
    {

    }

    public function edit($id)
    {
        if(empty($id))
        {
            redirect('home');
        }

        $data['main']='absensi/edit';
		$data['menu']=1;
		$data['judul']='Edit Absensi';
		$this->load->view('layouts/master',$data);

    }

    public function update()
    {

    }

    public function delete($id)
    {
        if(empty($id))
        {
            redirect('home');
        }
    }
}