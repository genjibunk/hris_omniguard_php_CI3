<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class staff_ctrl extends CI_Controller {

    public function __construct() 
	{
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
		$this->load->database();         
            
    }

	public function record_attendance()
    {

        if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

        header('Content-Type: application/json'); // Ensures JSON response
        date_default_timezone_set('Asia/Manila');

        $employee_data_id = $this->session->userdata('userid');
        $client_id = $this->session->userdata('client_id');
        $action = $this->input->post('action');
        $current_time = date("H:i:s");

        if ($action === 'in') {
            $this->db->insert('attendance', [
                'client_id' => $client_id,
                'employee_data_id' => $employee_data_id,
                'punchin' => $current_time,
                'punchout' => '00:00:00',
                'attendance_status' => 'No Punch out',
                'status' => '-'
            ]);
            echo json_encode(['status' => 'success', 'message' => '✅ Punched in at ' . $current_time]);
        } elseif ($action === 'out') {
            $this->db->where('employee_data_id', $employee_data_id);
            $this->db->where('DATE(created_at)', date('Y-m-d'));
            $this->db->order_by('attendance_id', 'desc');
            $this->db->limit(1);
            $this->db->update('attendance', [
                'punchout' => $current_time,
                'attendance_status' => 'Punched Out',
                'status' => 'For Approval'
            ]);
            echo json_encode(['status' => 'success', 'message' => '✅ Punched out at ' . $current_time]);
        } else {
            echo json_encode(['status' => 'error', 'message' => '❌ Invalid action']);
        }
    }

    public function check_punch_status()
    {
        if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}
        
        header('Content-Type: application/json');
        $employee_data_id = $this->session->userdata('userid');

        // Get the latest attendance record
        $this->db->where('employee_data_id', $employee_data_id);
        $this->db->order_by('attendance_id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('attendance');
        $record = $query->row();

        if (!$record || empty($record->punchin) || $record->punchin === '00:00:00') {
            echo json_encode(['status' => 'punchin']); // Show Punch In
        } elseif ($record->punchout === '00:00:00' || empty($record->punchout)) {
            echo json_encode(['status' => 'punchout']); // Show Punch Out
        } else {
            // Reset for next punch cycle (if needed in future)
            echo json_encode(['status' => 'punchin']); // Start again from Punch In
        }
    }








}
