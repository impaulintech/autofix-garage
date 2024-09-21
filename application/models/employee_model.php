<?php
class Employee_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
        $this->table = 'employee';
    }

    public function rows()
    {
        $where = array(
            'is_deleted' =>0
        );
        $query = $this->db->get_where($this->table,$where);
        return $query->result();
    }
    public function row($emp_id)
    {
        $where = array(
            'is_deleted' =>0,
            'emp_id'         =>$emp_id
        );
        $query = $this->db->get_where($this->table,$where);
        return $query->row();
    }
    
    public function sicks()
    {
        $this->db->select('*');
        $this->db->from('health');
        $this->db->join('employee', 'employee.emp_id = health.emp_id');
        $this->db->join('illness', 'illness.ill_id = health.ill_id');
        $this->db->where('health.is_sick = 1');
        $query = $this->db->get();
        return $query->result();
    }

    public function logs()
    {
        $where = array(
            
        );
        $query = $this->db->get_where($this->table,$where);
        return $query->result();
    }

    public function add($data)
    {
       $this->db->insert($this->table, $data);
        return true;
    }
    public function edit($emp_id,$data)
    {
        $where = array(
            'is_deleted' =>0,
            'emp_id'         =>$emp_id
        );
        return $this->db->update($this->table,$data,$where);
    }

    public function delete($emp_id,$data)
    {
        $where = array(
            'is_deleted' =>0,
            'emp_id'         =>$emp_id
        );
        return $this->db->update($this->table,$data,$where);
    }
    
}