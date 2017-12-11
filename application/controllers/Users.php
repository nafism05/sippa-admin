<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Admin{
	public function __construct(){
        parent::__construct();
		$this->load->model('UsersModel', 'users');

    }

    public function index(){
        $this->dataq['title'] = "Data Users";
    	$this->dataq['breadcrumb'] = '<li><a href="#"><i class="fa fa-newspaper-o"></i> Home</a></li><li class="active">Users</li>';
    	$this->dataq['headline'] = '<h1>Data Tables <small>advanced tables</small>';
    	$this->dataq['include'] = "admin/users/test";
    	$this->dataq['active'] = "users";
    	$this->dataq['header'] = "admin/users/users_header";
    	$this->dataq['footer'] = "admin/users/users_footer";

    	// $this->dataq['users'] = $this->ion_auth->users()->result();
    	$this->dataq['users'] = $this->users->getUsers();

		$this->load->view($this->dataq['template'], $this->dataq);  

        // echo "hello"; 
    }

    // create a new user
	public function register(){

        $this->dataq['title'] = "Register Users";
    	$this->dataq['breadcrumb'] = '<li><a href="#"><i class="fa fa-users"></i> Home</a></li><li><a href="#"> Users</a></li><li class="active">Register</li>';
    	$this->dataq['headline'] = 'Register New User';
    	$this->dataq['include'] = "admin/users/register";
    	$this->dataq['active'] = "users";
    	$this->dataq['header'] = "admin/users/register_header";
    	$this->dataq['footer'] = "admin/users/register_footer";
    	$this->dataq['unggah_error'] = '';

    	$this->dataq['groups'] = $this->ion_auth->groups()->result();

        // validate form input
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]', array('is_unique' => 'Username sudah digunakan!'));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirm', 'required');

        if ($this->form_validation->run()){

        	$upload_path = './assets/uploads/users/avatar/';
        	$delete_path = 'assets/uploads/users/avatar/';
            $nama_field = 'foto_profil'; //name field pada form
            $nama_baru = 'avatar';

            $unggah = $this->doUpload($upload_path, $nama_field, $nama_baru);

            if($unggah['status']){
                $source = $unggah['source'];
                $nama_gambar = $unggah['nama_gambar'];
                
                $this->reseize($upload_path, $source, 100, 100, $nama_gambar);
                $this->reseize($upload_path, $source, 300, 300, $nama_gambar);

                //insert data user
	            $username    = $this->input->post('username');
	            $email    = strtolower($this->input->post('email'));
	            $password = $this->input->post('password');

	            $additional_data = array(
	                'first_name' => $this->input->post('first_name'),
	                'last_name'  => $this->input->post('last_name'),
	                'phone'      => $this->input->post('phone'),
	                'avatar'      => $nama_gambar
	            );
	            $group = array($this->input->post('leveluser'));
            
                if($this->ion_auth->register($username, $password, $email, $additional_data, $group)){
	            //insert data berhasil
		            $this->session->set_flashdata('notifikasi', 'User baru sukses dibuat.');

					redirect($this->dataq['users_p'], 'refresh');
	            }else{
	            //insert data gagal, kemudian hapus file yang berhasil diupload
	            	$this->hapusThumbnail($delete_path, $nama_gambar, 100);
	            	$this->hapusThumbnail($delete_path, $nama_gambar, 300);
	            	$this->session->set_flashdata('register_error', 'User baru gagal dibuat.');

					redirect($this->dataq['users_p'], 'refresh');
	            }
            }else{
                $this->dataq['unggah_error'] = $unggah['error'];
                $this->load->view($this->dataq['template'], $this->dataq);
            }

        }else{

            $this->load->view($this->dataq['template'], $this->dataq);
        }
    }

    public function edit($id){

    	$this->dataq['title'] = "Edit User";
    	$this->dataq['breadcrumb'] = '<li><a href="#"><i class="fa fa-users"></i> Home</a></li><li><a href="#"> Users</a></li><li class="active">Edit</li>';
    	$this->dataq['headline'] = 'Edit User';
    	$this->dataq['include'] = "admin/users/edit";
    	$this->dataq['active'] = "users";
    	$this->dataq['header'] = "admin/users/register_header";
    	$this->dataq['footer'] = "admin/users/register_footer";

    	$this->dataq['user'] = $this->ion_auth->user($id)->row();
    	$this->dataq['groups'] = $this->ion_auth->groups()->result();


        // validate form input
        $this->form_validation->set_rules('username', 'User Name', 'required');
        /*$this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirm', 'required');*/

        if ($this->form_validation->run()){

            //data user
            /*$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'password' => $this->input->post('password'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone')
				);*/
            $group = $this->input->post('leveluser');

        	/*$upload_path = './assets/uploads/users/avatar/';
        	$delete_path = 'assets/uploads/users/avatar/';
            $nama_field = 'foto_profil'; //name field pada form
            $nama_baru = 'avatar';

            $unggah = $this->doUpload($upload_path, $nama_field, $nama_baru);

            if($unggah['status']){
            	//hapus avatar yang lama
            	$nama_gambar = $$this->dataq['user']->avatar;
            	$this->hapusThumbnail($delete_path, $nama_gambar, 100);
	            $this->hapusThumbnail($delete_path, $nama_gambar, 300);

	            //reseize avatar yg baru di upload
            	$nama_gambar = $unggah['nama_gambar'];
            	$source = $unggah['source'];
            	$this->reseize($upload_path, $source, 100, 100, $nama_gambar);
                $this->reseize($upload_path, $source, 300, 300, $nama_gambar);

                $data['avatar'] = $nama_gambar;
            }

			
            $this->ion_auth->update($id, $data);*/

            // First we removed this user from all groups
			$this->ion_auth->remove_from_group(NULL, $id);
			// then add him to selected group
			$this->ion_auth->add_to_group($group , $id );

	    	$this->session->set_flashdata('notifikasi', 'Data user berhasil di update.');

			redirect($this->dataq['users_p'], 'refresh');

        }else{
        	
            $this->load->view($this->dataq['template'], $this->dataq);
        }
        
    }

    public function delete($id){
        
        $result = $this->ion_auth->user($id)->row();
        $avatar = $result->avatar;
        $delete_path = 'assets/uploads/users/avatar/';
        
        $this->ion_auth->delete_user($id);

        if($avatar!='default.png'){
            $this->hapusThumbnail($delete_path, $avatar, 100);
            $this->hapusThumbnail($delete_path, $avatar, 300);
        }

        $this->session->set_flashdata('notifikasi', 'User berhasil di hapus.');

        redirect($this->dataq['users_p'], 'refresh');
    
    }
}