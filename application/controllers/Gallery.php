<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MY_Admin{
	public function __construct(){
        parent::__construct();

    }

    public function index(){
    	$this->dataq['title'] = "Galleries";
    	// $this->dataq['breadcrumb'] = '<li><a href="#"><i class="fa fa-newspaper-o"></i> Home</a></li><li class="active">Berita</li>';
    	$this->dataq['headline'] = '<h1>Galleries</h1>';
    	$this->dataq['include'] = "admin/gallery";

    	$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');

		$crud->set_table('grocery_galleries');
		$crud->columns('title','description','thumbnail');
		// $crud->add_fields('customerName');
		$crud->display_as('title','Judul')
			 ->display_as('description','Deskripsi')
			 ->display_as('thumbnail','Gambar');

		$this->dataq['grocery'] = $crud->render();
		// $output->abc = 'test';

		$this->_view_grocery($this->dataq);
       // $this->load->view($this->dataq['template'], $this->dataq); 
    }
}