<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScheduleApi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Schedule_model');
	}

	public function index()
	{
		// Call the model's getAllSchedules method
		$schedules = $this->Schedule_model->getAllSchedules();

		// Set the response format
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($schedules));
	}
	public function approve_schedule()
	{
		error_reporting(E_ALL);
		ini_set('display_errors', 1);

		$schedule_id = $this->input->post('id');

		if (empty($schedule_id)) {
			echo json_encode(array('success' => false, 'message' => 'Schedule ID is required.'));
			return;
		}

		$data = array(
			'status' => 1,
		);

		$result = $this->Schedule_model->updateScheduleStatus($schedule_id, $data);

		if ($result) {
			echo json_encode(array('success' => true, 'message' => 'Schedule has been approved successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Failed to approve the schedule.'));
		}
	}
	public function cancel_schedule()
	{
		error_reporting(E_ALL);
		ini_set('display_errors', 1);

		$schedule_id = $this->input->post('id');

		if (empty($schedule_id)) {
			echo json_encode(array('success' => false, 'message' => 'Schedule ID is required.'));
			return;
		}

		$data = array(
			'status' => 2,
		);

		$result = $this->Schedule_model->updateScheduleStatus($schedule_id, $data);

		if ($result) {
			echo json_encode(array('success' => true, 'message' => 'Schedule has been cancelled successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Failed to cancel the schedule.'));
		}
	}
}
