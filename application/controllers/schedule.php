    <?php
class schedule extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Schedule_model');
        if(!$this->session->userdata('user'))
        redirect('login');
    }



    /* san nyo ba nilagay */
    

    public function index()
    {
        $data['Schedule'] = $this->Schedule_model->rows();
         $this->load->view('templates/admin_header');
         $this->load->view('Schedule/index',$data);
         $this->load->view('templates/Footer'); 
        //$sch = $this->session->userdata('sch_id');
        //if($sch == 4 || $sch == 3)
        //{
        //$data['Schedule'] = $this->Schedule_model->rows();
        //$this->load->view('templates/admin_header');
        //$this->load->view('Schedule/index',$data);
        //$this->load->view('templates/Footer');
        //}
        //elseif($role == 2)
        //{
        //$data['Schedule'] = $this->Schedule_model->rows();
        //$this->load->view('templates/hr_header');
        //$this->load->view('Schedule/index',$data);
        //$this->load->view('templates/Footer');
        //} 
        //else
        //{
        //$this->session->sess_destroy();
        //redirect('login');
        //}
    }
    public function add()
    {
        $this->form_validation->set_rules('role_id', 'role_id', 'trim|required');
        $this->form_validation->set_rules('fname', 'First Name',  'trim|required');
        $this->form_validation->set_rules('address', 'address',  'trim|required');
        $this->form_validation->set_rules('lname',  'Last Name',   'trim|required');
        $this->form_validation->set_rules('contact',    'contact',    'trim|required|is_unique[employee.contact]');

            if($this->form_validation->run())
            {
                $data = array (
                    'role_id'        => $this->input->post('role_id'),
                    'fname'          => $this->input->post('fname'),
                    'mname'          => $this->input->post('mname'),
                    'lname'          => $this->input->post('lname'),
                    'address'        => $this->input->post('address'),
                    'email'        => $this->input->post('email'),
                    'contact'        => $this->input->post('contact'),
                    'createdBy'      => $this->session->userdata('Sch_id'),
                    'createdAt'      => date('y-m-d h:i:s')                   
                );

                $result = $this->employee_model->add($data);
                if($result)
                {
                    $this->session->set_flashdata('msg', 'New employee has been updated');
                    redirect('Schedule');
                }
                else
                {
                    $this->session->set_flashdata('msg', 'New employee creation failed');
                    redirect('Schedule/add');
                }
            }
     
        }

    public function show($emp_id)
    {
        $data['Schedule'] = $this->Schedule_model->row($emp_id);
        $this->load->view('templates/admin_header');
        $this->load->view('Schedule/edit', $data);
        $this->load->view('templates/Footer');
    }

    public function edit()
    {
        $this->form_validation->set_rules('role_id', 'role_id', 'trim|required');
        $this->form_validation->set_rules('lname', 'lname', 'trim|required');
        $this->form_validation->set_rules('fname', 'fname', 'trim|required');
        $this->form_validation->set_rules('mname', 'mname', 'trim|required');
        $this->form_validation->set_rules('address', 'address', 'trim|required');      
        $this->form_validation->set_rules('contact', 'contact', 'trim|required');

        
        if($this->form_validation->run())
        {

                     $Sche_id = $this->input->post('sch_id');

                     $data = array(
                        'Sch_id'        =>  $this->input->post('sch_id'),
                         'lname'            =>  $this->input->post('lname'),
                         'fname'            =>  $this->input->post('fname'),
                         'mname'          =>  $this->input->post('mname'),
                         'address'           =>  $this->input->post('address'),       
                         'email'           =>  $this->input->post('email'),                   
                         'contact'            =>  $this->input->post('contact'),
                         'updatedBy'      =>$this->session->userdata('emp_id'),
                         'updatedAt'      => date('y-m-d h:i:s')
                    );

                    $result = $this->Schedule_model->edit($Sch_id, $data);
                    if($result){
                    $this->session->set_flashdata('msg', 'Selected user has been updated');
                    redirect('schedule');
                      }
                    else{
                    $this->session->set_flashdata('msg', 'Selected user has been failed updated ');
                    redirect('Schedule/show/'.$emp_id);
                    }
                    
                }
    }

    public function delete($Sch_id)
    {
        $data = array
        (
            'emp_id'         => $emp_id,
            'is_deleted'     => 1,
            'deletedBy'      =>$this->session->userdata('Sch_id'),
            'deletedAt'      => date('y-m-d h:i:s')
        );
 
        $result = $this->Schedule_model->delete($sch_id, $data);
        if($result)
        {
        $this->session->set_flashdata('msg', 'Selected user has been updated');
        redirect('employee');
          }
        else{
        $this->session->set_flashdata('msg', 'Selected user has been failed updated ');
        redirect('Schedule/show/'. $sch_id);
        }
    }
}
