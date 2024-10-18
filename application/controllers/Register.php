<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Register_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('register/index');
	}

	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('mname', 'Middle Name', 'trim');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('contact', 'Contact Number', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[employee.email]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('register/index');
		} else {
			$user_data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'createdAt' => date('Y-m-d H:i:s'),
				'is_deleted' => 0,
				'active' => 1,
			);

			$employee_data = array(
				'fname' => $this->input->post('fname'),
				'mname' => $this->input->post('mname'),
				'lname' => $this->input->post('lname'),
				'address' => $this->input->post('address'),
				'contact' => $this->input->post('contact'),
				'email' => $this->input->post('email'),
				'role_id' => 3,
				'createdAt' => date('Y-m-d H:i:s'),
			);

			if ($this->Register_model->register($employee_data, $user_data)) {
				$this->session->set_flashdata('success', 'Registration successful! You can now log in.');
				redirect('login');
			} else {
				$this->session->set_flashdata('error', 'Registration failed. Please try again.');
				redirect('register');
			}
		}
	}
}
