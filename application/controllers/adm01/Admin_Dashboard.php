<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Dashboard extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	
	public function index()
	{
		$this->data["subview"] = "adm01/_adm_Dashboard";
		$this->load->view('_layout_main', $this->data);
	}
}
