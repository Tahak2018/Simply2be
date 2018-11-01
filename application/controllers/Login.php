<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	
	public function index()
	{
		if($_POST) {
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			if($username == 'admin' && $password == 'admin')
			{
				redirect(base_url("/adm01/Admin_Dashboard/index"));
			}
			else
			{
				$this->load->view('login');
			}
		}
		else
		{
		$this->load->view('login');
		}
	}
}
