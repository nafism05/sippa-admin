<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Santri extends MY_Admin{
	public function __construct(){
        parent::__construct();
        $this->load->model('Santri_model', 'santri');

    }

    public function index(){
    	$this->dataq['title'] = "Data Santri";
    	// $this->dataq['breadcrumb'] = '<li><a href="#"><i class="fa fa-newspaper-o"></i> Home</a></li><li class="active">Berita</li>';
    	$this->dataq['headline'] = '<h1>Data Santri</h1>';
    	$this->dataq['include'] = "admin/santri/santri";
    	$this->dataq['active'] = "santri";
    	$this->dataq['header'] = "admin/users/users_header";
    	$this->dataq['footer'] = "admin/users/users_footer";

    	// $this->dataq['users'] = $this->ion_auth->users()->result();
    	$this->dataq['santri'] = $this->santri->getData()->result();

		$this->load->view($this->dataq['template'], $this->dataq);  
    	 
    }

    public function tambah(){
    	$this->dataq['title'] = "Tambah Santri";
    	$this->dataq['breadcrumb'] = '<li><a href="#"><i class="fa fa-users"></i> Home</a></li><li><a href="#"> Users</a></li><li class="active">Register</li>';
    	$this->dataq['headline'] = 'Tambah Santri';
    	$this->dataq['include'] = "admin/santri/tambah";
    	$this->dataq['active'] = "santri";
    	$this->dataq['header'] = "admin/users/register_header";
    	$this->dataq['footer'] = "admin/users/register_footer";
    	$this->dataq['validation_error'] = '';

    	// $this->dataq['groups'] = $this->ion_auth->groups()->result();

        // validate form input
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');

        if ($this->form_validation->run()){

                // $this->dataq['validation_error'] = $unggah['error'];
                // $this->load->view($this->dataq['template'], $this->dataq);

        	$nama = $this->input->post('nama');
        	$tmpt_lahir = $this->input->post('tmpt_lahir');
        	$tgl_lahir = $this->input->post('tgl_lahir');
        	$alamat = $this->input->post('alamat');
        	$telepon = $this->input->post('telepon');

        	$data = array(
			        'nama' => $nama,
			        'tmpt_lahir' => $tmpt_lahir,
			        'tgl_lahir' => $tgl_lahir,
			        'alamat' => $alamat,
			        'telepon' => $telepon
			);

        	$this->santri->tambah($data);
        	redirect($this->dataq['index'], 'refresh');

        }else{

            $this->load->view($this->dataq['template'], $this->dataq);
        }
    }

    public function edit($id_santri){
    	$this->dataq['title'] = "Edit Santri";
    	$this->dataq['breadcrumb'] = '<li><a href="#"><i class="fa fa-users"></i> Home</a></li><li><a href="#"> Users</a></li><li class="active">Register</li>';
    	$this->dataq['headline'] = 'Edit Santri';
    	$this->dataq['include'] = "admin/santri/edit";
    	$this->dataq['active'] = "santri";
    	$this->dataq['header'] = "admin/users/register_header";
    	$this->dataq['footer'] = "admin/users/register_footer";
    	$this->dataq['validation_error'] = '';

    	$this->dataq['santri'] = $this->santri->get_data_edit($id_santri);
    	$this->dataq['id_santri'] = $id_santri;

    	// validate form input
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');

        if ($this->form_validation->run()){

        	$nama = $this->input->post('nama');
        	$tmpt_lahir = $this->input->post('tmpt_lahir');
        	$tgl_lahir = $this->input->post('tgl_lahir');
        	$alamat = $this->input->post('alamat');
        	$telepon = $this->input->post('telepon');

        	$data = array(
			        'nama' => $nama,
			        'tmpt_lahir' => $tmpt_lahir,
			        'tgl_lahir' => $tgl_lahir,
			        'alamat' => $alamat,
			        'telepon' => $telepon
			);

        	$this->santri->edit($id_santri, $data);
        	redirect($this->dataq['index'], 'refresh');

        }else{


            $this->load->view($this->dataq['template'], $this->dataq);
        }
    }

    public function delete($id_santri){
    	$this->santri->delete($id_santri);
        redirect($this->dataq['index'], 'refresh');
    }
}