<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_kehadiran extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('status_kehadiran_model');
  	}

	public function index()
	{
		$data['main']='status_kehadiran/index';
		$data['menu']=1;
		$data['judul']='Data Status Kehadiran';
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/datatables.min','jquery.dataTables','dataTables.tableTools','dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

    

    public function add()
    {
        $data['main']='status_kehadiran/create';
		$data['menu']=1;
		$data['judul']='Tambah Unit PKL';
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

        $data['main']='status_kehadiran/edit';
		$data['menu']=1;
		$data['judul']='Edit Status Kehadiran PKL';
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