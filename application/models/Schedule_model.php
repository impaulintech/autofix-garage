<?php
class Schedule_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'health';
	}

	public function getAllSchedules()
	{
		$this->db->select('schedules.id AS schedule_id, schedules.*, members.*');
		$this->db->from('schedules');
		$this->db->join('members', 'schedules.user_id = members.id', 'left');
		$this->db->group_by('schedules.id');
		$query = $this->db->get();

		if (!$query) {
			$error = $this->db->error();
			log_message('error', 'Database error: ' . print_r($error, true));
		}

		$result = $query->result();
		log_message('info', print_r($result, true));

		$totalCount = $query->num_rows();
		$totalToday = $this->getSchedulesForToday();
		$totalThisWeek = $this->getSchedulesForWeek();

		return [
			'data' => $result,
			'total' => $totalCount,
			'totalToday' => $totalToday,
			'totalThisWeek' => $totalThisWeek,
		];
	}



	public function getSchedulesForToday()
	{
		$this->db->where('DATE(date_from)', date('Y-m-d'));
		return $this->db->count_all_results('schedules');
	}

	public function getSchedulesForWeek()
	{
		$this->db->where('DATE(date_from) >= CURDATE() - INTERVAL WEEKDAY(CURDATE()) DAY');
		$this->db->where('DATE(date_to) <= CURDATE() + INTERVAL (6 - WEEKDAY(CURDATE())) DAY');
		return $this->db->count_all_results('schedules');
	}


	public function getSchedule($sch_id)
	{
		$this->db->where('sch_id', $sch_id);
		$query = $this->db->get('Schedule');
		return $query->row();
	}

	public function addSchedule($data)
	{
		return $this->db->insert('schedules', $data);
	}

	public function getSickSchedules()
	{
		$this->db->select('Schedule.sch_id, Schedule.fname, Schedule.lname, Schedule.mname, Schedule.address, Schedule.contact');
		$this->db->from('Schedule');
		$this->db->join('health', 'health.sch_id = Schedule.sch_id');
		$this->db->where('health.is_sick', 1);
		$query = $this->db->get();
		return $query->result();
	}

	public function updateCure($sch_id, $data)
	{
		$this->db->where('sch_id', $sch_id);
		return $this->db->update('health', $data);
	}

	public function getMemberIdByUserId($user_id)
	{
		$this->db->select('id');
		$this->db->from('members');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row()->id;
		}

		return null;
	}

	public function updateScheduleStatus($schedule_id, $data)
	{
		$this->db->where('id', $schedule_id);
		return $this->db->update('schedules', $data);
	}
}
