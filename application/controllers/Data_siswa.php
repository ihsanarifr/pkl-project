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
        $this->load->model('prakerin_siswa_model');
       
        $this->load->model('unit_model');
        $this->load->model('kelas_model');
        $this->load->model('Pembimbing_unit_model');
        $this->load->model('Pembimbing_sekolah_model');

        $this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
        $this->load->library('upload');
        //$this->load->model('grup_user_model');
  	}

	public function index()
	{
		$data['main']='data_siswa/index';
		$data['menu']=1;
		$data['judul']='Data Siswa PKL';
        $data['siswa'] = $this->siswa_model->viewall();
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
        $data['siswa']= $this->siswa_model->siswa_detail_by_id($id);
        $data['prakerin_siswa']= $this->prakerin_siswa_model->get_data_by_siswa($id);
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
        //$data['groups'] = $this->grup_user_model->viewall()->result();
        
		$data['judul']='Tambah Siswa PKL';
		$this->load->view('layouts/master',$data);
    }

     public function save()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nomor_induk', 'Nomor Induk', 'required');
        $this->form_validation->set_rules('gol_darah_id', 'Golongan Darah', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('ibu', 'Ibu', 'required');
        $this->form_validation->set_rules('kabkot', 'Kabupaten/Kota', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('sekolah_id', 'Nama Sekolah', 'required');
        $this->form_validation->set_rules('program_keahlian_id', 'Program keahlian', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='data_siswa/create';
            $data['menu']=1;
            $data['judul']='Tambah siswa';
            $data['program_keahlian'] = $this->program_keahlian_model->viewall()->result();
            $data['nama_sekolah'] = $this->sekolah_model->viewall()->result();
            $data['gol_darah'] = $this->golongan_darah_model->viewall()->result();
            //$data['groups'] = $this->grup_user_model->viewall()->result();
         
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('username');
            $additional_data = array(
                'first_name' => $this->input->post('nama'),
            );
            $group = array('2'); // Sets user to admin.

            if ($this->ion_auth->register($username, $password, $email, $additional_data, $group))
            {
                $messages = $this->ion_auth->messages();
                echo $messages;

                $data = array(
                    'id'=> $this->siswa_model->last_user_id(),
                    'nama' => $this->input->post('nama'),
                    'nomor_induk' => $this->input->post('nomor_induk'),
                    'gol_darah_id' => $this->input->post('gol_darah_id'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'ayah' => $this->input->post('ayah'),
                    'ibu' => $this->input->post('ibu'),
                    'kabkot' => $this->input->post('kabkot'),
                    'alamat' => $this->input->post('alamat'),
                    'nama_sekolah_id' => $this->input->post('sekolah_id'),
                    'program_keahlian_id' => $this->input->post('program_keahlian_id'),
                );

                $data_user = array(
                    'id' => $this->siswa_model->last_user_id(),
                   'username' =>$this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'jenis_user_id'=> 2,
                );

                $this->siswa_model->save_user($data_user);
                $this->siswa_model->save($data);
                $this->session->set_flashdata('status','success');
                $this->session->set_flashdata('message', 'Simpan data siswa pengguna sudah selesai');
            }
            else
            {
                $this->session->set_flashdata('status','danger');
                $this->session->set_flashdata('message',  $this->ion_auth->errors());
            }
            redirect('data_siswa');
        }
    }

    public function edit($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('data_siswa');
        }

        $data['main']='data_siswa/edit';
		$data['menu']=1;
        $data['program_keahlian'] = $this->program_keahlian_model->viewall()->result();
        $data['nama_sekolah'] = $this->sekolah_model->viewall()->result();
        $data['gol_darah'] = $this->golongan_darah_model->viewall()->result();
         $data['siswa'] = $this->siswa_model->select_by_id($id)->row();

		$data['judul']='Edit Siswa PKL';

        $data['data_siswa'] = $this->siswa_model->select_by_id($id)->row();
		$this->load->view('layouts/master',$data);
    }

    public function update()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nomor_induk', 'Nomor Induk', 'required');
        $this->form_validation->set_rules('gol_darah_id', 'Golongan Darah', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('ibu', 'Ibu', 'required');
        $this->form_validation->set_rules('kabkot', 'Kabupaten/Kota', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('sekolah_id', 'Nama Sekolah', 'required');
        $this->form_validation->set_rules('program_keahlian_id', 'Program keahlian', 'required');

        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'nomor_induk' => $this->input->post('nomor_induk'),
            'gol_darah_id' => $this->input->post('gol_darah_id'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'ayah' => $this->input->post('ayah'),
            'ibu' => $this->input->post('ibu'),
            'kabkot' => $this->input->post('kabkot'),
            'alamat' => $this->input->post('alamat'),
            'nama_sekolah_id' => $this->input->post('sekolah_id'),
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
            $this->session->set_flashdata('message', 'Ubah data siswa sudah selesai');
            redirect('data_siswa');
        }
    }

    public function delete($id)
    {      
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('data_siswa');
        }
        else
        {        
            $this->siswa_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus data siswa pengguna sudah selesai');
            $this->db->delete('siswa',array('id'=>$id));
            redirect('data_siswa');   
        }
    }

    public function kegiatan_siswa()
    {
        $data['main']='data_siswa/kegiatan_siswa';
		$data['menu']=1;
		$data['judul']='Data Kegiatan Siswa PKL';
        $data['siswa_sedang_berlangsung'] = $this->siswa_model->siswa_sedang_berlangsung();
        $data['siswa_selesai'] = $this->siswa_model->siswa_selesai();
		$data['css']=array('css/datatables.min');
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
		$this->load->view('layouts/master',$data);
    }

    public function kegiatan_siswa_view($id)
    {
        if(empty($id))
        {
            redirect('/');
        }

        $data['main']='data_siswa/kegiatan_siswa_view';
        $data['menu']=1;
        $data['css']=array('css/datatables.min');
        $data['siswa']= $this->siswa_model->siswa_detail_by_id($id);
        $data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
        $data['judul']='Lihat Siswa PKL';
        $this->load->view('layouts/master',$data);
    }
    public function kegiatan_siswa_add()
    {
        $data['main']='data_siswa/create_kegiatan_siswa';
        $data['menu']=1;
        $data['unit'] = $this->unit_model->viewall()->result();
        $data['kelas'] = $this->kelas_model->viewall()->result();
        $data['siswa'] = $this->siswa_model->viewall();
        $data['pembimbing_unit'] = $this->Pembimbing_unit_model->viewall();
        $data['pembimbing_sekolah'] = $this->Pembimbing_sekolah_model->viewall();
        //$data['groups'] = $this->grup_user_model->viewall()->result();
        
        $data['judul']='Tambah Siswa PKL';
        $this->load->view('layouts/master',$data);
    }

    public function kegiatan_siswa_edit($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('data_siswa/kegiatan_siswa');
        }

        $data['query'] = $this->siswa_model->get_data_by_id($id);  
        $data['unit'] = $this->unit_model->viewall()->result();
        $data['kelas'] = $this->kelas_model->viewall()->result();
        $data['siswa'] = $this->siswa_model->viewall();
        $data['pembimbing_unit'] = $this->Pembimbing_unit_model->viewall();
        $data['pembimbing_sekolah'] = $this->Pembimbing_sekolah_model->viewall();

        $data['main']='data_siswa/edit_kegiatan_siswa';
        $data['menu']=1;
        $data['judul']='Edit Siswa PKL';

        //print_r($data);exit;
        $this->load->view('layouts/master',$data);
    }

      public function kegiatan_siswa_save()
    {
        $this->form_validation->set_rules('siswa_id', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('unit_id', 'Unit', 'required');
        $this->form_validation->set_rules('pembimbing_unit_id', 'Pembimbing Unit', 'required');
        $this->form_validation->set_rules('pembimbing_sekolah_id', 'Pembimbing Sekolah', 'required');
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Keluar', 'required');
        $this->form_validation->set_rules('kelas_id', 'Kelas', 'required');
        $this->form_validation->set_rules('jabatan_pembimbing', 'Jabatan Pembimbing', 'required');
        $this->form_validation->set_rules('jabatan_pembimbing_sekolah', 'Jabatan Pembimbing Sekolah', 'required');
        
        $data = array(
                    //'id'=> $this->siswa_model->last_user_id(),
                    'siswa_id' => $this->input->post('siswa_id'),
                    'unit_id' => $this->input->post('unit_id'),
                    'pembimbing_unit_id' => $this->input->post('pembimbing_unit_id'),
                    'pembimbing_sekolah_id' => $this->input->post('pembimbing_sekolah_id'),
                    'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                    'tanggal_selesai' => $this->input->post('tanggal_selesai'),
                    'kelas_id' => $this->input->post('kelas_id'),
                    'jabatan_pembimbing' => $this->input->post('jabatan_pembimbing'),
                    'jabatan_pembimbing_sekolah' => $this->input->post('jabatan_pembimbing_sekolah'),
                );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='data_siswa/create_kegiatan_siswa';
            $data['menu']=1;
            $data['judul']='Tambah Siswa PKL';
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            // memanggil fungsi di model grup_user_model
            $this->siswa_model->kegiatan_siswa_save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Simpan data grup pengguna sudah selesai');
            redirect('data_siswa/kegiatan_siswa');
        }
    }
    public function kegiatan_siswa_update()
    {
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('siswa_id', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('unit_id', 'Unit', 'required');
        $this->form_validation->set_rules('pembimbing_unit_id', 'Pembimbing Unit', 'required');
        $this->form_validation->set_rules('pembimbing_sekolah_id', 'Pembimbing Sekolah', 'required');
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Keluar', 'required');
        $this->form_validation->set_rules('kelas_id', 'Kelas', 'required');
        $this->form_validation->set_rules('jabatan_pembimbing', 'Jabatan Pembimbing', 'required');
        $this->form_validation->set_rules('jabatan_pembimbing_sekolah', 'Jabatan Pembimbing Sekolah', 'required');
        $data = array(
                    'id' => $this->input->post('id'),
                    'siswa_id' => $this->input->post('siswa_id'),
                    'unit_id' => $this->input->post('unit_id'),
                    'pembimbing_unit_id' => $this->input->post('pembimbing_unit_id'),
                    'pembimbing_sekolah_id' => $this->input->post('pembimbing_sekolah_id'),
                    'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                    'tanggal_selesai' => $this->input->post('tanggal_selesai'),
                    'kelas_id' => $this->input->post('kelas_id'),
                    'jabatan_pembimbing' => $this->input->post('jabatan_pembimbing'),
                    'jabatan_pembimbing_sekolah' => $this->input->post('jabatan_pembimbing_sekolah'),
        );
        //print_r($data);exit;
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            return $this->edit($data['id']);
        }
        else
        {

            $this->siswa_model->kegiatan_siswa_update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah data sekolah sudah selesai');
            redirect('data_siswa/kegiatan_siswa');
        }
    }

    public function kegiatan_siswa_delete($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('home');
        }
        else
        {
            $this->siswa_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus data grup pengguna sudah selesai');
            $this->db->delete('prakerin_siswa',array('id'=>$id));
            redirect('data_siswa/kegiatan_siswa');   
        }
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

    public function change_password($id)
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}

        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('data_siswa');
        }

		$user = $this->ion_auth->user($id)->row();
		
        if ($this->form_validation->run() == false)
		{
			// display the form
			// set the flash data error message if there is one				
			$this->session->set_flashdata('status','danger');			
			$this->session->set_flashdata('message',(validation_errors()) ? validation_errors() : $this->session->flashdata('message'));

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id'   => 'old',
				'type' => 'password',
				'class' => 'form-control'
			);
			$this->data['new_password'] = array(
				'name'    => 'new',
				'id'      => 'new',
				'type'    => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				'class' => 'form-control'
			);
			$this->data['new_password_confirm'] = array(
				'name'    => 'new_confirm',
				'id'      => 'new_confirm',
				'type'    => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				'class' => 'form-control'
			);
			$this->data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'value' => $user->id,
				'class' => 'form-control'
			);

			// render
			// $this->_render_page('auth/change_password', $this->data);
            $this->data['user'] = $user->id;
			$this->data['main']='data_siswa/change_password';
            $this->data['menu']=1;
            $this->data['judul']='Data Siswa PKL';
            $this->data['css']=array('css/datatables.min');
            $this->data['js']= array('js/jquery.dataTables','js/dataTables.bootstrap');
            $this->load->view('layouts/master',$this->data);
		}
		else
		{
			$identity = $user->username;
			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('status','success');				
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('data_siswa');
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('status','danger');				
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('data_siswa/change_password/'.$id, 'refresh');
			}
		}
	}

    public function change_photo_profile($id)
    {

        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('data_siswa');
        }
        // print_r($this->siswa_model->select_by_id($id)->row());
        // die();
        $data['siswa'] = $this->siswa_model->select_by_id($id)->row();
        $data['main']='data_siswa/change_photo_profile';
        $data['menu']=1;
        $data['judul']='Data Siswa PKL';
        $data['css']=array('');
        $data['js']= array('');
        $this->load->view('layouts/master',$data);
    }

    public function upload_photo()
    {
        $user = $this->siswa_model->select_by_id($this->input->post('user_id'))->row();
        // print_r($this->input->post('file_upload'));
        // die();
        $config ['upload_path'] = "./assets/images/users/"; // lokasi folder yang akan digunakan untuk menyimpan file
        $config ['allowed_types'] = 'gif|jpg|png|JPEG'; // extension yang diperbolehkan untuk diupload
        $config ['file_name'] = "PHOTO" . $user->id;
        $config ['max_size'] = '5120';
        $config['max_width'] = '2288'; //lebar maksimum 1288 px
        $config['max_height'] = '1768'; //tinggi maksimu 768 px
        $this->upload->initialize($config); // meng set config yang sudah di atur

        if (!$this->upload->do_upload('file_upload')) 
        {
            $this->session->set_flashdata("status",'danger');
            $this->session->set_flashdata('message', $this->upload->display_errors());
            redirect('data_siswa/view/'.$user->id);
        } 
        else 
        {
            // cek dulu jika ada isinya maka foto akan dihapus dan diganti ke yang baru
            if ($user->foto != "") {
                $file_name = './assets/images/users/' . $user->foto . '';
                unlink($file_name) or die('failed deleting: ' . $file_name);
            }
            $data = array(
                'id'=>$user->id,
                'foto' => $this->upload->file_name
            );
            $this->siswa_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Berkas Foto Sudah diunggah');
            redirect('data_siswa/view/'.$user->id);
        }
    }

    public function lihat()
    {
        $sql = "select u.*,s.*,ur.id id_dari_tabel_user,ug.user_id,ug.group_id from users u join users_groups ug on u.id=ug.user_id join user ur on ur.id=u.id join siswa s on s.id=u.id where ug.group_id=2";
        $query = $this->db->query($sql);
        echo "<pre>";
        print_r($query->result());
    }

    public function cek(){
       print_r($this->Pembimbing_unit_model->viewall());
    }
}