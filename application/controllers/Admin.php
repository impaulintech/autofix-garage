<?php
class Admin extends CI_Controller
{
	public function index()
	{
		// Check for session
		if (!$this->session->userdata('user_id') || $this->session->userdata('role_id') != 1) {
			redirect('admin/login'); // Redirect to login if not logged in as admin
		}

		// Load the admin index view
		$this->load->view('admin/index');
	}

	public function dashboard()
	{
		// Load the admin dashboard view
		$this->load->view('admin/dashboard/index');
	}
}
