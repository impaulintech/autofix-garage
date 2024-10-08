<?php
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('employee_model');
		$this->load->model('Schedule_model');
		$this->load->model('user_model');
		if (!$this->session->userdata('user'))
			redirect('login');
	}
	public function index()
	{
		$role = $this->session->userdata('role_id');
		if ($role == 4 || $role == 3) {
			$schedulesData = $this->Schedule_model->getAllSchedules();

			$data['schedules'] = $schedulesData['data'];
			$data['totalSchedules'] = $schedulesData['total'];
			$data['totalSchedulesToday'] = $schedulesData['totalToday'];
			$data['totalSchedulesThisWeek'] = $schedulesData['totalThisWeek'];
			$data['totalUsers'] = $this->user_model->getTotalCount();

			$this->load->view('templates/admin_header');
			$this->load->view('dashboard/admin_dash', $data);
			$this->load->view('templates/Footer');
		}
		// elseif($role == 2)
		// {
		//     $data['sicks'] = $this->employee_model->sicks();
		//     $this->load->view('templates/HR_header');
		//     $this->load->view('dashboard/hr_dash',$data);
		//     $this->load->view('templates/Footer');
		// } 
		elseif ($role == 1 || $role == 2) {
			$data['user_id'] = $this->session->userdata('user_id');
			$schedulesData = json_decode(json_encode($this->Schedule_model->getAllSchedules()), true);
			$member_id = $this->Schedule_model->getMemberIdByUserId($data['user_id']);

			$data['schedules'] = array_filter($schedulesData['data'], function ($schedule) use ($member_id) {
				return $schedule['id'] == $member_id;
			});

			$data['member_id'] = $member_id;

			$data['scheduledAppointment'] = count($data['schedules']);

			$this->load->view('templates/emp_header', $data);
			$this->load->view('dashboard/emp_dash', $data);
			$this->load->view('templates/Footer');
		}
	}



	/* // Check if the current date is equal to or past the expire_date
$currentDate = date('y-m-d h:i:s');
if (strtotime($currentDate) >= strtotime($expire_date)) {
    // Update the record to set is_sick to 0
    $this->employee_model->updateIsSickStatus($data['emp_id'], 0);
} */
}
