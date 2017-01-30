<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $user;
	function __construct(){
    	parent::__construct();
		$this->load->model('prakerin_siswa_model');

		// check was logged in
		if($this->ion_auth->logged_in())
		{
			// check is administrator
			if(!$this->ion_auth->is_admin())
			{
				$this->user = $this->ion_auth->user()->row();
				
				// check if prakerin id not same because date prakerin was changed
				// change session prakerin_id
				$prakerin_id = $this->prakerin_siswa_model->check_prakerin_today($this->user->id);
				if($this->session->userdata('prakerin_id') != $prakerin_id)
				{
					$this->session->set_userdata('prakerin_id',$prakerin_id);
				}
			}
		}
  	}

	public function index()
	{
		$data['main']='home/index';
		$data['menu']=0;
		$data['judul']='Home PKL Project';

		if($this->ion_auth->logged_in())
		{
			if($this->ion_auth->get_users_groups()->row()->id == 2)
			{
				$data['prakerin'] = $this->prakerin_siswa_model->check_prakerin_by_user($this->user->id);
			}
		}				
		
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
	}

	public function check()
	{
		echo $this->prakerin_siswa_model->check_prakerin_today($this->user->id);
	}
}