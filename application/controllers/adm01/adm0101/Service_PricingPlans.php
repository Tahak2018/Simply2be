<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_PricingPlans extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model("adm01/adm0101/Service_PricingPlans_m",'service_pricingplans_m');
	}

	public function index()
	{
		$this->data['services'] = $this->service_pricingplans_m->get_servicesmasterdetails();
		if($_POST)
      	{
        	$this->load->library('form_validation');
          	$rules = $this->rules();
	  		$this->form_validation->set_rules($rules);
	  		if ($this->form_validation->run() == FALSE) 
          	{
	    	$this->data['form_validation'] = validation_errors();
            $this->data["subview"] = "adm01/adm0101/_adm_ServicesManagement";
            $this->load->view('_layout_main', $this->data);			
	  		} 
          	else 
          	{
          		$data = array();
          		$where = array();
		  		$where['PlanID']=$this->input->post('planid');
	            $data['PlanParentService']=$this->input->post('selectservices');	
			    $data['PlanTitle']=$this->input->post('plantitle');
			    $data['PlanDuration']=$this->input->post('planduration');
			    $data['PlanPrice']=$this->input->post('planprice');
			    $data['PlanCurrency']=$this->input->post('plancurrency');
			    $data['PlanStatus']=1;
			    if($where['PlanID'] == 0)
		  		{
			    $result=$this->service_pricingplans_m->insert_plansmaster($data);
				}
				else
				{
				$result=$this->service_pricingplans_m->update_plansmaster($data,$where);
				}
			   redirect(base_url("adm01/adm0101/Service_PricingPlans/GetServicePlanData/".$data['PlanParentService']));
          	}
      	}
      	else
      	{
		$this->data["subview"] = "adm01/adm0101/_adm_ServicesManagement";
		$this->load->view('_layout_main', $this->data);
		}
	}

	public function getServiceMasterData()
	{
		$serviceID= $this->input->post('serviceID');
		$serviceData = $this->service_pricingplans_m->get_servicesmaster($serviceID);
		echo json_encode($serviceData);
	}

	public function ServiceMaster()
	{
	  $data = array();
	  $where = array();
	  $where['ServiceID']=$this->input->post('serviceid');
      $data['ServiceTitle']=$this->input->post('servicetitle');	
	  $data['ServiceCode']=$this->input->post('servicecode');
	  $data['ServiceType']=$this->input->post('servicetype');
	  $data['ServiceStatus']=$this->input->post('servicestatus');
	  $data['ServiceDescription']=$this->input->post('servicedescription');
	  if($where['ServiceID'] == 0)
	  {
	  	$result=$this->service_pricingplans_m->insert_servicesmaster($data);
	  }
	  else
	  {
	  	$result=$this->service_pricingplans_m->update_servicesmaster($data,$where);	
	  }
	  echo $result;
	}

 	public function GetServicePlanData()
 	{
 		$serviceID =$this->uri->segment(5);
      	if((int)$serviceID) 
      	{
	      	$this->data['urlserviceid'] = $serviceID;
      		$this->data['services'] = $this->service_pricingplans_m->get_servicesmasterdetails();
	      	$this->data['servicesdetails'] = $this->service_pricingplans_m->get_servicesmaster($serviceID);
	      	$this->data["plans"] = $this->service_pricingplans_m->getallserviceplans($serviceID);
	      	$this->data['attributemaster'] = $this->service_pricingplans_m->getAttributeMaster();
			if($_POST)
	      	{
	        	$this->load->library('form_validation');
	          	$rules = $this->rules();
		  		$this->form_validation->set_rules($rules);
		  		if ($this->form_validation->run() == FALSE) 
	          	{
		    	$this->data['form_validation'] = validation_errors();
	            $this->data["subview"] = "adm01/adm0101/_adm_ServicesManagement";
	            $this->load->view('_layout_main', $this->data);			
		  		} 
	          	else 
	          	{
	          		$data = array();
	          		$where = array();
			  		$where['PlanID']=$this->input->post('planid');
		            $data['PlanParentService']=$this->input->post('selectservices');	
				    $data['PlanTitle']=$this->input->post('plantitle');
				    $data['PlanDuration']=$this->input->post('planduration');
				    $data['PlanPrice']=$this->input->post('planprice');
				    $data['PlanCurrency']=$this->input->post('plancurrency');
				    $data['PlanStatus']=1;
				    if($where['PlanID'] == 0)
			  		{
				    $result=$this->service_pricingplans_m->insert_plansmaster($data);
					}
					else
					{
					$result=$this->service_pricingplans_m->update_plansmaster($data,$where);
					}
				   redirect(base_url("adm01/adm0101/Service_PricingPlans/GetServicePlanData/".$data['PlanParentService']));
	          	}
	      	}
	      	else
	      	{
			$this->data["subview"] = "adm01/adm0101/_adm_ServicesManagement";
			$this->load->view('_layout_main', $this->data);
			}
		}
		else
		{
			redirect(base_url("adm01/adm0101/Service_PricingPlans/GetServicePlanData/"));
		}
 	}

 	public function getPlanData()
	{
		$planID= $this->input->post('planID');
		$planData = $this->service_pricingplans_m->getPlanData($planID);
		echo json_encode($planData);
	}

	public function statusupdatePlanData()
	{
		$planID = $this->input->post('planID');
		$Status = $this->input->post('Status');
		$planData = $this->service_pricingplans_m->statusupdatePlanData($planID,$Status);
		echo $planData;
	}

	public function PlanAttribute()
	{
		  $data = array();
		  $where = array();
		  $where['ServiceAttributeID']=$this->input->post('attributeid');
          $data['ServiceAttributeParentPlan']=$this->input->post('parentplan');	
		  $data['ServiceAttributeParentAttribute']=$this->input->post('attribute');
		  $data['ServiceAttributeValue']=$this->input->post('attributevalue');
		  $data['ServiceAttributeIncluded']=$this->input->post('featureincluded');
		  if($where['ServiceAttributeID'] == 0)
		  {
		    $result=$this->service_pricingplans_m->insert_planattribute($data);
		  }
		  else
		  {
		  	$result=$this->service_pricingplans_m->update_planattribute($data,$where);	
		  }
		  echo $result;
	}

	public function getPlanAttribute()
	{
		$planID= $this->input->post('planID');
		$PlanAttribute = $this->service_pricingplans_m->getPlanAttribute($planID); 
		$output='';
		if(isset($PlanAttribute))
		{
			foreach($PlanAttribute as $PlanAttr) 
            { 
            	$output = $output.'<tr><td>'.$PlanAttr->AttributeDescription.'</td><td>'.$PlanAttr->ServiceAttributeValue.'</td><td>'.$PlanAttr->ServiceAttributeIncluded.'</td><td><button type="button" class="btn waves-effect waves-light btn-danger cus_size_btn " data-id="'.$PlanAttr->ServiceAttributeParentPlan.'"  data-toggle="modal" data-target="#planattributes-modal" onclick="edit_planattribute('.$PlanAttr->ServiceAttributeParentPlan.','.$PlanAttr->ServiceAttributeID.');" ><i class="mdi mdi-lead-pencil"></i></button> <button type="button" class="btn waves-effect waves-light btn-inverse" onclick="delete_planattribute('.$PlanAttr->ServiceAttributeID.');"  ><i class="mdi mdi-delete"></i></button></td></tr>';
            }
		}
		echo $output;
	}

	public function getPlanAttributeData()
	{
		$planID= $this->input->post('planID');
		$AttributeID = $this->input->post('AttributeID');
		$PlanAttributeData = $this->service_pricingplans_m->getPlanAttributeData($planID,$AttributeID);
		echo json_encode($PlanAttributeData);
	}

	public function deletePlanAttributeData()
	{
		$AttributeID = $this->input->post('AttributeID');
		$PlanAttributeData = $this->service_pricingplans_m->deletePlanAttributeData($AttributeID);
		echo $PlanAttributeData;
	}

	protected function rules() {
    $rules = array(
	array(
	    'field' => 'selectservices', 
	    'label' => "Select Services",
	    'rules' => 'trim|required'
	     ), 
	     array(
	     'field' => 'plantitle', 
	     'label' => "Plan Title",
	     'rules' => 'trim|required'
	      ), 
	     array(
	     'field' => 'planduration', 
	     'label' => "Plan Duration",
	     'rules' => 'trim|required'
	      ), 
	     array(
	     'field' => 'planprice', 
	     'label' => "Plan Price",
	     'rules' => 'trim|required'
	      ), 
	     array(
	     'field' => 'plancurrency', 
	     'label' => "Plan Currency",
	     'rules' => 'trim|required'
	      )
	    );
	return $rules;
	}

}
