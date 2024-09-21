<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScheduleApi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Schedule_model');
    }

    public function index()
    {
        // Call the model's getAllSchedules method
        $schedules = $this->Schedule_model->getAllSchedules();

        // Set the response format
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($schedules));
    }
}
