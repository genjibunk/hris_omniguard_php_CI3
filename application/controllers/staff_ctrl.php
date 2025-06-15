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

        header('Content-Type: application/json');
        date_default_timezone_set('Asia/Manila');

        $employee_data_id = $this->session->userdata('userid');
        $client_id = $this->session->userdata('client_id');
        $action = $this->input->post('action');
        $current_datetime = date("Y-m-d H:i:s");

        if ($action === 'in') {
            $this->db->insert('attendance', [
                'client_id' => $client_id,
                'employee_data_id' => $employee_data_id,
                'punchin' => $current_datetime,
                'punchout' => '0000-00-00 00:00:00',
                'attendance_status' => 'No Punch out',
                'status' => '-',
                'created_at' => $current_datetime 
            ]);
            echo json_encode(['status' => 'success', 'message' => '✅ Punched in at ' . $current_datetime]);
        } elseif ($action === 'out') {
            $this->db->where('employee_data_id', $employee_data_id);
            $this->db->where('DATE(created_at)', date('Y-m-d'));
            $this->db->order_by('attendance_id', 'desc');
            $this->db->limit(1);
            $this->db->update('attendance', [
                'punchout' => $current_datetime,
                'attendance_status' => 'Punched Out',
                'status' => 'For Approval'
            ]);
            echo json_encode(['status' => 'success', 'message' => '✅ Punched out at ' . $current_datetime]);
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

        if (!$record || empty($record->punchin) || $record->punchin === '0000-00-00 00:00:00') {
            echo json_encode(['status' => 'punchin']); // Show Punch In
        } elseif ($record->punchout === '0000-00-00 00:00:00' || empty($record->punchout)) {
            echo json_encode(['status' => 'punchout']); // Show Punch Out
        } else {
            // Reset for next punch cycle (if needed in future)
            echo json_encode(['status' => 'punchin']); // Start again from Punch In
        }
    }

    public function goto_home()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
			$this->load->view('auth/signin');
			return;
		}

        $id = $this->session->userdata('userid');

		$data['open_information_employee_data'] = $this->staff_model->open_information_employee_data($id);
        $data['punchinout'] = $this->staff_model->punchinout($id);

		$this->load->view('components/topbar',$data);
		$this->load->view('staff/home');
		$this->load->view('components/footer');
	}

    public function attendance()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
			$this->load->view('auth/signin');
			return;
		}

        $id = $this->session->userdata('userid');

		$data['open_information_employee_data'] = $this->staff_model->open_information_employee_data($id);
        $data['attendance'] = $this->staff_model->attendance($id);
        $data['punchinout'] = $this->staff_model->punchinout($id);

		$this->load->view('components/topbar',$data);
		$this->load->view('staff/attendance', $data);
		$this->load->view('components/footer');

    
	}

    public function schedule()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
			$this->load->view('auth/signin');
			return;
		}

        $id = $this->session->userdata('userid');

		$data['open_information_employee_data'] = $this->staff_model->open_information_employee_data($id);
        $data['schedule'] = $this->staff_model->schedule($id);
        $data['punchinout'] = $this->staff_model->punchinout($id);

		$this->load->view('components/topbar',$data);
		$this->load->view('staff/schedule', $data);
		$this->load->view('components/footer');

    
	}

    public function leave_request()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
			$this->load->view('auth/signin');
			return;
		}

        $id = $this->session->userdata('userid');

		$data['open_information_employee_data'] = $this->staff_model->open_information_employee_data($id);
        $data['leaverequest'] = $this->staff_model->leave_request($id);
        $data['punchinout'] = $this->staff_model->punchinout($id);

		$this->load->view('components/topbar',$data);
		$this->load->view('staff/leave_request', $data);
		$this->load->view('components/footer');

    
	}

    public function delete_leaverequest()

    {
        $id = $this->input->post('leaverequest_id');
        if ($this->staff_model->delete_leaverequest($id)) {
            $this->session->set_flashdata('success', 'Leave request deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete leave request.');
        }
        redirect('stokenreq_m4tz');
    }

    public function add_leaverequest()
    {
        if (!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
			$this->load->view('auth/signin');
			return;
		}

        $data = [
            'employee_data_id' => $this->input->post('employee_data_id'),
            'leavetype'        => $this->input->post('leavetype'),
            'date_from'        => $this->input->post('date_from'),
            'date_to'          => $this->input->post('date_to'),
            'total'            => $this->input->post('total'),
            'created_at'       => date('Y-m-d H:i:s')
        ];

        $this->db->insert('leaverequest', $data);
        $this->session->set_flashdata('success', 'New leave request submitted.');
        redirect('stokenreq_m4tz');
        
    }


    public function insert_leave_request()

    {

        if (!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
			$this->load->view('auth/signin');
			return;
		}
        $data = [
            'lr_employee_data_id'  => $this->session->userdata('userid'),
            'leavetype'         => $this->input->post('leave_type'),
            'date_from'         => $this->input->post('leave_date_from'),
            'date_to'           => $this->input->post('leave_date_to'),
            'total'             => $this->input->post('total_days')
        ];

        $this->db->insert('leaverequest', $data);

        $this->session->set_flashdata('success', 'Leave request submitted successfully.');
        redirect('stokenreq_m4tz');

    }

    public function profile()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
			$this->load->view('auth/signin');
			return;
		}

        $id = $this->session->userdata('userid');

		$data['open_information_employee_data'] = $this->staff_model->open_information_employee_data($id);
        $data['punchinout'] = $this->staff_model->punchinout($id);

		$this->load->view('components/topbar',$data);
		$this->load->view('staff/profile', $data);
		$this->load->view('components/footer');

    
	}

    public function update_employee()
	{
		if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

		$id = $this->input->post('employee_id');

		$this->db->select('photo');
		$this->db->where('employee_data_id', $id);
		$employee = $this->db->get('employee_data')->row();

		function random_string($length = 6) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		$randomStr = random_string();

		$config['upload_path'] = './uploads/photos/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size'] = 10240;
		$config['overwrite'] = true;
		$config['file_name'] = 'employee_'.$randomStr.$id.$randomStr;

		$this->load->library('upload', $config);

		$data = [
			'age' => $this->input->post('age-display'),
			'contact_number' => $this->input->post('contact_number'),
			'marital_status' => $this->input->post('marital_status'),
			'spouse_name' => $this->input->post('spouse_name'),
			'date_hired' => $this->input->post('date_hired'),
			'region' => $this->input->post('region_name'),
			'province' => $this->input->post('province_name'),
			'city' => $this->input->post('city_name'),
			'brgy' => $this->input->post('barangay_name'),
			'street' => $this->input->post('Street'),
		];

		if (!empty($_FILES['photo']['name'])) {

			if (!empty($employee->photo)) {
				$old_file = FCPATH . 'uploads/photos/' . $employee->photo;
				if (file_exists($old_file)) {
					unlink($old_file);
				}
			}

			if ($this->upload->do_upload('photo')) {
				$upload_data = $this->upload->data();
				$data['photo'] = $upload_data['file_name'];
			} else {
				$this->session->set_flashdata('error', 'Photo upload failed: ' . $this->upload->display_errors());
				redirect('info_a7xk');
				return;
			}
		}

		$this->db->where('employee_data_id', $id);
		$updated = $this->db->update('employee_data', $data);

		if ($updated) {
			$this->session->set_flashdata('success', 'Employee updated successfully!');
		} else {
			$this->session->set_flashdata('error', 'Failed to update employee.');
		}

		redirect('sopen_z3bt');
	}

    public function payslip()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
			$this->load->view('auth/signin');
			return;
		}

        $id = $this->session->userdata('userid');

		$data['open_information_employee_data'] = $this->staff_model->open_information_employee_data($id);
        $data['punchinout'] = $this->staff_model->punchinout($id);

		$this->load->view('components/topbar',$data);
		$this->load->view('staff/payslip');
		$this->load->view('components/footer');

    
	}












}
