<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_keahlian extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('program_keahlian_model');
  	}

	public function index()
	{
		$data['main']='program_keahlian/index';
		$data['menu']=1;
		$data['judul']='Data Program Keahlian';
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/datatables.min','jquery.dataTables','dataTables.tableTools','dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

    

    public function add()
    {
        $data['main']='program_keahlian/create';
		$data['menu']=1;
		$data['judul']='Tambah Program Keahlian';
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

        $data['main']='program_keahlian/edit';
		$data['menu']=1;
		$data['judul']='Edit Program Keahlian';
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