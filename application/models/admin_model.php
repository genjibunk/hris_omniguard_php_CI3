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

}
?>