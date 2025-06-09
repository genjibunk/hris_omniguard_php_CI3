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
		$this->load->helper('string');
		$this->load->library(['session', 'upload']);

		// Start transaction
		$this->db->trans_start();

		// Gather userauth data
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
			'created_at' => date('Y-m-d H:i:s')
		];

		$this->db->insert('userauth', $userauth_data);
		$userauth_id = $this->db->insert_id();

		// Handle photo upload
		$photoName = '';
		if (!empty($_FILES['photo']['name'])) {
			$config['upload_path']   = './uploads/photos/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size']      = 2048;
			$config['file_name']     = uniqid('emp_');

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('photo')) {
				// Upload failed — rollback and exit
				$this->db->trans_rollback();
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('info_a7xk');
				return;
			}

			$photoName = $this->upload->data('file_name');
		}

		// Prepare employee_data
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
			'region'          => $this->input->post('region'),
			'province'        => $this->input->post('province'),
			'city'            => $this->input->post('city'),
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


}
