<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('kelas_model');
  	}

	public function index()
	{
		$data['main']='kelas/index';
		$data['menu']=1;
		$data['judul']='Data Kelas';
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/datatables.min','jquery.dataTables','dataTables.tableTools','dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

    

    public function add()
    {
        $data['main']='kelas/create';
		$data['menu']=1;
		$data['judul']='Tambah Kelas';
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

        $data['main']='kelas/edit';
		$data['menu']=1;
		$data['judul']='Edit Kelas';
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