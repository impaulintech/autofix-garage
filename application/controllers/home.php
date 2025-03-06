<?php
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');

		$query = $this->db->get_where('ismaintenance', ['id' => 1]);
		$maintenance = $query->row();

		if ($maintenance) {
			$this->session->set_userdata('maintenance_status', $maintenance->status);
		}
	}

	public function index()
	{
		$query = $this->db->get_where('ismaintenance', ['id' => 1]);
		$data['maintenance'] = $query->row();

		if ($data['maintenance'] && $data['maintenance']->status == true) {
			$this->load->view('maintenance/index');
		} else {
			$this->load->view('home/index', $data);
		}
	}

	public function toggle_maintenance()
	{
		// Get the current maintenance status
		$query = $this->db->get_where('ismaintenance', ['id' => 1]);
		$maintenance = $query->row();

		if ($maintenance) {
			$new_status = !$maintenance->status;

			// Update database
			$this->db->where('id', 1);
			$this->db->update('ismaintenance', ['status' => $new_status]);

			// Update session value
			$this->session->set_userdata('maintenance_status', $new_status);
		}

		echo json_encode(['status' => $new_status]);
	}
}
