<?php
class login_model extends CI_Model
{
	public function login()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('employee', 'employee.emp_id = user.emp_id', 'right');

		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', $this->input->post('password'));
		$this->db->where('user.is_deleted = 0');
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->row_array();
		} else {
			return false;
		}
	}

	public function is_admin($username, $password)
	{
		// Query the users table to find the matching username
		$this->db->where('username', $username);
		$query = $this->db->get('users');

		// Check if there's a result
		if ($query->num_rows() == 1) {
			$user = $query->row_array(); // Get the user data

			// Verify the hashed password
			if ($password === $user['password']) {
				return $user['type'] == 1; // Return true if user is admin (type = 1)
			}
		}

		return false; // Return false if username not found or password mismatch
	}
}