<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model'); // Load the model here
    }

    public function index()
    {
        if (!$this->session->userdata('user_id') || $this->session->userdata('role_id') != 1) {
            redirect('admin/login');
        }

        $data['sicks'] = $this->employee_model->sicks();
        
        $this->load->view('templates/admin_header');
        $this->load->view('admin/dashboard/index', $data);
        $this->load->view('templates/Footer');
    }

    public function dashboard()
    {
        $data['sicks'] = $this->employee_model->sicks();

        // Load the admin dashboard view with data
        $this->load->view('templates/admin_header');
        $this->load->view('admin/dashboard/index', $data);
        $this->load->view('templates/Footer');
    }
}
