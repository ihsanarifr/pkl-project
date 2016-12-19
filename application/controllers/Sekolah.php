<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('sekolah_model');
  	}

	public function index()
	{
		$data['main']='sekolah/index';
		$data['menu']=1;
		$data['judul']='Data Sekolah';
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/datatables.min','jquery.dataTables','dataTables.tableTools','dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

    

    public function add()
    {
        $data['main']='sekolah/create';
		$data['menu']=1;
		$data['judul']='Tambah Sekolah';
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

        $data['main']='sekolah/edit';
		$data['menu']=1;
		$data['judul']='Edit Sekolah';
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