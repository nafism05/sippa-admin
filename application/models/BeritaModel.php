<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BeritaModel extends CI_Model {
// SELECT k.* FROM konten k INNER JOIN user_konten uk ON k.id = uk.konten_id INNER JOIN users u ON uk.user_id = u.id INNER JOIN users_groups ug ON ug.user_id = u.id WHERE ug.group_id=3 OR u.id=11
        public function __construct(){
            parent::__construct();
        }

        public function getKontens(){
            $user = $this->session->user;
            // inisialisasi sessionnya di application/core/MY_Admin

            $this->db->select('k.*, u.username as user, u.id as user_id, c.name as kategori');
            $this->db->from('konten k');
            $this->db->join('user_konten uk', 'k.id = uk.konten_id');
            $this->db->join('users u', 'uk.user_id = u.id');
            $this->db->join('users_groups ug', 'ug.user_id = u.id');
            $this->db->join('konten_categories kc', 'k.id = kc.konten_id');
            $this->db->join('categories c', 'c.id = kc.category_id');

            if($user->group->id == 2){
                $this->db->where('uk.user_id', $user->id);
                $this->db->or_where('ug.group_id', 3);
            }elseif($user->group->id == 3){
                $this->db->where('uk.user_id', $user->id);
            }

            $query = $this->db->get();
            /*$query = $this->db->query("SELECT k.* FROM konten k INNER JOIN user_konten uk ON k.id = uk.konten_id INNER JOIN users u ON uk.user_id = u.id INNER JOIN users_groups ug ON ug.user_id = u.id WHERE ug.group_id=3 OR u.id=11");*/
            return $query->result();
        }

        public function getKonten($konten_id){
            $this->db->select('k.*');
            $this->db->from('konten k');
            $this->db->join('konten_categories kc', 'k.id = kc.konten_id');
            $this->db->join('categories c', 'c.id = kc.category_id');
            $this->db->where('k.id', $konten_id);
            $query = $this->db->get();
            return $query->row();

            // SELECT k.*, c.name as kategori FROM konten k INNER JOIN konten_categories kc ON k.id = kc.konten_id INNER JOIN categories c ON kc.category_id = c.id WHERE k.id = 5
        }

        public function getKontenKategori($konten_id){
            $this->db->select('c.id as cat_id');
            $this->db->from('konten k');
            $this->db->join('konten_categories kc', 'k.id = kc.konten_id');
            $this->db->join('categories c', 'c.id = kc.category_id');
            $this->db->where('k.id', $konten_id);
            $query = $this->db->get();
            return $query->result();
        }

        public function getCategories(){
            $query = $this->db->get('categories');
            return $query->result();
        }

        public function insertKonten($data){
            // yg dikerjakan di insertKonten:
            // 1.insert di tabel konten
            // 2.insert di tabel konten_categories
            // 3.insert di tabel user_konten
            $data1 = array(
                'judul' => $data['judul'],
                'slug' => $data['slug'],
                'isi' => $data['isi'],
                'published_at' => $data['published_at'],
                'thumbnail' => $data['thumbnail'],
                'created' => $data['created'],
                'modified' => $data['modified']
            );

            $this->db->insert('konten', $data1);

            $konten_id = $this->db->insert_id();

            $konten_category = array(
                'konten_id' => $konten_id,
                'category_id' => $data['kategori']
            );
            $this->db->insert('konten_categories',$konten_category);

            $user = $this->ion_auth->user()->row();
            $data2 = array(
                'konten_id' => $konten_id,
                'user_id' => $user->id
            );
            $this->db->insert('user_konten',$data2);

        }

        public function editKonten($data){
            $data1 = array(
                'judul' => $data['judul'],
                'isi' => $data['isi'],
                'published_at' => $data['published_at']
            );
            if(isset($data['thumbnail'])){
                $data1['thumbnail'] = $data['thumbnail'];
            }

            //update tabel konten
            $this->db->set($data1);
            $this->db->where('id', $data['id']);
            $this->db->update('konten');

            //update tabel konten_categories
            $this->db->where('konten_id', $data['id']);
            $this->db->delete('konten_categories');
            foreach($data['kategori'] as $key => $cat_id){
                $konten_category = array(
                    'konten_id' => $data['id'],
                    'category_id' => $cat_id
                );
                $this->db->insert('konten_categories',$konten_category);
            }
        }

        public function deleteKonten($konten_id){
            $this->db->where('id', $konten_id);
            $this->db->delete('konten');

            /*$this->db->where('konten_id', $konten_id);
            $this->db->delete('konten_categories');*/

        }
}

//SELECT k.id as konten_id, k.judul, c.id as kategori_id, c.name FROM konten k INNER JOIN konten_categories kc ON k.id = kc.konten_id INNER JOIN categories c ON kc.category_id = c.id WHERE k.id = 5
