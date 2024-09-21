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
		$this->db->select('schedules.*, members.*'); // Select fields from both tables
		$this->db->from('schedules');
		$this->db->join('members', 'schedules.member_id = members.id', 'left'); // Join with members
		$this->db->group_by('schedules.id'); // Group by schedule ID to avoid duplicates
		$query = $this->db->get();

		$result = $query->result(); // Get the actual data
		$totalCount = $query->num_rows(); // Get the total count

		// Calculate totals for today and this week
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
		return $this->db->insert('Schedule', $data);
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
}
