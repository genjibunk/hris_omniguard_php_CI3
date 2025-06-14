<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_ctrl extends CI_Controller {

    public function __construct() 
	{
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();         
            
    }

	public function information()
	{
        if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

        $data['information'] = $this->admin_model->information_employee_data();

		$this->load->view ('components/navbar');
		$this->load->view ('admin/information', $data);
		$this->load->view ('components/footer');
	}

    public function view_add_information()
	{
        if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

		$this->load->view ('components/navbar');
		$this->load->view ('admin/add_information');
		$this->load->view ('components/footer');
	}

	public function add_employee()
	{
		if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

		$this->load->helper('string');
		$this->load->library(['session', 'upload']);

		$this->db->trans_start();

		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$full_username = strtolower($first_name . '.' . $last_name);
		$password = password_hash('12345', PASSWORD_DEFAULT);
		$user_code = random_string('alnum', 8);
		$position = $this->input->post('position');

		$userauth_data = [
			'user_code' => $user_code,
			'username' => $full_username,
			'password_hash' => $password,
			'role' => $position,
			'role' => 'Inactive',
			'created_at' => date('Y-m-d H:i:s')
		];

		$this->db->insert('userauth', $userauth_data);
		$userauth_id = $this->db->insert_id();


		$photoName = '';
		if (!empty($_FILES['photo']['name'])) {
			$config['upload_path']   = './uploads/photos/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size']      = 2048;
			$config['file_name']     = uniqid('emp_');

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('photo')) {

				$this->db->trans_rollback();
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('info_a7xk');
				return;
			}

			$photoName = $this->upload->data('file_name');
		}

		$employee_data = [
			'first_name'      => $first_name,
			'middle_name'     => $this->input->post('middle_name'),
			'last_name'       => $last_name,
			'gender'          => $this->input->post('gender'),
			'age'             => $this->input->post('age-display'),
			'contact_number'  => $this->input->post('contact_number'),
			'marital_status'  => $this->input->post('marital_status'),
			'spouse_name'     => $this->input->post('spouse_name'),
			'date_hired'      => $this->input->post('date_hired'),
			'date_resigned'   => $this->input->post('date_resigned'),
			'position'        => $position,
			'region'          => $this->input->post('region_name'),
			'province'        => $this->input->post('province_name'),
			'city'            => $this->input->post('city_name'),
			'brgy'            => $this->input->post('barangay_name'),
			'street'          => $this->input->post('Street'),
			'UserID'          => $userauth_id,
			'photo'           => $photoName
		];

		$this->db->insert('employee_data', $employee_data);

		
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			
			$this->session->set_flashdata('error', 'Failed to add employee. Please try again.');
		} else {
			
			$this->session->set_flashdata('success', 'Employee and user credentials successfully created.');
		}

		redirect('info_a7xk');
		
	}

	public function open_information($encrypted_employee_data_id)
	{
        if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

		$decoded_employee_data_id = base64_decode($encrypted_employee_data_id);
        $id = $this->encryption->decrypt($decoded_employee_data_id);
		
		$data['open_information_employee_data'] = $this->admin_model->open_information_employee_data($id);
		$data['encrypted_employee_data_id'] = $id;

		$this->load->view ('components/navbar');
		$this->load->view ('admin/open_information', $data);
		$this->load->view ('components/footer');
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
			'position' => $this->input->post('position'),
			'first_name' => $this->input->post('first_name'),
			'middle_name' => $this->input->post('middle_name'),
			'last_name' => $this->input->post('last_name'),
			'gender' => $this->input->post('gender'),
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

		redirect('info_a7xk');
	}

	public function leavecredits()
	{
        if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

		$data['leavecredits'] = $this->admin_model->leavecredits();

		$this->load->view ('components/navbar');
		$this->load->view ('admin/leave_credits', $data);
		$this->load->view ('components/footer');
	}

	public function insert_leavecredits_for_all()
	{
		if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

		$description = $this->input->post('description');
		$year = $this->input->post('year');

		switch ($description) {
			case 'Service Incentive Leave (SIL)':
				$total = 5;
				break;
			case 'Sick Leave':
			case 'Vacation Leave':
				$total = 15;
				break;
			default:
				$total = 0;
		}

		$inserted = 0;
		$skipped = 0;

		$employees = $this->db->select('employee_data_id')->get('employee_data')->result();

		foreach ($employees as $emp) {
			$exists = $this->db->get_where('leavecredits', [
				'employee_data_id' => $emp->employee_data_id,
				'description' => $description,
				'year' => $year
			])->row();

			if (!$exists) {
				$this->db->insert('leavecredits', [
					'employee_data_id' => $emp->employee_data_id,
					'description' => $description,
					'year' => $year,
					'total' => $total
				]);
				$inserted++;
			} else {
				$skipped++;
			}
		}

		if ($inserted > 0) {
			$this->session->set_flashdata('success', "$inserted leave credits added.");
		}
		if ($skipped > 0) {
			$this->session->set_flashdata('warning', "$skipped duplicate entries were skipped.");
		}

		redirect('token_m4tz');
	}

	public function update_or_delete()
	{
		if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

		$employee_id = $this->input->post('employee_data_id');
		$description = $this->input->post('description');
		$total = $this->input->post('total');
		$year = $this->input->post('year');
		$action = $this->input->post('action');

		if ($action === 'update') {
			$this->db->where([
				'employee_data_id' => $employee_id,
				'description' => $description,
				'year' => $year
			])->update('leavecredits', ['total' => $total]);

			$this->session->set_flashdata('success', 'Leave credit updated.');
		} elseif ($action === 'delete') {
			$this->db->where([
				'employee_data_id' => $employee_id,
				'description' => $description,
				'year' => $year
			])->delete('leavecredits');

			$this->session->set_flashdata('success', 'Leave credit deleted.');
		}

		redirect('token_m4tz');
	}

	public function leaverequest()
	{
        if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

		$data['leaverequest'] = $this->admin_model->leaverequest();

		$this->load->view ('components/navbar');
		$this->load->view ('admin/leave_request', $data);
		$this->load->view ('components/footer');
	}

	public function leaverequest_status() 
	{
		if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

		$request_id = $this->input->post('request_id');
		$employee_id = $this->input->post('employee_id');
		$leave_type = $this->input->post('leave_type');
		$total_to_deduct = $this->input->post('total');
		$action = $this->input->post('action'); 
		$decline_comment = $this->input->post('decline_comment');
		$updated_by = $this->session->userdata('userid');

		$current_year = date('Y');

		if ($action === 'approve') {
			
			$this->db->where('leaverequest_id', $request_id);
			$this->db->update('leaverequest', [
				'status' => 'Approved',
				'lr_updated_by' => $updated_by,
				'remarks' => 'None',
			]);

			$this->db->set('total', "total - {$total_to_deduct}", false);
			$this->db->where('employee_data_id', $employee_id);
			$this->db->where('description', $leave_type);
			$this->db->where('year', $current_year);
			$this->db->update('leavecredits');

			$this->session->set_flashdata('success', 'Leave approved and credits updated.');
		} elseif ($action === 'decline') {
			
			$this->db->where('leaverequest_id', $request_id);
			$this->db->update('leaverequest', [
				'status' => 'Declined',
				'lr_updated_by' => $updated_by,
				'remarks' => $decline_comment,
			]);

			$this->session->set_flashdata('warning', 'Leave request declined.');
		} else {
			$this->session->set_flashdata('error', 'Invalid action specified.');
		}

		redirect('tokenreq_m4tz');
	}

	public function companies()
	{
        if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

		$data['companies'] = $this->admin_model->companies();

		$this->load->view ('components/navbar');
		$this->load->view ('admin/companies', $data);
		$this->load->view ('components/footer');
	}

	public function add_company()
	{
		if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

		$data = [
			'name' => $this->input->post('name'),
			'region'          => $this->input->post('region_name'),
			'province'        => $this->input->post('province_name'),
			'city'            => $this->input->post('city_name'),
			'brgy'            => $this->input->post('barangay_name'),
			'street'            => $this->input->post('Street'),
			'date_affiliate' => $this->input->post('date_affiliate'),
			'created_at' => date('Y-m-d H:i:s'),
		];

		$this->db->insert('companies', $data);
		$this->session->set_flashdata('success', 'Company added successfully!');
		redirect('cmpy_k5hc');
	}

	public function update_company()
	{
		if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}
		
		$id = $this->input->post('id');
		$data = [
			'name' => $this->input->post('name'),
			'date_affiliate' => $this->input->post('date_affiliate'),
			'region' => $this->input->post('region'),
			'province' => $this->input->post('province'),
			'city' => $this->input->post('city'),
			'brgy' => $this->input->post('brgy'),
			'street' => $this->input->post('street'),
		];

		$this->db->where('company_id', $id);
		$this->db->update('companies', $data);

		$this->session->set_flashdata('success', 'Company updated successfully.');
		redirect('cmpy_k5hc');
	}

	public function clients($CID)
	{
        if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

		$decoded_CID = base64_decode($CID);
        $id = $this->encryption->decrypt($decoded_CID);

		$data['clients'] = $this->admin_model->clients($id);
		$data['client_id'] = $id;

		$this->load->view ('components/navbar');
		$this->load->view ('admin/clients',$data);
		$this->load->view ('components/footer');
	}

	public function insert_client()
	{
		if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

		$clients_data = [
			'company_id' => $this->input->post('company_id'),
			'name' => $this->input->post('name'),
			'region' => $this->input->post('region_name'),
			'province' => $this->input->post('province_name'),
			'city' => $this->input->post('city_name'),
			'brgy' => $this->input->post('barangay_name'),
			'street' => $this->input->post('Street'),
			'latitude' => $this->input->post('latitude'),
			'longitude' => $this->input->post('longitude'),
			'date_affiliate' => $this->input->post('date_affiliate')
		];

		$this->db->insert('clients', $clients_data);
		$this->session->set_flashdata('success', 'Company added successfully!');
		redirect('cmpy_k5hc');

	}

	public function attendance()
	{
        if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

		$data['attendance'] = $this->admin_model->attendance();

		$this->load->view ('components/navbar');
		$this->load->view ('admin/attendance', $data);
		$this->load->view ('components/footer');
	}

	public function attendance_data($encrypted_employee_data_id)
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
			$this->load->view('auth/signin');
			return;
		}

		$decoded_id = base64_decode($encrypted_employee_data_id);
		$id = $this->encryption->decrypt($decoded_id);

		$data['attendance_data'] = $this->admin_model->attendance_data($id);

		$this->load->view('components/navbar');
		$this->load->view('admin/attendance_data', $data);
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

		$data['schedule'] = $this->admin_model->schedule();

		$this->load->view('components/navbar');
		$this->load->view('admin/schedule', $data);
		$this->load->view('components/footer');
	}

	public function search_employees()
	{
		if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

		$term = $this->input->post('term');

		$results = $this->admin_model->search_employees($term);

		$formatted_results = [];

		foreach ($results as $row) {
			$formatted_results[] = [
				'employee_data_id' => $row['employee_data_id'],
				'full_name' => $row['first_name'] . ' ' . $row['last_name']
			];
		}

		echo json_encode($formatted_results);
	}
	public function load_company()
	{
		if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}
		
		$results = $this->admin_model->get_all_company();

		$formatted_results = [];

		foreach ($results as $row) {
			$formatted_results[] = [
				'client_id' => $row['client_id'],
				'full_name' => $row['companies']
			];
		}

		echo json_encode($formatted_results);
	}

	public function save_schedule()
	{
		if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

		$client_id = $this->input->post('client_id');
		$employee_ids = $this->input->post('employee_ids');
		$date_from = $this->input->post('schedule_date_from');
		$date_to = $this->input->post('schedule_date_to');
		$time_in = $this->input->post('schedule_time_in');
		$time_out = $this->input->post('schedule_time_out');

		$this->db->trans_start();

		$inserted = 0;
		$skipped = 0;

		foreach ($employee_ids as $employee_id) {
			$data = [
				'client_id' => $client_id,
				'employee_data_id' => $employee_id,
				'date_from' => $date_from,
				'date_to' => $date_to,
				'punchin' => $time_in,
				'punchout' => $time_out,
			];

			if ($this->admin_model->insert_schedule($data)) {
				$inserted++;
			} else {
				$skipped++;
			}
		}

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata('error', 'Failed to save schedule. Please try again.');
		} else {
			if ($inserted > 0) {
				$this->session->set_flashdata('success', "$inserted schedule(s) saved.");
			}
			if ($skipped > 0) {
				$this->session->set_flashdata('warning', "$skipped duplicate(s) skipped.");
			}
		}

		redirect('roster_k0jb');
	}


	public function delete_schedule()
	{
		if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

		$schedule_id = $this->input->post('schedule_id');
		$this->db->where('schedule_id', $schedule_id);
		$deleted = $this->db->delete('schedule');


		if ($deleted) {
        $this->session->set_flashdata('success', 'Schedule deleted successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to delete schedule.');
		}

		redirect('roster_k0jb');
	}

	public function accounts()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
			$this->load->view('auth/signin');
			return;
		}

		$data['accounts'] = $this->admin_model->accounts();

		$this->load->view('components/navbar');
		$this->load->view('admin/accounts', $data);
		$this->load->view('components/footer');
	}

	public function update_auth() 
	{
		$id     = $this->input->post('userauth_id');
		$role   = $this->input->post('role');
		$status = $this->input->post('status');

		$this->db->where('userauth_id', $id);
		$this->db->update('userauth', [
			'role'   => $role,
			'status' => $status
		]);

		$this->session->set_flashdata('success', 'User updated successfully.');
		redirect('accounts_j8vq');
	}




}
