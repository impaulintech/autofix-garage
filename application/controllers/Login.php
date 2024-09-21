<?php
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


    public function login() 
    {
        $this->form_validation->set_rules('username', 'Username',  'trim|required');
        $this->form_validation->set_rules('password', 'Password',  'trim|required');

        if($this->form_validation->run())
        {

        $data = array(
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password')
        );
    
        $result = $this->login_model->login($data);

        if ($result){
           $this->session->set_userdata('user','msg');
            $this->session->set_userdata('emp_id', $result['emp_id']);
            $this->session->set_userdata('fname', $result['fname']);
            $this->session->set_userdata('mname', $result['mname']);
            $this->session->set_userdata('lname', $result['lname']);
            $this->session->set_userdata('address', $result['address']);
            $this->session->set_userdata('contact', $result['contact']);
            $this->session->set_userdata('email', $result['email']);
            $this->session->set_userdata('user_id', $result['user_id']);
            $this->session->set_userdata('role_id', $result['role_id']);
            redirect('dashboard');
        } 
        else 
        {
            $this->session->set_userdata('user','Login Failed');
            redirect('login');
        }
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
