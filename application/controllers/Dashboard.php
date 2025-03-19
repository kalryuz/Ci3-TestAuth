<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect('auth/login');
		}
	}
	public function index()
	{
		echo "<h2>Welcome, " . $this->session->userdata('username') . "!</h2>";
		echo "<p><a href='" . site_url('auth/logout') . "'>Logout</a></p>";
	}
}
