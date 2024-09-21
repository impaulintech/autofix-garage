<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        
        if(!$this->session->userdata('user'))
        redirect('login');
    }
    public function index()
    {

        $role = $this->session->userdata('role_id');
        if($role == 4 || $role == 3)
        {
            $data['emp'] = 
        $data['users'] = $this->user_model->rows();
        $this->load->view('templates/admin_header');
        $this->load->view('user/index',$data);
        $this->load->view('templates/Footer');
        }
        elseif($role == 2)
        {
        $data['users'] = $this->user_model->rows();
        $this->load->view('templates/hr_header');
        $this->load->view('user/index',$data);
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
        $this->form_validation->set_rules('username', 'username',  'trim|required');
        $this->form_validation->set_rules('password', 'password',  'trim|required');
        $this->form_validation->set_rules('emp_id', 'emp_id',  'trim|required');

            if($this->form_validation->run())
            {
                $data = array (
                    'username'     => $this->input->post('username'),
                    'password'     => $this->input->post('password'),
                    'emp_id'     => $this->input->post('emp_id'),
                    'createdBy'      => $this->session->userdata('emp_id'),
                    'createdAt'  => date('y-m-d h:i:s')
                );

                $result = $this->user_model->add($data);
                $role = $this->session->userdata('role_id');
                if($result)
                {
                    $this->session->set_flashdata('msg', 'New User');
                    redirect('user');
                }
                else
                {
                    $this->session->set_flashdata('msg', 'New User creation failed');
                    redirect('User/add');
                }
            }
     
        }

    public function show($user_id)
    {
        $data['user'] = $this->user_model->row($user_id);
        $this->load->view('templates/admin_header');
        $this->load->view('user/edit',$data);
        $this->load->view('templates/Footer');
    }

    public function edit()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        
        if($this->form_validation->run()){

                     $user_id = $this->input->post('user_id');

                     $data = array(
                        'username'        =>  $this->input->post('username'),                     
                         'password'            =>  $this->input->post('password'),
                         'updatedBy'      => $this->session->userdata('emp_id'),
                         'updatedAt'  => date('y-m-d h:i:s')
                    );

                    $result = $this->user_model->edit($user_id, $data);
                    if($result)
                    {
                    $this->session->set_flashdata('msg', 'Selected user has been updated');
                    redirect('user');
                      }
                    else
                    {
                    $this->session->set_flashdata('msg', 'Selected user has been failed updated ');
                    redirect('User/show/'.$user_id);
                    }
                    
                }
    }

    public function delete($user_id)
    {
        $data = array
        (
            'user_id'        => $user_id,
            'is_deleted'     => 1,
            'deletedBy'      => $this->session->userdata('emp_id'),
            'deletedAt'      => date('y-m-d h:i:s')
        );
 
        $result = $this->user_model->delete($user_id, $data);
        $role = $this->session->userdata('role_id');
        if($result)
        {
        $this->session->set_flashdata('msg', 'Selected user has been updated');
        redirect('user');
          }
        else{
        $this->session->set_flashdata('msg', 'Selected user has been failed updated ');
        redirect('User/show/'. $user_id);
        }
    }
}