<?php
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}
	public function index()
	{
		$this->load->view('login/index');
	}


	public function user()
	{
		$this->load->view('login/user_login');
	}


	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run()) {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);

			$result = $this->login_model->login($data);

			if ($result) {
				if ($result['active'] == 1) {
					$this->session->set_userdata('user', 'msg');
					$this->session->set_userdata('emp_id', $result['emp_id']);
					$this->session->set_userdata('status', $result['status']);
					$this->session->set_userdata('fname', $result['fname']);
					$this->session->set_userdata('mname', $result['mname']);
					$this->session->set_userdata('lname', $result['lname']);
					$this->session->set_userdata('address', $result['address']);
					$this->session->set_userdata('contact', $result['contact']);
					$this->session->set_userdata('email', $result['email']);
					$this->session->set_userdata('user_id', $result['user_id']);
					$this->session->set_userdata('role_id', $result['role_id']);
					redirect('dashboard');
				} else {
					$this->session->set_flashdata('error', 'Your account needs approval from admin.');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('error', 'Login Failed. Please check your username and password.');

				$referer = $this->input->server('HTTP_REFERER');
				if (strpos($referer, 'admin/login') !== false) {
					redirect('admin/login');
				} else {
					redirect('login');
				}
			}
		}
	}


	public function is_admin($user_id)
	{
		$this->db->select('type');
		$this->db->from('users');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row()->type == 1; // Check if user type is admin
		}
		return false; // Not found or not an admin
	}

	public function admin_login()
	{
		// Get input data
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// Check if username and password are set
		if (isset($username) && isset($password)) {
			// Check if user is admin
			$result = $this->login_model->is_admin($username, $password);

			if ($result) {
				// Assuming $result contains user data, set session data
				$this->session->set_userdata('user_id', $result['id']);
				$this->session->set_userdata('role_id', 1);

				redirect('admin/dashboard'); // Redirect to admin dashboard
			} else {
				$this->load->view('admin/login/index');
			}
		} else {
			$this->load->view('admin/login/index');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}


	public function user_login()
	{
		$this->load->view('user_login/index');
	}
}
