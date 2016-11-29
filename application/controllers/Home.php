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

	function add(){
		$this->akreditasilab->add($this->input->post('ruangid'),$this->input->post('nilai'),$this->input->post('predikatakreditasi'),$this->input->post('tmtakreditasi'),$this->input->post('tstakreditasi'),$this->input->post('lembagapengakreditasiid'),$this->input->post('lingkupakreditasiid'));
		$this->session->set_flashdata('message','Data berhasil ditambahkan');
  		redirect('akreditasilab');
	}

	function edit($id){
		$data['data']=$this->akreditasilab->getID($id);
		$data['lembagapengakreditasi']=$this->lembagapengakreditasi->get();
		$data['ruang']=$this->ruang->get();
		$data['lingkup']=$this->referensi->getLingkup();
		$data['css']=array('plugins/select2/select2','plugins/select2/select2-bootstrap','plugins/datepicker/datepicker3');
        $data['js']=array('plugins/select2/select2.min','plugins/datepicker/bootstrap-datepicker');
		$this->load->view('akreditasilab/edit',$data);
	}

	function update(){
		$this->akreditasilab->update($this->input->post('id'),$this->input->post('ruangid'),$this->input->post('nilai'),$this->input->post('predikatakreditasi'),$this->input->post('tmtakreditasi'),$this->input->post('tstakreditasi'),$this->input->post('lembagapengakreditasiid'),$this->input->post('lingkupakreditasiid'));
		$this->session->set_flashdata('message','Data berhasil diubah');
  		redirect('akreditasilab');
	}

	function delete($id){
		$this->akreditasilab->delete($id);
		$this->session->set_flashdata('warning','Data berhasil dihapus');
  		redirect('akreditasilab');
	}
}