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

		// Complete transaction
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			// Something failed, rollback
			$this->session->set_flashdata('error', 'Failed to add employee. Please try again.');
		} else {
			// Success
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

}
