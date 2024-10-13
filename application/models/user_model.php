<?php
class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'user';
	}

	public function rows()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('employee', 'employee.emp_id = user.emp_id', 'right');
		$this->db->where('user.is_deleted = 0');
		$query = $this->db->get();
		return $query->result();
	}

	public function row($user_id)
	{
		$where = array(
			'is_deleted' => 0,
			'user_id'   => $user_id
		);
		$query = $this->db->get_where($this->table, $where);
		return $query->row();
	}

	public function logs()
	{
		$where = array();
		$query = $this->db->get_where($this->table, $where);
		return $query->result();
	}

	public function add($data)
	{
		$this->db->insert($this->table, $data);
		return true;
	}

	public function edit($user_id, $data)
	{
		$where = array(
			'is_deleted' => 0,
			'user_id'   => $user_id
		);
		return $this->db->update($this->table, $data, $where);
	}

	public function delete($user_id, $data)
	{
		$where = array(
			'is_deleted' => 0,
			'user_id'   => $user_id
		);
		return $this->db->update($this->table, $data, $where);
	}

	public function getTotalCount()
	{
		$this->db->where('is_deleted', 0);
		return $this->db->count_all_results($this->table);
	}

	public function approve_account($user_id)
	{
		$data = array('active' => 1);
		$this->db->where('user_id', $user_id);
		return $this->db->update($this->table, $data);
	}

	public function disable_account($user_id)
	{
		$data = array('active' => 0);
		$this->db->where('user_id', $user_id);
		return $this->db->update($this->table, $data);
	}
}
