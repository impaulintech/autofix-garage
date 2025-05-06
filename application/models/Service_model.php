<?php
class Service_model extends CI_Model
{
	public function get_all()
	{
		return $this->db->get('services')->result();
	}

	public function get($id)
	{
		return $this->db->get_where('services', ['id' => $id])->row();
	}

	public function add($data)
	{
		return $this->db->insert('services', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('services', $data);
	}

	public function delete($id)
	{
		return $this->db->delete('services', ['id' => $id]);
	}
	public function get_all_services()
	{
		return $this->db->get('services')->result();
	}
}
