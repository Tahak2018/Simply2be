<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_Structure extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	
	public function index()
	{
		$this->data["subview"] = "adm01/adm0102/_adm_SystemElements";
		$this->load->view('_layout_main', $this->data);
	}
}
