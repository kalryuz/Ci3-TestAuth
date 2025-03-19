<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserSeeder extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function seed()
	{
		$data = [
			'username' => 'admin',
			'email' => 'admin@example.com',
			'password' => password_hash('password123', PASSWORD_DEFAULT), //secured password
			'role' => 'admin'
		];

		if ($this->User_model->insert_user($data)) {
			echo "Test user created successfully";
		} else {
			echo "Error inserting test user";
		}
	}
}
