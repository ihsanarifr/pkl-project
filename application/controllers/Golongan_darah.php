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
		$data['menu']=1;
		$data['judul']='Data Golongan Darah';
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

    

    public function add()
    {
        $data['main']='golongan_darah/create';
		$data['menu']=1;
		$data['judul']='Tambah Golongan Darah';
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

        $data['main']='golongan_darah/edit';
		$data['menu']=1;
		$data['judul']='Edit Golongan Darah';
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