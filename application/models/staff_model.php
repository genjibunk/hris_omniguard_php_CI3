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

    return $query->row_array(); // ✅ Ensure you return the result
}



}
?>