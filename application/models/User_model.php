<?php
    class User_model extends CI_Model{
        public function register($enc_password){
            // User data array
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $enc_password,
                'zipcode' => $this->input->post('zipcode'),
                'status' => 1
            );

            // Insert User
            return $this->db->insert('users', $data);
        }

        // Check if username exists
        public function check_username_exists($username){
            $query = $this->db->get_where('users', array('username' => $username, 'status' => 1));
            if(empty($query->row_array())){
                return true;
            }else{
                return false;
            }
        }

        // Check if email exists
        public function check_email_exists($email){
            $query = $this->db->get_where('users', array('email' => $email, 'status' => 1));
            if(empty($query->row_array())){
                return true;
            }else{
                return false;
            }
        }
    }