<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simply2be_Analysis extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	
	public function index()
	{
		$this->data["subview"] = "adm02/adm0202/_adm_Simply2beAnalysis";
		$this->load->view('_layout_main', $this->data);
	}
}
