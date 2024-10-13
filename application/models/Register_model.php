<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_model extends CI_Model
{
	public function check_username_exists($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('user');

		return $query->num_rows() > 0;
	}

	public function insert_user($data)
	{
		return $this->db->insert('user', $data);
	}

	public function insert_employee($data)
	{
		return $this->db->insert('employee', $data);
	}

	/**
	 * Register a new user and employee in a single transaction.
	 *
	 * @param array $employeeData Data for the employee.
	 * @param array $userData Data for the user.
	 * @return bool True on success, false on failure.
	 */
	public function register($employeeData, $userData)
	{
		$this->db->trans_start();
		$this->insert_employee($employeeData);
		$emp_id = $this->db->insert_id();
		$userData['emp_id'] = $emp_id;
		$this->insert_user($userData);
		$this->db->trans_complete();
		return $this->db->trans_status();
	}
}
