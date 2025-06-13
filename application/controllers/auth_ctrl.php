<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth_ctrl extends CI_Controller {

	public function __construct() 
	{
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
		$this->load->database();         
            
    }

	public function signin()
    {

		$this->session->sess_destroy();
		

        $this->load->view('auth/signin');

		

    }

	// public function do_signin()
	// {
	// 	$username = $this->input->post('username');
	// 	$password = $this->input->post('password');

	// 	if ($username === 'admin' && $password === 'admin123') 

	// 	{
	// 		$sessionData = [
	// 			'logged_in' => true,
	// 			'userid'    => 1,
	// 			'username'  => $username,
	// 		];

	// 		$this->session->set_flashdata('success', 'Welcome back, ' . $username . '!');
	// 		$this->session->set_userdata($sessionData);

	// 		$this->load->view ('components/navbar');
	// 		$this->load->view ('admin/home');
	// 		$this->load->view ('components/footer');
	// 	}

	// 	else if($username === 'staff' && $password === 'staff123')

	// 	{
	// 		$sessionData = [
	// 			'logged_in' => true,
	// 			'userid'    => 1,
	// 			'username'  => $username,
	// 		];

	// 		$this->session->set_flashdata('success', 'Welcome back, ' . $username . '!');
	// 		$this->session->set_userdata($sessionData);

	// 		$this->load->view ('staff/home');
	// 		$this->load->view ('components/footer');
	// 	} 

	// 	else

	// 	{
	// 		$this->session->set_flashdata('error', 'Invalid credentials');
	// 		$this->load->view('auth/signin');
	// 	}
	// }

	public function do_signin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->db->where('username', $username);
		$query = $this->db->get('userauth');

		if ($query->num_rows() === 1) {
			$user = $query->row();

			if (password_verify($password, $user->password_hash)) {
				if ($user->status === 'Active') {

					$sessionData = [
						'logged_in' => true,
						'userid'    => $user->userauth_id,
						'username'  => $user->username,
						'role'      => $user->role
					];
					$this->session->set_userdata($sessionData);
					$this->session->set_flashdata('success', 'Welcome back, ' . $user->username . '!');

					$id = $user->userauth_id;
					
					$data['open_information_employee_data'] = $this->admin_model->open_information_employee_data($id);

					if ($user->role === 'Admin') 

					{

						$this->load->view('components/navbar',$data);
						$this->load->view('admin/home');
						$this->load->view('components/footer');

					}

					elseif ($user->role === 'Staff') 

					{
						
						$this->load->view('components/topbar',$data);
						$this->load->view('staff/home');

					} 

					elseif ($user->role === 'Guard') 

					{
						$this->load->view('components/topbar',$data);
						$this->load->view('staff/home');

					} 

					else 

					{
						$this->session->set_flashdata('error', 'Access denied for role: ' . $user->role);
						$this->load->view('auth/signin');
						return;
					}

					return;

				} else {
					$this->session->set_flashdata('error', 'Account is inactive.');
				}
			} else {
				$this->session->set_flashdata('error', 'Incorrect password.');
			}
		} else {
			$this->session->set_flashdata('error', 'User not found.');
		}

		$this->load->view('auth/signin');
	}



	public function signout()
    {

		$this->session->sess_destroy();
        $this->load->view('auth/signin');

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
		$data['open_information_employee_data'] = $this->admin_model->open_information_employee_data($id);

		$this->load->view('components/navbar',$data);
    	$this->load->view('admin/home');
    	$this->load->view('components/footer');
		
		
	}


	public function verify_location()
	{
		if (!$this->session->userdata('logged_in')) 

		{

			$this->session->set_flashdata('session_expired', 'Session has expired. Please log in again.');
        	$this->load->view('auth/signin');
			return;

    	}

		header('Content-Type: application/json');

		$rawData = json_decode(file_get_contents("php://input"), true);

		$userLatitude = isset($rawData['latitude']) ? floatval($rawData['latitude']) : null;
		$userLongitude = isset($rawData['longitude']) ? floatval($rawData['longitude']) : null;

		if ($userLatitude === null || $userLongitude === null) {
			echo json_encode([
				"status" => "error",
				"message" => "Invalid input: missing latitude or longitude"
			]);
			return;
		}

		$user_id = $this->session->userdata('userid');
		
		$expected = $this->staff_model->get_location_by_user_id($user_id);

		if (!$expected) {
			echo json_encode([
				"status" => "error",
				"message" => "No Schedule found"
			]);
			return;
		}

		$expectedLat = floatval($expected['latitude']);
		$expectedLon = floatval($expected['longitude']);

		$radius = 100;
		$distance = $this->calculate_distance($userLatitude, $userLongitude, $expectedLat, $expectedLon);

		if ($distance <= $radius) {
			$this->session->set_userdata('client_name', $expected['name']);
			$this->session->set_userdata('location_status', 'Verified');
			$this->session->set_userdata('client_id', $expected['client_id']);

			echo json_encode([
				"status" => "verified",
				"client_name" => $expected['name']
			]);
		} else {
			$this->session->set_userdata('location_status', 'Not Verified');

			echo json_encode([
				"status" => "not_verified"
			]);
		}
	}



	private function calculate_distance($lat1, $lon1, $lat2, $lon2)
	{
		$earthRadius = 6371000;

		$lat1 = deg2rad($lat1);
		$lon1 = deg2rad($lon1);
		$lat2 = deg2rad($lat2);
		$lon2 = deg2rad($lon2);

		$deltaLat = $lat2 - $lat1;
		$deltaLon = $lon2 - $lon1;

		$a = sin($deltaLat / 2) * sin($deltaLat / 2) +
			cos($lat1) * cos($lat2) *
			sin($deltaLon / 2) * sin($deltaLon / 2);

		$c = 2 * atan2(sqrt($a), sqrt(1 - $a));

		return $earthRadius * $c;
	}





}
