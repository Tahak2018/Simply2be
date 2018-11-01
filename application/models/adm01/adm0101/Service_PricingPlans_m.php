<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service_PricingPlans_m extends MY_Model {

	function __construct() {
		parent::__construct();
	}

	function insert_servicesmaster($array)
	{
	$services = $this->db->insert('_systemelements_servicesmaster',$array);
	return $services;
	}

	function update_servicesmaster($array,$where)
	{
	$this->db->where($where);   
	$services = $this->db->update('_systemelements_servicesmaster',$array);
	return $services;
	}

	function get_servicesmaster($id) 
	{
	$this->db->where('ServiceID =', $id);
	$query = $this->db->get('_systemelements_servicesmaster');
	return $query->result();
	}

	function  get_servicesmasterdetails(){
		$query=$this->db->query('select * from _systemelements_servicesmaster');
		return $query->result();
	}

	function insert_plansmaster($array)
	{
	$plans = $this->db->insert('_systemelements_plansmaster',$array);
	return $plans;
	}

	function update_plansmaster($array,$where)
	{
	$this->db->where($where);   
	$plans = $this->db->update('_systemelements_plansmaster',$array);
	return $plans;
	}

	function  get_plansmasterdetails(){
		$query=$this->db->query('select * from _systemelements_plansmaster');
		return $query->result();
	}

	function getallserviceplans($id) 
	{
	$this->db->where('PlanParentService =', $id);
	$query = $this->db->get('_systemelements_plansmaster');
	return $query->result();
	}	

	function getPlanData($planID) 
	{
	$this->db->where('PlanID =', $planID);
	$query = $this->db->get('_systemelements_plansmaster');
	return $query->result();
	}

	function statusupdatePlanData($planID,$Status)
	{
	$users = $this->db->query("Update _systemelements_plansmaster set PlanStatus = '$Status' where PlanID='$planID'");
	return TRUE;
	}

	function insert_planattribute($array)
	{
	$planattr = $this->db->insert('_systemelements_planattributes',$array);
	return $planattr;
	}

	function update_planattribute($array,$where)
	{
	$this->db->where($where);   
	$plans = $this->db->update('_systemelements_planattributes',$array);
	return $plans;
	}

	function getPlanAttribute($planID) 
	{
	//$this->db->where('ServiceAttributeParentPlan =', $id);
	//$query = $this->db->get('_systemelements_planattributes');
	$query = $this->db->query("Select * from _systemelements_planattributes as planattr inner join _systemelements_planattributesmaster as planattrmaster on planattr.ServiceAttributeParentAttribute=planattrmaster.AttributeID where ServiceAttributeParentPlan='$planID'");
	return $query->result();
	}

	function getPlanAttributeData($planID,$AttributeID) 
	{
	$this->db->where('ServiceAttributeParentPlan =', $planID);
	$this->db->where('ServiceAttributeID =', $AttributeID);
	$query = $this->db->get('_systemelements_planattributes');
	return $query->result();
	}

	function deletePlanAttributeData($AttributeID)
	{
	$users = $this->db->query("Delete from _systemelements_planattributes where ServiceAttributeID='$AttributeID'");
	return TRUE;
	}

	function  getAttributeMaster(){
		$query=$this->db->query('select * from _systemelements_planattributesmaster');
		return $query->result();
	}
}

/* End of file Service_PricingPlans_m.php */