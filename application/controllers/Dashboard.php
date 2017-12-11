<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Admin{

	public function __construct(){
        parent::__construct();


    }

    public function index(){

		$this->load->view($this->dataq['template'], $this->dataq);    
    }
}