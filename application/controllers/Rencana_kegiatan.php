<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rencana_kegiatan extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('rencana_kegiatan_model');
  	}

	public function index()
	{
		$data['main']='rencana_kegiatan/index';
		$data['menu']=0;
		$data['judul']='Data Rencana Kegiatan';
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}   

    

    public function add()
    {
        $data['main']='rencana_kegiatan/create';
		$data['menu']=1;
		$data['judul']='Tambah Rencana Kegiatan';
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

        $data['main']='rencana_kegiatan/edit';
		$data['menu']=1;
		$data['judul']='Edit Rencana Kegiatan';
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