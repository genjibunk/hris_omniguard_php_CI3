<?php
class auth_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
       
    }

    public function information_employee_data()
    {

        $this->db->order_by('employee_data_id', 'DESC');
        $query = $this->db->get('employee_data');
        return $query->result_array();
        
    }

}
?>