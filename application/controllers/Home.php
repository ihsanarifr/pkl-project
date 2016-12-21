<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
    	parent::__construct();
    	// if($this->session->userdata('login')!= true){
    	// 	redirect('login');
    	// }
  	}

	public function index()
	{
		$data['main']='home/index';
		$data['menu']=0;
		$data['judul']='Home PKL Project';
		// $data['css']='';
        // $data['js']='';
		$this->load->view('layouts/master',$data);
	}
}