<?php
require 'PHPMail/src/PHPMailer.php';
require 'PHPMail/src/SMTP.php';
require 'PHPMail/src/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}
	public function index()
	{
		$this->load->view('login/index');
	}


	public function user()
	{
		$this->load->view('login/user_login');
	}



	function sendLoginEmail($recipientEmail, $recipientName, $isAdmin = false)
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
			$mail->Subject = 'Successful Login Notification';

			// Get login details from server variables
			$ipAddress = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
			$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';

			// Simplify user agent for better readability
			$browser = "Unknown Browser";
			if (strpos($userAgent, 'Firefox') !== false) {
				$browser = "Mozilla Firefox";
			} elseif (strpos($userAgent, 'Chrome') !== false) {
				$browser = "Google Chrome";
			} elseif (strpos($userAgent, 'Safari') !== false) {
				$browser = "Apple Safari";
			} elseif (strpos($userAgent, 'Edge') !== false) {
				$browser = "Microsoft Edge";
			} elseif (strpos($userAgent, 'Opera') !== false || strpos($userAgent, 'OPR') !== false) {
				$browser = "Opera";
			} elseif (strpos($userAgent, 'MSIE') !== false || strpos($userAgent, 'Trident') !== false) {
				$browser = "Internet Explorer";
			}

			$greeting = $isAdmin ? "Hello, Admin $recipientName!" : "Hello, $recipientName!";
			$introText = $isAdmin ? "There was a successful login to your admin account." : "There was a successful login to your account.";

			// Logo URL (replace with your actual logo URL)
			$logoUrl = 'https://i.imgur.com/GJIFm5F.png';

			$mail->Body = ""
				. "<div style='font-family: Arial, sans-serif; padding: 20px; background-color: #f4f4f4;'>"
				. "<div style='background: white; padding: 20px; border-radius: 10px; max-width: 600px; margin: 0 auto;'>"
				// Logo section
				. "<div style='text-align: center; margin-bottom: 20px;'>"
				. "<center><img align='center' src='$logoUrl' alt='Autofix Garage Logo' style='max-height: 100px;'></center>"
				. "</div>"
				// Content section
				. "<h2 style='color: #5cb85c; margin-top: 0;'>$greeting</h2>"
				. "<p>$introText Here are the details:</p>"
				. "<table style='width: 100%; border-collapse: collapse; margin-bottom: 20px;'>"
				. "<tr><td style='width: 150px; padding: 8px 0;'><b>Login Time:</b></td><td>" . date('Y-m-d H:i:s') . "</td></tr>"
				. "<tr><td style='width: 150px; padding: 8px 0;'><b>IP Address:</b></td><td>$ipAddress</td></tr>"
				. "<tr><td style='width: 150px; padding: 8px 0;'><b>Browser:</b></td><td>$browser</td></tr>"
				. "</table>"
				. "<div style='background-color: #f8f9fa; padding: 15px; border-radius: 5px; margin-bottom: 20px;'>"
				. "<p style='text-align: center; color: #777; font-size: 0.9em;'>This is an automated notification. Please do not reply to this email.</p>"
				. "<p style='text-align: center; margin-top: 20px;'>"
				. "<a href='mailto:garageautofix022@gmail.com' style='color: #007bff; text-decoration: none;'>Contact Support</a>"
				. "</p>"
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
	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run()) {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);

			$result = $this->login_model->login($data);

			if ($result) {
				if ($result['active'] == 1) {
					$this->session->set_userdata('user', 'msg');
					$this->session->set_userdata('emp_id', $result['emp_id']);
					$this->session->set_userdata('status', $result['status']);
					$this->session->set_userdata('fname', $result['fname']);
					$this->session->set_userdata('mname', $result['mname']);
					$this->session->set_userdata('lname', $result['lname']);
					$this->session->set_userdata('address', $result['address']);
					$this->session->set_userdata('contact', $result['contact']);
					$this->session->set_userdata('email', $result['email']);
					$this->session->set_userdata('user_id', $result['user_id']);
					$this->session->set_userdata('role_id', $result['role_id']);

					// Set success notification
					$this->session->set_flashdata('success', 'Login successful! Welcome back.');
					$this->sendLoginEmail($result['email'], $result['fname']);
					redirect('dashboard');
				} else {
					$this->session->set_flashdata('error', 'Your account needs approval from admin.');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('error', 'Login Failed. Please check your username and password.');
				redirect('login');
			}
		}
	}


	public function is_admin($user_id)
	{
		$this->db->select('type');
		$this->db->from('users');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row()->type == 1; // Check if user type is admin
		}
		return false; // Not found or not an admin
	}

	public function admin_login()
	{
		// Get input data
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// Check if username and password are set
		if (isset($username) && isset($password)) {
			// Check if user is admin
			$result = $this->login_model->is_admin($username, $password);

			if ($result) {
				// Assuming $result contains user data, set session data
				$this->session->set_userdata('user_id', $result['id']);
				$this->session->set_userdata('role_id', 1);

				redirect('admin/dashboard'); // Redirect to admin dashboard
			} else {
				$this->load->view('admin/login/index');
			}
		} else {
			$this->load->view('admin/login/index');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}


	public function user_login()
	{
		$this->load->view('user_login/index');
	}
}
