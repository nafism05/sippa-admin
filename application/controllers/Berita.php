<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Berita extends MY_Admin {

	public function __construct(){
        parent::__construct();
		$this->load->model('BeritaModel', 'news');

        		
		// $this->load->helper('captcha');

    }

    public function cacak(){
        $user = $this->ion_auth->user()->row();
        $user->group = $this->ion_auth->get_users_groups()->row();

        echo $user->group->id;
    }

    public function cacakdompdf(){
        
        $data['konten'] = $this->news->getKontens();

          $this->load->library('pdf');
          $this->pdf->load_view('admin/berita/laporan', $data);
          $this->pdf->render();
          $this->pdf->stream("laporan.pdf");
    }

    public function index(){
    	$this->dataq['title'] = "Data Berita";
    	$this->dataq['breadcrumb'] = '<li><a href="#"><i class="fa fa-newspaper-o"></i> Home</a></li><li class="active">Berita</li>';
    	$this->dataq['headline'] = '<h1>Data Tables <small>advanced tables</small>';
    	$this->dataq['include'] = "admin/berita/berita";
    	$this->dataq['active'] = "berita";
    	$this->dataq['header'] = "admin/users/users_header";
    	$this->dataq['footer'] = "admin/users/users_footer";

		$this->dataq['berita_result'] = $this->news->getKontens();

		$this->load->view($this->dataq['template'], $this->dataq);    
    }

    public function tulis(){
    	$this->dataq['title'] = "Tulis Berita";
    	$this->dataq['breadcrumb'] = '<li><a href="#"><i class="fa fa-newspaper-o"></i> Home</a></li><li><a href="#">Berita</a></li><li class="active">Tulis Berita</li>';
    	$this->dataq['headline'] = '<h1>Form Berita</h1>';
    	$this->dataq['include'] = "admin/berita/tulis_berita";
    	$this->dataq['active'] = "berita";
    	$this->dataq['header'] = "admin/berita/tulis_berita_header";
    	$this->dataq['footer'] = "admin/berita/tulis_berita_footer";
    	//categories :
    	$this->dataq['cat_result'] = $this->news->getCategories();
        $this->dataq['unggah_error'] = '';

        // validate form input
        $this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[konten.judul]');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $this->form_validation->set_rules('published_at', 'Tgl Publish', 'required');

        //validasi kategori
        if($this->input->post('kategori')!=null){
            $this->dataq['post_kategori'] = $this->input->post('kategori');
        }else{
            $this->dataq['post_kategori'] = '';
            $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        }


        if ($this->form_validation->run()){
            $upload_path = './assets/uploads/post/thumbnail/';
            $nama_field = 'thumbnail';
            $nama_baru = 'thumbnail';

            $unggah = $this->doUpload($upload_path, $nama_field, $nama_baru);

            if($unggah['status']){
                $source = $unggah['source'];
                $nama_gambar = $unggah['nama_gambar'];

                $this->reseize($upload_path, $source, 595, 397, $nama_gambar);
                $this->reseize($upload_path, $source, 200, 130, $nama_gambar);

                $data = array(
                    'judul' => $this->input->post('judul'),
                    'slug' => url_title($this->input->post('judul'),'-',true),
                    'isi' => $this->input->post('isi'),
                    'published_at' => $this->input->post('published_at'),
                    'kategori' => $this->input->post('kategori'),
                    'thumbnail' => $nama_gambar,
                    'created' => date("Y-m-d H:i:s"),
                    'modified' => date("Y-m-d H:i:s")
                );
            
                $this->news->insertKonten($data);

                $this->session->set_flashdata('notifikasi', 'Berita berhasil di buat.');
                redirect($this->dataq['berita'], 'refresh');
            }else{
                $this->dataq['unggah_error'] = $unggah['error'];
                $this->load->view($this->dataq['template'], $this->dataq);
            }

        }else{

            $this->load->view($this->dataq['template'], $this->dataq);
        }
		
    }


    public function edit($id){
    	
    	$this->dataq['title'] = "Edit Berita";
    	$this->dataq['breadcrumb'] = '<li><a href="#"><i class="fa fa-newspaper-o"></i> Home</a></li><li><a href="#">Berita</a></li><li class="active">Edit Berita</li>';
    	$this->dataq['headline'] = '<h1>Form Berita</h1>';
    	$this->dataq['include'] = "admin/berita/edit_berita";
    	$this->dataq['active'] = "berita";
    	$this->dataq['header'] = "admin/berita/tulis_berita_header";
    	$this->dataq['footer'] = "admin/berita/tulis_berita_footer";

        //categories :
        $this->dataq['cat_result'] = $this->news->getCategories();

		// validate form input
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $this->form_validation->set_rules('published_at', 'Tgl Publish', 'required');

        //validasi kategori
        $post_kategori = $this->input->post('kategori[]');
        if(isset($post_kategori)){
            $this->dataq['post_kategori'] = $post_kategori;
        }else{
            $this->dataq['post_kategori'] = array();
            $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        }

        // get data yg akan di edit
        $this->dataq['berita_result'] = $this->news->getKonten($id);

        $kategori = $this->news->getKontenKategori($id);
        $i = 0;
        foreach ($kategori as $row){
            $this->dataq['post_kategori'][$i] = $row->cat_id;
            $i++;
        }

        if ($this->form_validation->run()){
            $upload_path = './assets/uploads/post/thumbnail/';
            $delete_path = 'assets/uploads/post/thumbnail/';
            $nama_field = 'thumbnail';
            $nama_baru = 'thumbnail';
            $nama_lama = $this->dataq['berita_result']->thumbnail;
            $nama_gambar = null;

            $unggah = $this->doUpload($upload_path, $nama_field, $nama_baru);

            if($unggah['status']){


                $source = $unggah['source'];
                $nama_gambar = $unggah['nama_gambar'];

                $this->reseize($upload_path, $source, 595, 397, $nama_gambar);
                $this->hapusThumbnail($delete_path, $nama_lama, 595);

            }

            $data = array(
                'id' => $id,
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
                'published_at' => $this->input->post('published_at'),
                'kategori' => $this->input->post('kategori'),
                'thumbnail' => $nama_gambar
            );
        
            $this->news->editKonten($data);

            $this->session->set_flashdata('notifikasi', 'Berita berhasil di edit.');

            redirect($this->dataq['berita'], 'refresh');

        }else{

            $this->load->view($this->dataq['template'], $this->dataq);
        }
        
    }

    public function delete($id){
        $delete_path = 'assets/uploads/post/thumbnail/';
        $result = $this->news->getKonten($id);
        $thumbnail = $result->thumbnail;
        
        $this->news->deleteKonten($id);

        $this->hapusThumbnail($delete_path, $thumbnail);

        $this->session->set_flashdata('notifikasi', 'Berita berhasil di hapus.');

        redirect($this->dataq['berita'], 'refresh');
    }

    

}