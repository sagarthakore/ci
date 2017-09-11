<?php
    class Post_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }

        public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE){

            if($limit){
                $this->db->limit($limit, $offset);
            }

            if($slug === FALSE){
                $this->db->order_by('posts.id', 'DESC');
                $this->db->where('posts.status', 1);
                $this->db->join('categories', 'categories.id = posts.category_id');
                $query = $this->db->get('posts');
                return $query->result_array();
            }

            $query = $this->db->get_where('posts', array('slug' => $slug));
            return $query->row_array();
        }

        public function create_post($post_image){
            $slug = url_title($this->input->post('title'));

            $data = array(
                    'title' => $this->input->post('title'),
                    'slug' => $slug,
                    'body' => $this->input->post('body'),
                    'status' => 1,
                    'category_id' => $this->input->post('category_id'),
                    'user_id' => $this->session->userdata('user_id'),
                    'post_image' => $post_image
                );

            return $this->db->insert('posts', $data);
        }

        public function delete_post($id){
            $this->db->where('id', $id);
            $data = array(
                    'status' => 0
                );
            $this->db->update('posts', $data);
            return true;
        }

        public function update_post(){
            $slug = url_title($this->input->post('title'));

            $data = array(
                    'title' => $this->input->post('title'),
                    'slug' => $slug,
                    'body' => $this->input->post('body'),
                    'status' => 1,
                    'category_id' => $this->input->post('category_id')
                );

            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('posts', $data);
        }

        public function get_categories(){
            $this->db->order_by('name');
            $this->db->where('status', 1);
            $query = $this->db->get('categories');
            return $query->result_array();
        }

        public function get_posts_by_category($category_id){
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category_id');
            $query = $this->db->get_where('posts', array('category_id' => $category_id, 'posts.status' => 1));
            return $query->result_array();
        }
    }