<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $dataq = array(
			'title' => 'Dashboard',
			'breadcrumb' => '<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Dashboard</li>',
			'headline' => 'Dashboard <small>Control panel</small>',
			'include' => 'admin/dashboard/dashboard',
			'template' => 'admin/admin_template2',
			'header' => 'admin/dashboard/dashboard_header',
			'footer' => 'admin/dashboard/dashboard_footer',
			'login_controller' => 'login',
			'login_page' => 'login',
			'logout_controller' => 'login/logout',
			'logout_page' => 'admin/logout',
			'index' => 'santri',
			'register' => 'admin/users/register',
			'edit' => 'admin/users/edit/',
			'delete' => 'admin/users/delete/',
			'users_p' => 'users', //halaman users
			'active' => 'galleries', //menu yang memiliki class active ketika dikunjungi
			'avatar' => 'assets/uploads/users/avatar/', //directory avatar
            'profil_page' => 'admin/profil/',//halaman profil
            'edit_profil' => 'admin/profil/edit/',//halaman profil

			'berita' => 'admin/berita',
			'tulis_berita' => 'admin/berita/tulis',
			'edit_berita' => 'admin/berita/edit/',
			'delete_berita' => 'admin/berita/delete/'

		);


	public function __construct(){
        parent::__construct();
        //$this->load->library('ion_auth');
        $this->load->library('upload');
		$this->load->library('image_lib');        
    }

    public function doUpload($upload_path, $nama_field, $nama_baru){

		$config['upload_path'] = $upload_path;
		// $config['upload_path'] = './assets/uploads/post/thumbnail/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = FALSE;
        // $config['remove_spaces'] = TRUE;
        $config['file_name'] = $nama_baru;

        $this->upload->initialize($config);

        if(!$this->upload->do_upload($nama_field)){
        //upload file gagal
            $unggah['error'] = $this->upload->display_errors();
            $unggah['status'] = false;
        }else{
        //upload file berhasil kemudian dilanjutkan reseize
        	$source = $this->upload->upload_path.$this->upload->file_name;
            $nama_gambar = $this->upload->file_name;;

            $unggah['status'] = true;
            $unggah['error'] = '';
            $unggah['source'] = $source;
            $unggah['nama_gambar'] = $nama_gambar;
        }

        return $unggah;

    }

    public function reseize($path, $source, $width, $height, $nama_ori){
    	//$path = directory tujuan untuk reseize
    	//$source = sumber gambar yang akan di reseize
        $config['image_library'] = 'gd2';
        $config['source_image'] = $source;
        $config['new_image'] = $path.$width.'_'.$nama_ori;
        $config['overwrite'] = TRUE;
        $config['create_thumb'] = false;
        $config['width'] = $width;
        if($height>0){
        	$config['maintain_ratio'] = false;
        	$config['height'] = $height;
        }else{
        	$config['maintain_ratio'] = true;
        }

        $this->image_lib->initialize($config);

        $this->image_lib->resize();
        $this->image_lib->clear();
    }

    public function hapusAvatar($namaFile){
    	unlink('assets/uploads/avatar/'.$namaFile);
		unlink('assets/uploads/avatar/100_'.$namaFile);
		unlink('assets/uploads/avatar/250_'.$namaFile);
		unlink('assets/uploads/avatar/500_'.$namaFile);
    }

    public function hapusThumbnail($delete_path, $namaFile, $width){
    	// contoh struktur delete_path : 'assets/uploads/avatar/'
		unlink($delete_path.$width.'_'.$namaFile);
    }
}



class MY_Admin extends MY_Controller{
    public function __construct(){
        parent::__construct();
        if (!$this->ion_auth->logged_in()){
            // redirect them to the login page
            redirect($this->dataq['login_controller'], 'refresh');
        }

        if ($this->ion_auth->logged_in()){
            $this->dataq['user_info'] = $this->ion_auth->user()->row();

            $user = $this->ion_auth->user()->row();
            $user->group = $this->ion_auth->get_users_groups()->row();
            $this->session->set_userdata('user', $user);
        }

        
    }

    public function _view_grocery($output = null){
        $this->load->view($output['template'],(array)$output);
    }

}

class MY_Home extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->dataq['template'] = "homepage/homepage_template";
        $this->dataq['post_page'] = "post/";
        $this->dataq['kategori_page'] = "kategori/";
        $this->dataq['indeks_berita_page'] = "berita/indeks";
    }

}