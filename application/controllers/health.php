<?php
class health extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Health_model');
		$this->load->model('Schedule_model');
		if (!$this->session->userdata('user'))
			redirect('login');
	}
	public function index()
	{
		$role = $this->session->userdata('role_id');
		if ($role == 4 || $role == 3) {
			$data['health'] = $this->Health_model->rows();
			$this->load->view('templates/Admin_header');
			$this->load->view('health_report/index', $data);
			$this->load->view('templates/Footer');
		} elseif ($role == 2) {
			$data['health'] = $this->Health_model->rows();
			$this->load->view('templates/hr_header');
			$this->load->view('health_report/index', $data);
			$this->load->view('templates/Footer');
		} else {
			$this->session->sess_destroy();
			redirect('login');
		}
	}

	public function add()
	{
		$full_name = $this->session->userdata('lname') . ' ' . $this->session->userdata('fname');
		$services = $this->input->post('services');
		$dow = is_array($services) ? implode(", ", $services) : $services;

		$data = array(
			'user_id'      => $this->input->post('member_id'),
			'dow'          => $dow,
			'mechanic'     => $this->input->post('mechanic'),
			'full_name'    => $full_name,
			'date_from'    => $this->input->post('appointment_date'),
			'date_to'      => $this->input->post('appointment_date'),
			'time_from'    => $this->input->post('appointment_time'),
			'time_to'      => $this->input->post('appointment_time'),
		);

		$result = $this->Schedule_model->addSchedule($data);
		if ($result) {
			$this->session->set_flashdata('msg', 'Report recorded');
			redirect('dashboard');
		} else {
			$this->session->set_flashdata('msg', 'Report failed to record');
			redirect('dashboard');
		}
	}

	public function cure($health_id)
	{
		$data = array(
			'health_id'        => $health_id,
			'is_sick'     => 0,
			'date_cured'      => date('y-m-d h:i:s')
		);

		$result = $this->Health_model->cure($health_id, $data);
		if ($result) {
			$this->session->set_flashdata('msg', 'Selected user has been updated');
			redirect('dashboard');
		} else {
			$this->session->set_flashdata('msg', 'Selected user has been failed updated ');
			redirect('dashboard');
		}
	}

	public function approve_schedule($schedule_id)
	{
		$data = array(
			'status' => 1,
		);

		$result = $this->Schedule_model->updateScheduleStatus($schedule_id, $data);

		if ($result) {
			$this->session->set_flashdata('msg', 'Schedule has been approved successfully.');
			redirect('dashboard');
		} else {
			$this->session->set_flashdata('msg', 'Failed to approve the schedule.');
			redirect('dashboard');
		}
	}

	public function cancel_schedule($schedule_id)
	{
		$data = array(
			'status' => 2,
		);

		$result = $this->Schedule_model->updateScheduleStatus($schedule_id, $data);

		if ($result) {
			$this->session->set_flashdata('msg', 'Schedule has been cancelled successfully.');
			redirect('dashboard');
		} else {
			$this->session->set_flashdata('msg', 'Failed to cancel the schedule.');
			redirect('dashboard');
		}
	}
}
