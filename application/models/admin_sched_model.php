<?php
class admin_sched_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
        $this->table = 'illness';
    }

    public function rows()
    {
        $where = array(
            
        );
        $query = $this->db->get_where($this->table,$where);
        return $query->result();
    }
    public function row($ill_id)
    {
        $where = array(
            
            'ill_id'         =>$ill_id
        );
        $query = $this->db->get_where($this->table,$where);
        return $query->row();
    }
    public function add($data)
    {
       $this->db->insert($this->table, $data);
        return true;
    }
    public function edit($ill_id,$data)
    {
        $where = array(  
            'ill_id'         =>$ill_id
        );
        return $this->db->update($this->table,$data,$where);


    }


}