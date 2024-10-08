<?php
class Order_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
        $this->table = 'health';
    }

    public function rows()
    {
        $this->db->select('*');
        $this->db->from('health');
        $this->db->join('Order', 'Order.Or_id = Order.Or_id');
        $this->db->join('illness', 'illness.ill_id = health.ill_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function row($emp_id)
    {
        $where = array(
            'sch_id'         =>$sched_id
        );
        $query = $this->db->get_where($this->table,$where);
        return $query->row();
    }
    public function add($data)
    {
       $this->db->insert($this->table, $data);
        return true;
    }

    public function sicks()
    {
        $this->db->select('*');
        $this->db->from('Order');
        $this->db->join('Order', 'Order.Or_id = Order.Or_id');
        $this->db->join('Order', 'Order.Or_id = Order.Or_id');
        $this->db->where('health.is_sick = 1');
        $query = $this->db->get();
        return $query->result();
    }
    public function cure($Order_id,$data)
    {
        $where = array(
            'is_sick' =>1,
            'sch_id'         =>$Or_id
        );
        return $this->db->update($this->table,$data,$where);
    }

}