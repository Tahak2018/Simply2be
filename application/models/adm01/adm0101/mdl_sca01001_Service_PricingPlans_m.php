<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_sca01001_Service_PricingPlans_m extends MY_Model {

	function __construct() {
		parent::__construct();
	}

	//Save Service Master Data
	function insert_servicesmaster($array)
	{
	$services = $this->db->insert('_systemelements_servicesmaster',$array);
	$this->add_actionlog('Service Management', 'Service Master Created');
	return $services;
	}

	//Update Service Master Data
	function update_servicesmaster($array,$where)
	{
	$this->db->where($where);   
	$services = $this->db->update('_systemelements_servicesmaster',$array);
	$this->add_actionlog('Service Management', 'Service Master Updated');
	return $services;
	}

	//Retrieve Single Service Master Data
	function get_servicesmaster($id) 
	{
	$this->db->where('ServiceID =', $id);
	$query = $this->db->get('_systemelements_servicesmaster');
	return $query->result();
	}

	//Retrieve All Service Master Data
	function  get_servicesmasterdetails(){
		$query=$this->db->query('select * from _systemelements_servicesmaster');
		return $query->result();
	}

	//Get Currency Master Data
	function  get_currencymaster(){
		$query=$this->db->query('select * from _commonbusinesssetting_currencymaster');
		return $query->result();
	}

	//Save Plan Master Data	
	function insert_plansmaster($array)
	{
	$plans = $this->db->insert('_systemelements_plansmaster',$array);
	$this->add_actionlog('Service Management', 'Plan Master Created');
	return $plans;
	}

	//Update Plan Master Data	
	function update_plansmaster($array,$where)
	{
	$this->db->where($where);   
	$plans = $this->db->update('_systemelements_plansmaster',$array);
	$this->add_actionlog('Service Management', 'Plan Master Updated');
	return $plans;
	}

	//Retrieve All Plan Master Data	
	function  get_plansmasterdetails(){
		$query=$this->db->query('select * from _systemelements_plansmaster');
		return $query->result();
	}

	//Retrieve Plan Master Data against Service
	function getallserviceplans($id) 
	{
	// $this->db->where('PlanParentService =', $id);
	// $query = $this->db->get('_systemelements_plansmaster');
	$query = $this->db->query("select * from _systemelements_plansmaster as plan inner join _commonbusinesssetting_currencymaster as currency on plan.PlanCurrency=currency.MasterCurrencyID where PlanParentService='$id'");
	return $query->result();
	}	

	//Retrieve Single Plan Master Data
	function getPlanData($planID) 
	{
	$this->db->where('PlanID =', $planID);
	$query = $this->db->get('_systemelements_plansmaster');
	return $query->result();
	}

	//Status Update Plan Master Data
	function statusupdatePlanData($planID,$Status)
	{
	$users = $this->db->query("Update _systemelements_plansmaster set PlanStatus = '$Status' where PlanID='$planID'");
	$this->add_actionlog('Service Management', 'Plan Master Status Updated');
	return TRUE;
	}

	//Save Plan Attribute Data
	function insert_planattribute($array)
	{
	$planattr = $this->db->insert('_systemelements_planattributes',$array);
	$this->add_actionlog('Service Management', 'Plan Attribute Created');
	return $planattr;
	}

	//Update Plan Attribute Data
	function update_planattribute($array,$where)
	{
	$this->db->where($where);   
	$plans = $this->db->update('_systemelements_planattributes',$array);
	$this->add_actionlog('Service Management', 'Plan Attribute Updated');
	return $plans;
	}

	//Retrieve all Plan Attribute Data against Plan
	function getPlanAttribute($planID) 
	{
	//$this->db->where('ServiceAttributeParentPlan =', $id);
	//$query = $this->db->get('_systemelements_planattributes');
	$query = $this->db->query("Select * from _systemelements_planattributes as planattr inner join _systemelements_planattributesmaster as planattrmaster on planattr.ServiceAttributeParentAttribute=planattrmaster.AttributeID where ServiceAttributeParentPlan='$planID'");
	return $query->result();
	}

	//Retrieve Single Plan Attribute Data
	function getPlanAttributeData($planID,$AttributeID) 
	{
	$this->db->where('ServiceAttributeParentPlan =', $planID);
	$this->db->where('ServiceAttributeID =', $AttributeID);
	$query = $this->db->get('_systemelements_planattributes');
	return $query->result();
	}

	//Delete Plan Attribute Data
	function deletePlanAttributeData($AttributeID)
	{
	$users = $this->db->query("Delete from _systemelements_planattributes where ServiceAttributeID='$AttributeID'");
	$this->add_actionlog('Service Management', 'Plan Attribute Deleted');
	return TRUE;
	}

	//Retrieve Plan Attribute Master
	function  getAttributeMaster(){
		$query=$this->db->query('select * from _systemelements_planattributesmaster');
		return $query->result();
	}

	//Save Action Log
	public function add_actionlog($screen,$details)
	{
		$datetime=date("Y-m-d H:i:s");
		$data = array();
        $data['ActionScreen']=$screen;	
		$data['ActionDetails']=$details;
		$data['DateTime']=$datetime;
		$action = $this->db->insert('_systemelements_actionlog',$data);
	}

	//Retrieve Action Log
	function  get_actionlog(){
		$query=$this->db->query('select * from _systemelements_actionlog order by ActionID Desc Limit 50');
		return $query->result();
	}
}

/* End of file Service_PricingPlans_m.php */