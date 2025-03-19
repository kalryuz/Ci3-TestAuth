<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {   
        parent::__construct();
        $this->load->model('Auth_model');
    }

	public function login()
	{
		$this->load->view('auth/login');
	}

    public function process_login() 
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->Auth_model->get_user($username);

            if ($user && password_verify($password, $user->password)) {
                $session_data = [
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'role' => $user->role,
                    'logged_in' => TRUE
                ];
                $this->session->set_userdata($session_data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Invalid username and password');
                redirect('auth/login');
            }
        }
    }

    public function logout() 
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

}
