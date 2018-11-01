<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Performance_Analysis extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	
	public function index()
	{
		$this->data["subview"] = "adm02/adm0201/_adm_PerformanceAnalysis";
		$this->load->view('_layout_main', $this->data);
	}
}
