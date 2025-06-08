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
}
