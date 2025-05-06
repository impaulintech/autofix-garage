<?php
class Mechanic_model extends CI_Model
{
	public function get_all()
	{
		$this->db->where('is_deleted', 0);
		$query = $this->db->get('mechanics');
		return $query->result();
	}

	public function get($id)
	{
		return $this->db->get_where('mechanics', ['mechanic_id' => $id])->row();
	}

	public function add($data)
	{
		return $this->db->insert('mechanics', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('mechanic_id', $id);
		return $this->db->update('mechanics', $data);
	}

	public function delete($id)
	{
		$this->db->where('mechanic_id', $id);
		return $this->db->update('mechanics', ['is_deleted' => 1]);
	}
}
