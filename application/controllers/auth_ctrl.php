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

					if ($user->role === 'Admin') 

					{

						$this->load->view('components/navbar');
						$this->load->view('admin/home');
						$this->load->view('components/footer');

					}

					elseif ($user->role === 'Staff') 

					{
						$this->load->view('components/topbar');
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

		$this->load->view('components/navbar');
    	$this->load->view('admin/home');
    	$this->load->view('components/footer');
		
		
	}

}
