<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsersModel extends CI_Model {

        public function __construct(){
            parent::__construct();
        }

        public function getUsers(){
            $this->db->select('u.*, g.description as group');
            $this->db->from('ionauth_users u');
            $this->db->join('ionauth_users_groups ug', 'u.id = ug.user_id');
            $this->db->join('ionauth_groups g', 'g.id = ug.group_id');
            $this->db->where('g.id!=', 1);
            $query = $this->db->get();
            return $query->result();
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
}

//SELECT k.id as konten_id, k.judul, c.id as kategori_id, c.name FROM konten k INNER JOIN konten_categories kc ON k.id = kc.konten_id INNER JOIN categories c ON kc.category_id = c.id WHERE k.id = 5
