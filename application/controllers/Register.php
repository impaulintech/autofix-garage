<?php
require 'PHPMail/src/PHPMailer.php';
require 'PHPMail/src/SMTP.php';
require 'PHPMail/src/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Register_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('register/index');
	}
	function sendRegistrationEmail($recipientEmail, $recipientName)
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
			$mail->Subject = 'Welcome to Autofix Garage!';

			$mail->Body = ""
				. "<div style='font-family: Arial, sans-serif; padding: 20px; background-color: #f4f4f4;'>"
				. "<div style='background: white; padding: 20px; border-radius: 10px;'>"
				. "<h2 style='color: #007bff;'>Welcome, $recipientName!</h2>"
				. "<p>Thank you for registering at Autofix Garage. Your account has been successfully created.</p>"
				. "<p>You can now log in and start using our services.</p>"
				. "<p style='text-align: center;'><a href='http://yourwebsite.com/login' style='padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;'>Login Now</a></p>"
				. "<p style='text-align: center;'>If you have any questions, feel free to contact us at <a href='mailto:garageautofix022@gmail.com'>garageautofix022@gmail.com</a>.</p>"
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

	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('mname', 'Middle Name', 'trim');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('contact', 'Contact Number', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[employee.email]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('register/index');
		} else {
			$user_data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'createdAt' => date('Y-m-d H:i:s'),
				'is_deleted' => 0,
				'active' => 1,
			);

			$employee_data = array(
				'fname' => $this->input->post('fname'),
				'mname' => $this->input->post('mname'),
				'lname' => $this->input->post('lname'),
				'address' => $this->input->post('address'),
				'contact' => $this->input->post('contact'),
				'email' => $this->input->post('email'),
				'role_id' => 2,
				'createdAt' => date('Y-m-d H:i:s'),
			);

			if ($this->Register_model->register($employee_data, $user_data)) {
				$recipientName = $this->input->post('fname') . ' ' . $this->input->post('lname');
				$this->sendRegistrationEmail($this->input->post('email'), $recipientName);

				$this->session->set_flashdata('alert', ['type' => 'success', 'message' => 'Registration successful! You can now log in.']);
				redirect('register');
			} else {
				$this->session->set_flashdata('alert', ['type' => 'error', 'message' => 'Registration failed. Please try again.']);
				redirect('register');
			}
		}
	}
}
