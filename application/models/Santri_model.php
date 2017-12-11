<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Santri_model extends CI_Model {

        public function __construct(){
            parent::__construct();
        }

        public function getData(){
            $this->db->select('*');
            $this->db->from('santri');
            $query = $this->db->get();
            return $query;
        }

        public function get_data_edit($id){
            $this->db->select('*');
            $this->db->from('santri');
            $this->db->where('id', $id);
            $query = $this->db->get();
            return $query->row();
        }

        public function getUserByEmail($email){
            $q = $this->db->get_where('ionauth_users', array('email' => $email), 1);  
            if($this->db->affected_rows() > 0){
                $row = $q->row();
                return $row;
            }else{
                error_log('no user found getUserInfo('.$email.')');
                return false;
            }
        }

        public function tambah($data){
            $this->db->insert('santri', $data);
        }

        public function edit($id, $data){
            $this->db->where('id', $id);
            $this->db->update('santri', $data);
        }

        public function delete($id){
            $this->db->where('id', $id);
            $this->db->delete('santri');

        }
}

//SELECT k.id as konten_id, k.judul, c.id as kategori_id, c.name FROM konten k INNER JOIN konten_categories kc ON k.id = kc.konten_id INNER JOIN categories c ON kc.category_id = c.id WHERE k.id = 5
