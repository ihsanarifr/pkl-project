<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_kegiatan extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('log_kegiatan_model');
  	}

	public function index()
	{
		$data['main']='log_kegiatan/index';
		$data['menu']=1;
		$data['judul']='Data Log Kegiatan';
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/datatables.min','jquery.dataTables','dataTables.tableTools','dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

    

    public function add()
    {
        $data['main']='log_kegiatan/create';
		$data['menu']=1;
		$data['judul']='Tambah Log Kegiatan';
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

        $data['main']='log_kegiatan/edit';
		$data['menu']=1;
		$data['judul']='Edit Log Kegiatan';
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