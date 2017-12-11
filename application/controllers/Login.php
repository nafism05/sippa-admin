<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public $login=array();

	public function __construct(){
        parent::__construct();
        $this->login['controller'] = 'login';
        $this->login['home'] = 'santri';
        $this->login['view'] = 'login/login';
    }

    public function index(){

    	if ($this->ion_auth->logged_in()){
			redirect($this->login['home'], 'refresh');
		}else{

			//validate form input
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run()){
				// check to see if the user is logging in
				// check for "remember me"
				$remember = (bool) $this->input->post('remember');

				if ($this->ion_auth->login($this->input->post('username'), $this->input->post('password'), $remember)){
					//if the login is successful
					//redirect them back to the home page
					$this->session->set_flashdata('message', $this->ion_auth->messages());

					redirect($this->login['home'], 'refresh');
				}else{
					// if the login was un-successful
					// redirect them back to the login page
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect($this->login['controller'], 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
				}
			}else{

				$this->load->view($this->login['view'], $this->login);
			}
		}
	}

	public function logout(){
		// log the user out
		$this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('login', 'refresh');
	}

	public function register(){
		if ($this->ion_auth->logged_in()){
			redirect($login['home'], 'refresh');
		}else{

			// validate form input
	        $this->form_validation->set_rules('firstname', 'First Name', 'required');
	        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
	        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]', array('is_unique' => 'Username sudah digunakan!'));
	        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	        $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[passwordconfirm]');
	        $this->form_validation->set_rules('passwordconfirm', 'Password Confirm', 'required');

			if ($this->form_validation->run()){
				//insert data user
	            $username    = $this->input->post('username');
	            $email    = strtolower($this->input->post('email'));
	            $password = $this->input->post('password');

	            $additional_data = array(
	                'first_name' => $this->input->post('firstname'),
	                'last_name'  => $this->input->post('lastname'),
	                'avatar'  => 'default.png'
	            );
	            $group = array('2');

	            if($this->ion_auth->register($username, $password, $email, $additional_data, $group)){
	            //insert data berhasil
		            $this->session->set_flashdata('message', 'Register sukses, silakan login.');

					redirect($login['controller'], 'refresh');
	            }else{
	            	$this->session->set_flashdata('message', 'Register gagal.');

					redirect($login['controller'], 'refresh');
	            }
			}else{

				$this->load->view('login/register', $login);
			}
		}
	}
}