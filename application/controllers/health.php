<?php
class health extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Health_model');
        if(!$this->session->userdata('user'))
        redirect('login');
    }
    public function index()
    {
        $role = $this->session->userdata('role_id');
        if($role == 4 || $role == 3)
        {
            $data['health'] = $this->Health_model->rows();
        $this->load->view('templates/Admin_header');
        $this->load->view('health_report/index',$data);
        $this->load->view('templates/Footer');
        }
        elseif($role == 2)
        {
            $data['health'] = $this->Health_model->rows();
        $this->load->view('templates/hr_header');
        $this->load->view('health_report/index',$data);
        $this->load->view('templates/Footer');
        }
        else
        {
        $this->session->sess_destroy();
        redirect('login');
        }
    }
    public function add()
    {     
            $data = array(
                'emp_id'        => $this->input->post('emp_id'),
                'ill_id'        => $this->input->post('ill_id'),
                'is_sick'       => 1,
                'date_declared' => date('y-m-d h:i:s'),
            );
    
            $result = $this->Health_model->add($data);
            if ($result) 
            {
                $this->session->set_flashdata('msg', 'report recorded');
                redirect('dashboard');
            } 
            else 
            {
                $this->session->set_flashdata('msg', 'report failed to record');
                redirect('dashboard');
            }
    }

    public function cure($health_id)
    {
        $data = array
        (
            'health_id'        => $health_id,
            'is_sick'     => 0,
            'date_cured'      => date('y-m-d h:i:s')
        );
 
        $result = $this->Health_model->cure($health_id, $data);
        if($result)
        {
        $this->session->set_flashdata('msg', 'Selected user has been updated');
        redirect('dashboard');
          }
        else{
        $this->session->set_flashdata('msg', 'Selected user has been failed updated ');
        redirect('dashboard');
        }
    }

  
}