<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	public function __construct(){
        parent::__construct();
        // redirect('admin/login', 'refresh');
    }

    public function index(){
       echo "hahaha";
    }
}