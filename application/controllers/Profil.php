<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends MY_Admin{
	public function __construct(){
        parent::__construct();
        $this->load->model('UsersModel', 'users');

    }

    public function index($id=null){
       	$this->dataq['title'] = "Data Profil";
        $this->dataq['breadcrumb'] = '<li><a href="#"><i class="fa fa-newspaper-o"></i> Home</a></li><li class="active">Users</li>';
        $this->dataq['headline'] = '<h1>Data Tables <small>advanced tables</small>';
        $this->dataq['include'] = "admin/profil/profil";
        $this->dataq['active'] = "users";
        $this->dataq['header'] = "admin/users/users_header";
        $this->dataq['footer'] = "admin/users/users_footer";

        $this->dataq['user'] = $this->ion_auth->user($id)->row();
        
        $this->load->view($this->dataq['template'], $this->dataq);
    }

    public function edit($id=null){

    	$this->dataq['title'] = "Edit Profil";
    	$this->dataq['breadcrumb'] = '<li><a href="#"><i class="fa fa-users"></i> Home</a></li><li><a href="#"> Users</a></li><li class="active">Edit</li>';
    	$this->dataq['headline'] = 'Edit User';
    	$this->dataq['include'] = "admin/profil/edit";
    	$this->dataq['active'] = "users";
    	$this->dataq['header'] = "admin/users/register_header";
    	$this->dataq['footer'] = "admin/users/register_footer";

    	$this->dataq['user'] = $this->ion_auth->user($id)->row();

        // validate form input
        //$this->form_validation->set_rules('username', 'User Name', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if($this->input->post('password')!=null){
	        $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
	        $this->form_validation->set_rules('password_confirm', 'Password Confirm', 'required');
        }

        if ($this->form_validation->run()){

            //data user
            $data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'password' => $this->input->post('password'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone')
				);

        	$upload_path = './assets/uploads/users/avatar/';
        	$delete_path = 'assets/uploads/users/avatar/';
            $nama_field = 'foto_profil'; //name field pada form
            $nama_baru = 'avatar';

            $unggah = $this->doUpload($upload_path, $nama_field, $nama_baru);

            if($unggah['status']){
            	//hapus avatar yang lama
            	$nama_lama = $this->dataq['user']->avatar;
            	if($nama_lama!='default.png'){
	            	$this->hapusThumbnail($delete_path, $nama_lama, 100);
		            $this->hapusThumbnail($delete_path, $nama_lama, 300);
            	}

	            //reseize avatar yg baru di upload
            	$nama_gambar = $unggah['nama_gambar'];
            	$source = $unggah['source'];
            	$this->reseize($upload_path, $source, 100, 100, $nama_gambar);
                $this->reseize($upload_path, $source, 300, 300, $nama_gambar);

                $data['avatar'] = $nama_gambar;
            }

            $this->ion_auth->update($this->dataq['user']->id, $data);

	    	$this->session->set_flashdata('notifikasi', 'Profil berhasil di update.');

			redirect($this->dataq['profil_page'], 'refresh');
        }else{
        	
            $this->load->view($this->dataq['template'], $this->dataq);
        }
        
    }
}