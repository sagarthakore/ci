<?php
    class Comment_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function create_comment($post_id){
            $data = array(
                'post_id' => $post_id,
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'body' => $this->input->post('body'),
                'status' => 1
            );

            return $this->db->insert('comments', $data);
        }

        public function get_comments($post_id){
            $query = $this->db->get_where('comments', array('post_id' => $post_id, 'status' => 1));
            return $query->result_array();
        }

        public function delete_comment($comment_id){
            $this->db->where('id', $comment_id);
            $data = array(
                'status' => 0
            );
            $this->db->update('comments', $data);
            return true;
        }
    }