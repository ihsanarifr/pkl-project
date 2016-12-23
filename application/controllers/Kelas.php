    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    function __construct(){
        parent::__construct();
        if($this->ion_auth->logged_in() != true){
            redirect('auth/login');
        }

        $this->load->model('kelas_model');
    }

    public function index()
<<<<<<< HEAD
    {
        $data['main']='kelas/index';
        $data['menu']=1;
        $data['judul']='Data Kelas';
        $data['css']=array('css/datatables.min');
        $data['js']= array('js/datatables.min','jquery.dataTables','dataTables.tableTools','dataTables.bootstrap');
        $this->load->view('layouts/master',$data);
    }   

    
=======
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
>>>>>>> 3c56b0c45389af91ddcd2f2920255582ba8b12ba

    public function add()
    {
        $data['main']='kelas/create';
        $data['menu']=1;
        $data['judul']='Tambah Kelas';
        $this->load->view('layouts/master',$data);
    }

    public function save()
    {
<<<<<<< HEAD
=======
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
>>>>>>> 3c56b0c45389af91ddcd2f2920255582ba8b12ba

    }

    public function edit($id)
    {
        if(empty($id))
        {
            redirect('home');
        }

        $data['main']='kelas/edit';
        $data['menu']=1;
        $data['judul']='Edit Kelas';
        $this->load->view('layouts/master',$data);
    }

    public function update()
    {
<<<<<<< HEAD
=======
        $this->form_validation->set_rules('nama', 'Kelas', 'required');

        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
        );

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status','danger');
            $this->session->set_flashdata('message', validation_errors());
>>>>>>> 3c56b0c45389af91ddcd2f2920255582ba8b12ba

    }

    public function delete($id)
    {
        if(empty($id))
        {
            redirect('home');
        }
    }
}
