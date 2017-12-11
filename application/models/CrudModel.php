<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CrudModel extends CI_Model {

        public function __construct(){
            parent::__construct();
        }

        public function getKontens(){
        	$query = $this->db->get('konten');
			return $query->result();
        }

        public function getKonten($konten_id){
        	$this->db->where('id', $konten_id);
        	$query = $this->db->get('konten');
			return $query->row();
        }

        public function insertKonten($data){
        	if($this->db->insert('konten', $data)){
        		return true;
        	}else{
        		return false;
        	}
        }

        public function editKonten($data){
        	if(isset($data['gambar'])){
        		$this->db->set('gambar', $data['gambar']);
        	}
        	$this->db->set('judul', $data['judul']);
        	$this->db->set('isi', $data['isi']);
			$this->db->where('id', $data['konten_id']);
			$this->db->update('konten');
        }

        public function deleteKonten($konten_id){
        	$this->db->where('konten_id', $konten_id);
			$this->db->delete('konten');

        }

        //getUser selain admin
        /*public function getUsers(){
            $this->db->select('*');
            $this->db->from('users');
            $this->db->join('users_groups', 'users_groups.group_id != 1');

            return $this->db->get();
        }*/
}