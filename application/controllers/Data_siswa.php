<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa extends CI_Controller
{
    function __construct(){
    	parent::__construct();
    	if($this->ion_auth->logged_in() != true){
    		redirect('auth/login');
    	}

        $this->load->model('siswa_model');
        $this->load->model('program_keahlian_model');
  	}

	public function index()
	{
		$data['main']='data_siswa/index';
		$data['menu']=1;
		$data['judul']='Data Siswa PKL';
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
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
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$data['judul']='Lihat Siswa PKL';
		$this->load->view('layouts/master',$data);
    }

    public function add()
    {
        // ini buat manggil view 
        $data['main']='data_siswa/create';
		$data['menu']=1;
		$data['judul']='Tambah Siswa PKL';
        $data['program_keahlian'] = $this->program_keahlian_model->viewall()->result();
		$this->load->view('layouts/master',$data);
    }
    public function save($id){
        // ini untuk cek apakah ada textbox yang tdk diisi / tdk
         $this->form_validation->set_rules('nama', 'Nama', 'required');
         $this->form_validation->set_rules('nomor_induk', 'Nomor Induk', 'required');
         $this->form_validation->set_rules('gol_darah_id', 'Golongan Darah', 'required');
         $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
         $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
         $this->form_validation->set_rules('ayah', 'Nama Ayah', 'required');
         $this->form_validation->set_rules('ibu', 'Ibu', 'required');
         $this->form_validation->set_rules('kabkot', 'Nama Kabupaten Kota', 'required');
         $this->form_validation->set_rules('alamat', 'Alamat', 'required');
     

         // kalo data nya udah gaada yang error dari validasi di atas,lanjut datanya disimpen di $data dengan format array
        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor_induk' => $this->input->post('nomor_induk'),
            'gol_darah_id' => $this->input->post('gol_darah_id'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'ayah' => $this->input->post('ayah'),
            'ibu' => $this->input->post('ibu'),
            'kabkot' => $this->input->post('kabkot'),
            'alamat' => $this->input->post('alamat')

        );

        // kalo ada yang error (ada textbox yang ga diisi, disini form validation nya mulai bekerja)
        if ($this->form_validation->run() == FALSE){
            $data['main']='data_siswa/create';
            $data['menu']=1;
            $data['judul']='Tambah Siswa PKL';
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
            // kalo lolos, gaada yang error, lanjut ke simpen data nya ke db
        }else {
             // memanggil fungsi save di model siswa_model
            $this->siswa_model->save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Simpan data grup pengguna sudah selesai');
            redirect('data_siswa');
        }   
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

    public function kegiatan_siswa()
    {
        $data['main']='data_siswa/kegiatan_siswa';
		$data['menu']=1;
		$data['judul']='Data Kegiatan Siswa PKL';
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
    }

    public function detail_kegiatan($id)
    {
        $data['main']='data_siswa/detail_kegiatan';
		$data['menu']=1;
		$data['judul']='Data Detail Kegiatan Siswa PKL';
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);   
    }
}