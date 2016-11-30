<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grup_user extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('grup_user_model');
  	}

	public function index()
	{
		$data['main']='grup_user/index';
		$data['menu']=1;
		$data['judul']='Data Siswa PKL';
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/datatables.min','jquery.dataTables','dataTables.tableTools','dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

    public function view($id)
    {
        if(empty($id))
        {
            redirect('/');
        }

        $data['main']='data_siswa/view';
		$data['menu']=1;
        $data['css']=array('css/datatables.min');
        $data['js']= array('js/datatables.min','jquery.dataTables','dataTables.tableTools','dataTables.bootstrap');
		$data['judul']='Lihat Siswa PKL';
		$this->load->view('layouts/master',$data);
    }

    public function add()
    {
        $data['main']='data_siswa/create';
		$data['menu']=1;
		$data['judul']='Tambah Siswa PKL';
		$this->load->view('layouts/master',$data);
    }

    public function edit($id)
    {
        if(empty($id))
        {
            redirect('home');
        }

        $data['main']='data_siswa/edit';
		$data['menu']=1;
		$data['judul']='Edit Siswa PKL';
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