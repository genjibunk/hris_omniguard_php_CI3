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

	public function do_signin()
    {

        $username = $this->input->post('username');
		$password = $this->input->post('password');

		// Example: Hardcoded login
		if ($username === 'admin' && $password === 'admin123') {
			$sessionData = [
				'logged_in' => true,
				'userid'    => 1,
				'username'  => $username,
			];
			$this->session->set_userdata($sessionData);

			$this->load->view ('components/navbar');
			$this->load->view ('admin/home');
			$this->load->view ('components/footer');
		} else {
			// Login failed
			$this->session->set_flashdata('error', 'Invalid credentials');
			$this->load->view('auth/signin');
		}

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
