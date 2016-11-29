<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
  	{
    	parent::__construct();
    	// if($this->session->userdata('login')!= true){
    	// 	redirect('login');
    	// }
  	}

	public function index()
	{
		$data['main']='home/index';
		
		$data['judul']='Home PKL Project';
		$data['css']=array('plugins/select2/select2','plugins/select2/select2-bootstrap','plugins/datepicker/datepicker3');
        $data['js']=array('plugins/select2/select2.min','plugins/datepicker/bootstrap-datepicker');
		$this->load->view('layouts/master',$data);
	}
}