<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_penilaian extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
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
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
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

    }

    public function edit($id)
    {
        if(empty($id))
        {
            redirect('home');
        }

        $data['main']='kategori_penilaian/edit';
		$data['menu']=1;
		$data['judul']='Edit Kategori Penilaian';
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