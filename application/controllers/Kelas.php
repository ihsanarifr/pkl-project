    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grup_user extends CI_Controller
{
    function __construct(){
        parent::__construct();
        if($this->ion_auth->logged_in() != true){
            redirect('auth/login');
        }

        $this->load->model('kelas_model');
    }

    public function index()
	{
		$data['main']='kelas/index';
		$data['menu']=1;
		$data['judul']='Data Kelas';

        $data['kelas'] = $this->kelas_model->viewall()->result();

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
        $data['main']='kelas/view';
        $data['menu']=1;
        $data['css']=array('css/datatables.min');
        $data['js']= array('js/datatables.min');
        $data['judul']='Lihat Siswa PKL';
        $this->load->view('layouts/master',$data);
    }

    public function add()
    {

        $data['main']='kelas/create';
        $data['menu']=1;
        $data['judul']='Tambah Kelas';
        $this->load->view('layouts/master',$data);
    }

    public function save()
    {
        $this->form_validation->set_rules('nama', 'Kelas', 'required');
        $data = array(
            'nama' => $this->input->post('nama'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $data['main']='kelas/create';
            $data['menu']=1;
            $data['judul']='Tambah Kelas';
            
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('layouts/master',$data);
        }
        else
        {
            $this->kelas_model->save($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Simpan data kelas sudah selesai');
            redirect('kelas');
        }
    }

    public function edit($id)
    {
        if(empty($id))
        {
            redirect('home');
        }

        $data['main']='kelas/edit';
        $data['menu']=1;
        $data['judul']='Edit kelas';

        $data['kelas'] = $this->kelas_model->select_by_id($id)->row();
        $this->load->view('layouts/master',$data);
    }

    public function update()
    {
        $this->form_validation->set_rules('nama', 'Kelas', 'required');

        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());

            return $this->edit($data['id']);
        }
        else
        {
            $this->kelas_model->update($data);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Ubah data kelas sudah selesai');
            redirect('kelas');
        }
    }

    public function delete($id)
    {
        if(empty($id))
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', 'Anda Tidak bisa akses');
            redirect('kelas');
        }
        else
        {
            $this->kelas_model->delete($id);
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('message', 'Hapus data kelas sudah selesai');
            redirect('kelas');   
        }
    }
}