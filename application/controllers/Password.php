<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Password extends MY_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->model('UsersModel', 'user');

    }

    public function index(){
    	echo phpinfo();
    }

    public function reset(){
    	if ($this->ion_auth->logged_in()){
			redirect('admin/dashboard', 'refresh');
		}else{

			//validate form input
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

			if ($this->form_validation->run()){
				$email = $this->input->post('email');  
                $clean = $this->security->xss_clean($email);
                $userInfo = $this->user->getUserByEmail($clean);
                
                if(!$userInfo){
                    $this->session->set_flashdata('message', 'We cant find your email address');
                    redirect('admin/password/reset', 'refresh');
                }

                $url = base64_encode($userInfo->email);

                echo $url; //send this through mail
                $this->sendMail();
			}else{
    			$this->load->view('admin/password_reset/input_email');
			}
		}

    	
    }

    public function sendMail(){
	  /*  $config = Array(
	);*/
	  $config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;

	        $message = 'testing bos';
	        $this->load->library('email', $config);
	      //$this->email->set_newline("\r\n");
	      $this->email->from('nafism05@gmail.com'); // change it to yours
	      $this->email->to('nafism05@gmail.com');// change it to yours
	      $this->email->subject('Resume from JobsBuddy for your Job posting');
	      $this->email->message($message);

	      if($this->email->send()){
	      echo 'Email sent.';
	     }
	     else
	    {
	     show_error($this->email->print_debugger());
	    }

	}
}