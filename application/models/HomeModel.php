<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HomeModel extends CI_Model{
	public function __construct(){
        parent::__construct();

    }

    public function getKontensGrid(){
    	$this->db->select('k.*, c.name as kategori');
    	$this->db->from('konten k');
    	$this->db->join('konten_categories kc', 'k.id = kc.konten_id');
        $this->db->join('categories c', 'c.id = kc.category_id');
    	$this->db->order_by('modified', 'DESC');
    	$this->db->limit(5);
        $query = $this->db->get();
        return $query->result();

        // SELECT * FROM konten ORDER BY modified DESC LIMIT 5
    }

    public function getKontens(){
        $this->db->select('k.*, c.name as kategori');
        $this->db->from('konten k');
        $this->db->join('konten_categories kc', 'k.id = kc.konten_id');
        $this->db->join('categories c', 'c.id = kc.category_id');
        $this->db->order_by('modified', 'DESC');
        $query = $this->db->get();
        return $query->result();

        // SELECT * FROM konten ORDER BY modified DESC
    }

    public function getKontensByKategori($kategori, $limit=null, $offset=0){
        $this->db->select('k.*, c.name as kategori, c.id as cat_id');
        $this->db->from('konten k');
        $this->db->join('konten_categories kc', 'k.id = kc.konten_id');
        $this->db->join('categories c', 'c.id = kc.category_id');
        $this->db->where('c.slug', $kategori);
        $this->db->order_by('modified', 'DESC');
        if($limit!=null){
            $this->db->limit($limit, $offset);
        }
        
        $query = $this->db->get();
        if($limit==1){
            return $query->row();
        }else{
            return $query->result();
        }
    }

    public function getKontensByDate($date, $kategori=null){
        $this->db->select('k.*, c.name as kategori, c.id as cat_id');
        $this->db->from('konten k');
        $this->db->join('konten_categories kc', 'k.id = kc.konten_id');
        $this->db->join('categories c', 'c.id = kc.category_id');
        $this->db->where('k.published_at', $date);
        if($kategori!=null){
            $this->db->where('c.name', $kategori);
        }
        $this->db->order_by('published_at', 'DESC');
        
        $query = $this->db->get();
        return $query->result();
    }

    public function getKonten($slug){
        $this->db->select('k.*, c.name as kategori, c.id as cat_id');
        $this->db->from('konten k');
        $this->db->join('konten_categories kc', 'k.id = kc.konten_id');
        $this->db->join('categories c', 'c.id = kc.category_id');
        $this->db->where('k.slug', $slug);
        $query = $this->db->get();
        return $query->row();

    }

    public function getKontenKategori($konten_id){
        $this->db->select('c.id as cat_id, c.name as cat_name');
        $this->db->from('konten k');
        $this->db->join('konten_categories kc', 'k.id = kc.konten_id');
        $this->db->join('categories c', 'c.id = kc.category_id');
        $this->db->where('k.id', $konten_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getCategories(){
        $query = $this->db->get('categories');
        return $query->result();
    }

    
}