<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth_ctrl extends CI_Controller {

	public function __construct() 
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->library('session');         
            
    }

	public function signin()
    {
        $this->load->view('auth/signin');
    }


	public function goto_home()
	{
		
    	$this->load->view ('components/navbar');
		$this->load->view ('admin/home');
		$this->load->view ('components/footer');
		
	}

}
