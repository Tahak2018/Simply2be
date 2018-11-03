<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $data = array();

	public function __construct() {
		parent::__construct();
		$this->load->model("adm01/adm0101/mdl_sca01001_Service_PricingPlans_m",'service_pricingplans_m');
		$this->data['actionlog']= $this->service_pricingplans_m->get_actionlog();
		$this->data['errors'] = array();
	}

}

/* End of file MY_Controller.php */