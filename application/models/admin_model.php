<?php
class admin_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
       
    }

    public function information_employee_data()
    {

        $query = $this->db
        ->select('*')
        ->from('employee_data')
        ->join('userauth', 'employee_data.UserID = userauth.userauth_id', 'inner')
        ->order_by('employee_data.employee_data_id', 'DESC')
        ->get();

        return $query->result_array();
        
    }

    public function open_information_employee_data($id)
    {
        $query = $this->db
            ->select('*')
            ->from('employee_data')
            ->join('userauth', 'employee_data.UserID = userauth.userauth_id', 'inner')
            ->where('employee_data.employee_data_id', $id)
            ->order_by('employee_data.employee_data_id', 'DESC')
            ->get();

        return $query->row_array();
    }

    public function leavecredits()
    {

        $query = $this->db
        ->select('*')
        ->from('leavecredits')
        ->join('employee_data', 'leavecredits.employee_data_id = employee_data.employee_data_id', 'inner')
        ->order_by('employee_data.last_name', 'ASC')
        ->get();

        return $query->result_array();
        
    }

    public function leaverequest()
    {

        $query = $this->db
        ->select('a.*, b.employee_data_id, b.first_name, b.last_name, IFNULL(c.first_name, "") AS updated_by_first_name, IFNULL(c.last_name, "") AS updated_by_last_name')
        ->from('leaverequest a')
        ->join('employee_data b', 'a.lr_employee_data_id = b.employee_data_id', 'left')
        ->join('employee_data c', 'a.lr_updated_by = c.employee_data_id', 'left')
        ->order_by('b.last_name', 'ASC')
        ->get();

        return $query->result_array();

        
    }

    public function companies()
    {

        $query = $this->db
        ->select('*')
        ->from('companies')
        ->get();

        return $query->result_array();
        
    }

    public function clients($id)
    {

        $query = $this->db
            ->select('a.client_id, a.company_id, a.name, a.region, a.province, a.city, a.brgy, a.street, a.latitude, a.longitude, a.date_affiliate , a.created_at')
            ->from('clients a')
            ->join('companies b', 'b.company_id = a.company_id', 'inner')
            ->where('a.company_id', $id)
            ->order_by('a.name', 'ASC')
            ->get();

        return $query->result_array();

    }

    public function attendance()
    {

        $query = $this->db
            ->select('a.employee_data_id, MAX(b.first_name) AS first_name, MAX(b.last_name) AS last_name , photo')
            ->from('attendance a')
            ->join('employee_data b', 'a.employee_data_id = b.employee_data_id', 'inner')
            ->group_by('a.employee_data_id')
            ->order_by('b.first_name', 'ASC')
            ->get();

        return $query->result_array();

    }

    public function attendance_data($id)
    {
        $query = $this->db
            ->select('a.client_id, a.employee_data_id, c.last_name, c.first_name , a.punchin, a.punchout, a.attendance_status, a.status, a.remarks, b.name')
            ->from('attendance a')
            ->join('clients b', 'a.client_id = b.client_id', 'inner')
            ->join('employee_data c', 'a.employee_data_id = c.employee_data_id', 'inner')
            ->where('a.employee_data_id', $id)
            ->order_by('a.status', 'ASC')
            ->get();

        return $query->result_array();

    }

    public function search_employees($term)
    {

        $this->db->select('employee_data_id, first_name, last_name');
        $this->db->from('employee_data');
        $this->db->group_start();
        $this->db->like('first_name', $term);
        $this->db->or_like('last_name', $term);
        $this->db->group_end();
        $query = $this->db->get();

        return $query->result_array();

    }

    public function get_all_company()
    {

        $query = $this->db
            ->select('a.client_id, a.company_id, CONCAT(b.name, " - ", a.name) as companies')
            ->from('clients a')
            ->join('companies b', 'a.company_id = b.company_id', 'inner')
            ->get();

        return $query->result_array();

    }

    public function insert_schedule($data)
    {
        
        $this->db->where('employee_data_id', $data['employee_data_id']);
        $this->db->where('client_id', $data['client_id']);
        $this->db->where('date_from', $data['date_from']);
        $this->db->where('date_to', $data['date_to']);
        $query = $this->db->get('schedule');

        if ($query->num_rows() === 0) {
            
            return $this->db->insert('schedule', $data);
        } else {
            return false;
        }

    }

    public function schedule()
    {

        $query = $this->db
            ->select('a.schedule_id,a.client_id, 
            a.employee_data_id, 
            a.date_from, 
            a.date_to, 
            a.punchin, 
            a.punchout, 
            CONCAT(c.name, " - ", b.name) AS company, 
            d.first_name, 
            d.last_name')
            ->from('schedule a')
            ->join('clients b', 'b.client_id = a.client_id', 'inner')
            ->join('companies c', 'c.company_id = b.company_id', 'inner')
            ->join('employee_data d', 'd.employee_data_id = a.employee_data_id', 'inner')
            ->get();

        return $query->result_array();

    }

    public function accounts()
    {

        $query = $this->db
            ->select('b.* , concat(a.first_name, " " , a.last_name) AS name , a.position')
            ->from('employee_data a')
            ->join('userauth b', 'a.UserID = b.userauth_id', 'inner')
            ->order_by('b.userauth_id', 'ASC')
            ->get();

        return $query->result_array();

    }


}
?>