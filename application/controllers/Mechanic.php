<?php
class Mechanic extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mechanic_model');
		if (!$this->session->userdata('user'))
			redirect('login');
	}

	public function index()
	{
		$this->load->model('Mechanic_model');

		$data['mechanics'] = $this->Mechanic_model->get_all();

		if (empty($data['mechanics'])) {
			$this->session->set_flashdata('msg', 'No mechanics found.');
		}

		$this->load->view('templates/admin_header');
		$this->load->view('mechanic/index', $data);
		$this->load->view('templates/footer');
	}


	public function add()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'specialty' => $this->input->post('specialty')
		);
		$this->Mechanic_model->add($data);
		redirect('mechanic/index');
	}

	public function edit()
	{
    $id = $this->input->post('id');
		$data = array(
			'mechanic_id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'specialty' => $this->input->post('specialty')
		);
		$this->Mechanic_model->update($id, $data);
		redirect('mechanic/index');
	}

	public function delete($id)
	{
		$this->Mechanic_model->delete($id);
		redirect('mechanic/index');
	}
}
