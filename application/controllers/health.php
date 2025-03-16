<?php
require 'PHPMail/src/PHPMailer.php';
require 'PHPMail/src/SMTP.php';
require 'PHPMail/src/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

	function sendEmailToClient($recipientEmail, $recipientName, $scheduleDetails)
	{
		$mail = new PHPMailer(true);

		try {
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'garageautofix022@gmail.com';
			$mail->Password = 'wiuafhorurleezig';
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;

			$mail->setFrom('garageautofix022@gmail.com', 'Autofix Garage');
			$mail->addAddress($recipientEmail, $recipientName);
			$mail->isHTML(true);
			$mail->Subject = 'Your Appointment is Confirmed!';

			$servicesList = "<ul style='padding: 0px !important'>";
			$services = explode(", ", $scheduleDetails['dow']);
			foreach ($services as $service) {
				$service = str_replace("₱", "Php ", $service);
				$servicesList .= "<li>$service</li>";
			}
			$servicesList .= "</ul>";

			$mail->Body = ""
				. "<div style='font-family: Arial, sans-serif; padding: 20px; background-color: #f4f4f4;'>"
				. "<div style='background: white; padding: 20px; border-radius: 10px;'>"
				. "<h2 style='color: #007bff;'>Hello, $recipientName!</h2>"
				. "<p>Your appointment has been successfully scheduled. Here are the details:</p>"
				. "<table style='width: 100%; border-collapse: collapse;'>"
				. "<tr><td style='width: 100px;'><b>Date:</b></td><td>{$scheduleDetails['date_from']}</td></tr>"
				. "<tr><td style='width: 100px;'><b>Time:</b></td><td>{$scheduleDetails['time_from']} - {$scheduleDetails['time_to']}</td></tr>"
				. "<tr><td style='width: 100px;'><b>Service:</b></td><td>$servicesList</td></tr>"
				. "<tr><td style='width: 100px;'><b>Assigned Mechanic:</b></td><td>{$scheduleDetails['mechanic']}</td></tr>"
				. "</table>"
				. "<p>Thank you for choosing Autofix Garage! We look forward to serving you.</p>"
				. "<p style='text-align: center;'><b>Location:</b> Autofix Garage, Your City</p>"
				. "<p style='text-align: center;'>For any inquiries, contact us at <a href='mailto:garageautofix022@gmail.com'>garageautofix022@gmail.com</a></p>"
				. "</div></div>";

			$mail->SMTPOptions = [
				'ssl' => [
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true,
				],
			];

			return $mail->send();
		} catch (Exception $e) {
			error_log('Mailer Exception: ' . $e->getMessage());
			return false;
		}
	}

	function sendEmailToAdmin($recipientEmail, $recipientName, $scheduleDetails)
	{
		$mail = new PHPMailer(true);
		$full_name = $this->session->userdata('lname') . ' ' . $this->session->userdata('fname');

		try {
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'garageautofix022@gmail.com';
			$mail->Password = 'wiuafhorurleezig';
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;

			$mail->setFrom('garageautofix022@gmail.com', 'Autofix Garage');
			$mail->addAddress($recipientEmail, $recipientName);
			$mail->isHTML(true);
			$mail->Subject = 'New Appointment Scheduled!';

			$servicesList = "<ul style='padding: 0px !important'>";
			$services = explode(", ", $scheduleDetails['dow']);
			foreach ($services as $service) {
				$service = str_replace("₱", "Php ", $service);
				$servicesList .= "<li>$service</li>";
			}
			$servicesList .= "</ul>";

			$mail->Body = ""
				. "<div style='font-family: Arial, sans-serif; padding: 20px; background-color: #f4f4f4;'>"
				. "<div style='background: white; padding: 20px; border-radius: 10px;'>"
				. "<h2 style='color: #007bff;'>Hello, $recipientName!</h2>"
				. "<p>New appointment has been successfully scheduled by $full_name. Here are the details:</p>"
				. "<table style='width: 100%; border-collapse: collapse;'>"
				. "<tr><td style='width: 100px;'><b>Date:</b></td><td>{$scheduleDetails['date_from']}</td></tr>"
				. "<tr><td style='width: 100px;'><b>Time:</b></td><td>{$scheduleDetails['time_from']} - {$scheduleDetails['time_to']}</td></tr>"
				. "<tr><td style='width: 100px;'><b>Service:</b></td><td>$servicesList</td></tr>"
				. "<tr><td style='width: 100px;'><b>Assigned Mechanic:</b></td><td>{$scheduleDetails['mechanic']}</td></tr>"
				. "</table>"
				. "<p>Please review the appointment details and make necessary arrangements.</p>"
				. "</div></div>";

			$mail->SMTPOptions = [
				'ssl' => [
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true,
				],
			];

			return $mail->send();
		} catch (Exception $e) {
			error_log('Mailer Exception: ' . $e->getMessage());
			return false;
		}
	}

	public function add()
	{
		$full_name = $this->session->userdata('lname') . ' ' . $this->session->userdata('fname');
		$services = $this->input->post('services');
		$dow = is_array($services) ? implode(", ", $services) : $services;

		$scheduleDetails = [
			'dow' => $dow,
			'mechanic' => $this->input->post('mechanic'),
			'date_from' => $this->input->post('appointment_date'),
			'date_to' => $this->input->post('appointment_date'),
			'time_from' => $this->input->post('appointment_time'),
			'time_to' => $this->input->post('appointment_time'),
		];

		$this->sendEmailToClient($this->session->userdata('email'), $full_name, $scheduleDetails);
		$this->sendEmailToAdmin('garageautofix022@gmail.com', 'Admin', $scheduleDetails);

		$data = array_merge(['user_id' => $this->input->post('member_id'), 'full_name' => $full_name], $scheduleDetails);

		$result = $this->Schedule_model->addSchedule($data);
		if ($result) {
			$this->session->set_flashdata('msg', 'Appointment scheduled successfully');
			redirect('dashboard');
		} else {
			$this->session->set_flashdata('msg', 'Failed to schedule appointment');
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
