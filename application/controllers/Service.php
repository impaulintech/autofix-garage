<?php
class Service extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('service_model');
		if (!$this->session->userdata('user'))
			redirect('login');
	}

	public function index()
	{
		$data['services'] = $this->service_model->get_all();
		$this->load->view('templates/admin_header');
		$this->load->view('service/index', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$this->form_validation->set_rules('name', 'Service Name', 'trim|required|is_unique[services.name]');
		$this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');

		if ($this->form_validation->run()) {
			$data = [
				'name' => $this->input->post('name'),
				'price' => $this->input->post('price'),
			];
			$result = $this->service_model->add($data);
			if ($result) {
				$this->session->set_flashdata('msg', 'New service added.');
				redirect('service');
			} else {
				$this->session->set_flashdata('msg', 'Failed to add service.');
				redirect('service/add');
			}
		}

		$this->load->view('templates/admin_header');
		$this->load->view('service/add');
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		$id = $this->input->post('id');
		$this->form_validation->set_rules('name', 'Service Name', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');

		if ($this->form_validation->run()) {
			$data = [
				'name' => $this->input->post('name'),
				'price' => $this->input->post('price'),
			];
			$result = $this->service_model->update($id, $data);
			if ($result) {
				$this->session->set_flashdata('msg', 'Service updated.');
				redirect('service');
			} else {
				$this->session->set_flashdata('msg', 'Update failed.');
				redirect('service/edit/' . $id);
			}
		}

		$data['service'] = $this->service_model->get($id);
		$this->load->view('templates/admin_header');
		$this->load->view('service/edit', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id)
	{
		$result = $this->service_model->delete($id);
		if ($result) {
			$this->session->set_flashdata('msg', 'Service deleted.');
		} else {
			$this->session->set_flashdata('msg', 'Failed to delete service.');
		}
		redirect('service');
	}
	public function get_services()
	{
		$this->load->model('Service_model');
		$services = $this->Service_model->get_all_services();
		echo json_encode($services);
	}
}
