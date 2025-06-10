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

}
?>