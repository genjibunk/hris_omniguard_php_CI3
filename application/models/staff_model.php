<?php
class staff_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
       
    }

    public function get_location_by_user_id($user_id)
    {
        $this->db->select('schedule.client_id, schedule.date_from, schedule.date_to, schedule.employee_data_id, clients.name, clients.latitude, clients.longitude');
        $this->db->from('schedule');
        $this->db->join('clients', 'schedule.client_id = clients.client_id');
        $this->db->where('CURDATE() BETWEEN schedule.date_from AND schedule.date_to', null, false);
        $this->db->where('schedule.employee_data_id', $user_id);
        $query = $this->db->get();

        return $query->row_array();
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

    public function attendance($id)
    {
        $query = $this->db
            ->select('a.attendance_id, a.employee_data_id, a.client_id , a.punchin, a.punchout, a.attendance_status, a.status, a.remarks, b.name AS clientname , c.name AS companyname , concat(d.first_name ," , ", d.last_name) AS employeename')
            ->from('attendance a')
            ->join('clients b', 'b.client_id = a.client_id', 'inner')
            ->join('companies c', 'c.company_id = b.company_id', 'inner')
            ->join('employee_data d', 'd.employee_data_id = a.employee_data_id', 'inner')
            ->where('a.employee_data_id', $id)
            ->order_by('a.attendance_id', 'DESC')
            ->get();

        return $query->result_array();
    }




}
?>