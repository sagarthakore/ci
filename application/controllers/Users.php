<?php
    class Users extends CI_Controller{

        // Register user
        public function register(){
            $data['title'] = 'Sign Up';
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            }else{
                // Encrypt password
                $enc_password = md5($this->input->post('password'));

                $this->user_model->register($enc_password);

                // Set message
                $this->session->set_flashdata('user_registered', 'You are now registered and can log in');

                redirect('posts');
            }
        }

        // Log in user
        public function login(){
            $data['title'] = 'Sign In';
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            }else{

                // Get username
                $username = $this->input->post('username');
                // Get and encrypt the password
                $password = md5($this->input->post('password'));

                // Login user
                $user_id = $this->user_model->login($username, $password);

                if($user_id){

                    // Create session
                    $user_data = array(
                        'user_id' => $user_id,
                        'username' => $username,
                        'name' => $this->user_model->get_user_name($user_id),
                        'email' => $this->user_model->get_user_email($user_id),
                        'admin' => $this->user_model->is_user_admin($user_id),
                        'logged_in' => true
                    );

                    $this->session->set_userdata($user_data);

                    // Set message
                    $this->session->set_flashdata('user_loggedin', 'Login Successful');

                    redirect('posts');
                }else{

                    // Set Message
                    $this->session->set_flashdata('login_failed', 'Invalid Username and Password');

                    redirect('users/login');
                }
            }
        }

        // Log user out
        public function logout(){
            // unset user data
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('name');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('admin');

            // Set Message
            $this->session->set_flashdata('user_loggedout', 'You have successfully logged out');

            redirect('users/login');
        }

        // Check if username exists
        public function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists', 'That username is already taken. Please choose a different one');
            if($this->user_model->check_username_exists($username)){
                return true;
            }else{
                return false;
            }
        }

        // Check if email exists
        public function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists', 'That email is already taken. Please choose a different one');
            if($this->user_model->check_email_exists($email)){
                return true;
            }else{
                return false;
            }
        }
    }