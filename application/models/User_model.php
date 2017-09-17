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

        // Log user in
        public function login($username, $password){
            // Validate
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $this->db->where('status', 1);

            $result = $this->db->get('users');

            if($result->num_rows() == 1){
                return $result->row(0)->id;
            }else{
                return false;
            }
        }

        public function get_user_name($user_id){
            $result = $this->db->get_where('users', array('id' => $user_id, 'status' => 1));
            return $result->row(0)->name;
        }

        public function get_user_email($user_id){
            $result = $this->db->get_where('users', array('id' => $user_id, 'status' => 1));
            return $result->row(0)->email;
        }

        public function is_user_admin($user_id){
            $result = $this->db->get_where('users', array('id' => $user_id, 'admin' => 1, 'status' => 1));
            if($result->num_rows() == 1) {
                return true;
            }else{
                return false;
            }
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