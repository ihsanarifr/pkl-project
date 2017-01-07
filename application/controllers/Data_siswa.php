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
        $this->load->model('sekolah_model');
        $this->load->model('golongan_darah_model');
      
      
  	}

	public function index()
	{
		$data['main']='data_siswa/index';
		$data['menu']=1;
		$data['judul']='Data Siswa PKL';
         $data['siswa'] = $this->siswa_model->viewall()->result();
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
        $data['main']='data_siswa/create';
		$data['menu']=1;
        $data['program_keahlian'] = $this->program_keahlian_model->viewall()->result();
        $data['nama_sekolah'] = $this->sekolah_model->viewall()->result();
        $data['gol_darah'] = $this->golongan_darah_model->viewall()->result();
        
		$data['judul']='Tambah Siswa PKL';
		$this->load->view('layouts/master',$data);
    }

     public function save()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nomor_induk', 'Nomor Induk', 'required');
        $this->form_validation->set_rules('gol_darah_id', 'Golongan Darah', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('ibu', 'Ibu', 'required');
        $this->form_validation->set_rules('kabkot', 'Kabupaten/Kota', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('sekolah_id', 'Nama Sekolah', 'required');
        $this->form_validation->set_rules('program_keahlian_id', 'Program keahlian', 'required');


        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor_induk' => $this->input->post('nomor_induk'),
            'gol_darah_id' => $this->input->post('gol_darah_id'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'ayah' => $this->input->post('ayah'),
            'ibu' => $this->input->post('ibu'),
            'kabkot' => $this->input->post('kabkot'),
            'alamat' => $this->input->post('alamat'),
            'sekolah_id' => $this->input->post('sekolah_id'),
            'program_keahlian_id' => $this->input->post('program_keahlian_id'),
            
            
        );
        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='data_siswa/create';
            $data['menu']=1;
            $data['judul']='Tambah siswa';
            $data['program_keahlian'] = $this->program_keahlian_model->viewall()->result();
            $data['nama_sekolah'] = $this->sekolah_model->viewall()->result();
            $data['gol_darah'] = $this->golongan_darah_model->viewall()->result();
         
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            $this->sekolah_model->save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Simpan data unit pengguna sudah selesai');
            redirect('siswa');
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
        $data['program_keahlian'] = $this->program_keahlian_model->viewall()->result();
        $data['nama_sekolah'] = $this->sekolah_model->viewall()->result();
        $data['gol_darah'] = $this->golongan_darah_model->viewall()->result();
		$data['judul']='Edit Siswa PKL';
		$this->load->view('layouts/master',$data);

    }

    public function update()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nomor_induk', 'Nomor Induk', 'required');
        $this->form_validation->set_rules('gol_darah_id', 'Golongan Darah', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('ibu', 'Ibu', 'required');
        $this->form_validation->set_rules('kabkot', 'Kabupaten/Kota', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('sekolah_id', 'Nama Sekolah', 'required');
        $this->form_validation->set_rules('program_keahlian_id', 'Program keahlian', 'required');

        $data = array(
             'nama' => $this->input->post('nama'),
            'nomor_induk' => $this->input->post('nomor_induk'),
            'gol_darah_id' => $this->input->post('gol_darah_id'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'ayah' => $this->input->post('ayah'),
            'ibu' => $this->input->post('ibu'),
            'kabkot' => $this->input->post('kabkot'),
            'alamat' => $this->input->post('alamat'),
            'sekolah_id' => $this->input->post('sekolah_id'),
            'program_keahlian_id' => $this->input->post('program_keahlian_id'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            return $this->edit($data['id']);
        }
        else
        {
            $this->siswa_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah data sekolah sudah selesai');
            redirect('siswa');
        }
    }

    public function delete($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('home');
        }
        else
        {
            $this->sekolah_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus data grup pengguna sudah selesai');
            redirect('siswa');   
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

    public function lihat()
    {
        $sql = "select u.*,s.*,ur.id id_dari_tabel_user,ug.user_id,ug.group_id from users u join users_groups ug on u.id=ug.user_id join user ur on ur.id=u.id join siswa s on s.id=u.id where ug.group_id=2";
        $query = $this->db->query($sql);
        echo "<pre>";
        print_r($query->result());
    }
    

    public function insert()
    {
        $data = array(
            'unit_id'=>5,
            'kelas_id'=>18,
            'tanggal_mulai'=>'2017-01-01',
            'tanggal_selesai'=>'2017-02-01',
            'jabatan_pembimbing'=>'kepala direktorat',
            'siswa_id'=>2
        );
      
        $data3 = array(
           'unit_id'=>5,
            'kelas_id'=>18,
            'tanggal_mulai'=>'2016-01-01',
            'tanggal_selesai'=>'2016-02-01',
            'jabatan_pembimbing'=>'kepala direktorat',
            'siswa_id'=>2
        );
        

        $this->db->insert('prakerin_siswa',$data);
        $this->db->insert('prakerin_siswa',$data3);
        echo "success";
    }

    
}