<?php
require 'PHPMail/src/PHPMailer.php';
require 'PHPMail/src/SMTP.php';
require 'PHPMail/src/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
		$schedules = $this->Schedule_model->getAllSchedules();

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($schedules));
	}
	function sendApprovalEmail($recipientEmail, $recipientName, $scheduleDetails)
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
			$mail->Subject = 'Your Appointment Has Been Approved';

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
				. "<p>Your request for the following appointment has been approved:</p>"
				. "<table style='width: 100%; border-collapse: collapse;'>"
				. "<tr><td style='width: 100px;'><b>Date:</b></td><td>{$scheduleDetails['date_from']}</td></tr>"
				. "<tr><td style='width: 100px;'><b>Time:</b></td><td>{$scheduleDetails['time_from']} - {$scheduleDetails['time_to']}</td></tr>"
				. "<tr><td style='width: 100px;'><b>Service:</b></td><td>$servicesList</td></tr>"
				. "<tr><td style='width: 100px;'><b>Assigned Mechanic:</b></td><td>{$scheduleDetails['mechanic']}</td></tr>"
				. "</table>"
				. "<p>We appreciate your time and hope to assist you in the future.</p>"
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


	public function approve_schedule()
	{
		error_reporting(E_ALL);
		ini_set('display_errors', 1);

		$schedule_id = $this->input->post('id');

		if (empty($schedule_id)) {
			echo json_encode(array('success' => false, 'message' => 'Schedule ID is required.'));
			return;
		}

		$scheduleDetails = $this->Schedule_model->getScheduleById($schedule_id);

		if (!$scheduleDetails) {
			echo json_encode(array('success' => false, 'message' => 'Schedule not found.'));
			return;
		}

		$query = $this->db->select('emp_id')->where('user_id', $scheduleDetails['user_id'])->get('user');
		$user = $query->row_array();

		if (!$user) {
			echo json_encode(array('success' => false, 'message' => 'User not found.'));
			return;
		}

		$query = $this->db->select('email')->where('emp_id', $user['emp_id'])->get('employee');
		$employee = $query->row_array();

		if (!$employee) {
			echo json_encode(array('success' => false, 'message' => 'Employee not found.'));
			return;
		}

		$scheduleDetails['email'] = $employee['email'];

		$data = array('status' => 1);
		$result = $this->Schedule_model->updateScheduleStatus($schedule_id, $data);

		if ($result) {
			$this->sendApprovalEmail($scheduleDetails['email'], $scheduleDetails['full_name'], $scheduleDetails);

			echo json_encode(array('success' => true, 'message' => 'Schedule cancellation has been approved successfully!'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Failed to approve the schedule.'));
		}
	}

	function sendCancellationEmail($recipientEmail, $recipientName, $scheduleDetails, $isAdmin = false)
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
			$mail->Subject = $isAdmin ? 'Appointment Cancellation Notice' : 'Your Appointment has been Cancelled';

			$servicesList = "<ul style='padding: 0px !important'>";
			$services = explode(", ", $scheduleDetails['dow']);
			foreach ($services as $service) {
				$service = str_replace("₱", "Php ", $service);
				$servicesList .= "<li>$service</li>";
			}
			$servicesList .= "</ul>";

			$greeting = $isAdmin ? "Hello, Admin!" : "Hello, $recipientName!";
			$introText = $isAdmin ? "The following appointment has been cancelled by {$scheduleDetails['full_name']}." : "Your scheduled appointment has been cancelled.";

			$mail->Body = ""
				. "<div style='font-family: Arial, sans-serif; padding: 20px; background-color: #f4f4f4;'>"
				. "<div style='background: white; padding: 20px; border-radius: 10px;'>"
				. "<h2 style='color: #d9534f;'>$greeting</h2>"
				. "<p>$introText Here are the cancelled details:</p>"
				. "<table style='width: 100%; border-collapse: collapse;'>"
				. "<tr><td style='width: 100px;'><b>Date:</b></td><td>{$scheduleDetails['date_from']}</td></tr>"
				. "<tr><td style='width: 100px;'><b>Time:</b></td><td>{$scheduleDetails['time_from']} - {$scheduleDetails['time_to']}</td></tr>"
				. "<tr><td style='width: 100px;'><b>Service:</b></td><td>$servicesList</td></tr>"
				. "<tr><td style='width: 100px;'><b>Assigned Mechanic:</b></td><td>{$scheduleDetails['mechanic']}</td></tr>"
				. "</table>"
				. "<p>" . ($isAdmin ? "Please update records accordingly." : "We apologize for any inconvenience. Feel free to reschedule at your convenience.") . "</p>"
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

	public function cancel_schedule()
	{
		$schedule_id = $this->input->post('id');

		if (empty($schedule_id)) {
			echo json_encode(array('success' => false, 'message' => 'Schedule ID is required.'));
			return;
		}

		// Retrieve schedule details
		$scheduleDetails = $this->Schedule_model->getScheduleById($schedule_id);

		if (!$scheduleDetails) {
			echo json_encode(array('success' => false, 'message' => 'Schedule not found or already cancelled.'));
			return;
		}

		$scheduleDetails['email'] = $this->session->userdata('email') ?? null;
		$scheduleDetails['full_name'] = $scheduleDetails['full_name'] ?? 'Unknown User';
		$scheduleDetails['dow'] = $scheduleDetails['dow'] ?? '';
		$scheduleDetails['mechanic'] = $scheduleDetails['mechanic'] ?? 'N/A';
		$scheduleDetails['date_from'] = $scheduleDetails['date_from'] ?? 'N/A';
		$scheduleDetails['time_from'] = $scheduleDetails['time_from'] ?? 'N/A';
		$scheduleDetails['time_to'] = $scheduleDetails['time_to'] ?? 'N/A';

		if (!empty($scheduleDetails['dow'])) {
			$servicesList = "<ul>";
			$services = explode(", ", $scheduleDetails['dow']);
			foreach ($services as $service) {
				$service = str_replace("₱", "Php ", $service);
				$servicesList .= "<li>$service</li>";
			}
			$servicesList .= "</ul>";
		} else {
			$servicesList = "<p>No services were listed.</p>";
		}

		$data = array('status' => 2);
		$result = $this->Schedule_model->updateScheduleStatus($schedule_id, $data);

		if ($result) {
			if (!empty($scheduleDetails['email'])) {
				$this->sendCancellationEmail($scheduleDetails['email'], $scheduleDetails['full_name'], $scheduleDetails, false);
			}

			$this->sendCancellationEmail('garageautofix022@gmail.com', 'Admin', $scheduleDetails, true);

			echo json_encode(array('success' => true, 'message' => 'Schedule has been cancelled successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Failed to cancel the schedule.'));
		}
	}
}
