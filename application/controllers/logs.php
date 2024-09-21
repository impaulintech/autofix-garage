<?php
class Logs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model');
        $this->load->model('user_model');
        if(!$this->session->userdata('user'))
        redirect('login');
    }
    public function emp_logs()
    {
        $role = $this->session->userdata('role_id');
        if($role == 4 || $role == 3)
        {
        $data['logs'] = $this->employee_model->logs();
        $this->load->view('templates/admin_header');
        $this->load->view('employee/logs',$data);
        $this->load->view('templates/Footer');
        }
        else
        {
        $this->session->sess_destroy();
        redirect('login');
        }
    }

    public function user_logs()
    {
    
        $role = $this->session->userdata('role_id');
        if($role == 4 || $role == 3)
        {
        $data['logs'] = $this->user_model->logs();
        $this->load->view('templates/Admin_header');
        $this->load->view('user/logs',$data);
        $this->load->view('templates/Footer');
        }
        else
        {
        $this->session->sess_destroy();
        redirect('login');
        }
    }

}