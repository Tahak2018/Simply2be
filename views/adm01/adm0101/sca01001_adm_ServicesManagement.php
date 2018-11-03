<!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Service Management</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Service Management</li>
                        </ol>
                    </div>
                    <div class="">
                        <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Services & Plans Master</h4>
                            </div>
                            <div class="card-body">
                                <form  role="form" method="post" id="indexservice">
                                    <div class="form-body">
                                        <!-- <h3 class="card-title">Services Master</h3>
                                        <hr> -->
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <?php 
                                                if(form_error('selectservices')) 
                                                    echo "<div class='form-group has-danger'>";
                                                else     
                                                    echo "<div class='form-group' >";
                                                ?>
                                                <label class="control-label">Select Services</label>
                                                <?php 
                                                    if(!isset($urlserviceid)) { $urlserviceid =''; }
                                                    $array = array();
                                                    $array[''] = "Select Services";

                                                    foreach ($services as $service) {
                                                        $array[$service->ServiceID] = $service->ServiceTitle;
                                                    }
                                                    echo form_dropdown("selectservices", $array, set_value("selectservices",$urlserviceid), "id='selectservices' class='form-control custom-select selectservices'");
                                                ?>
                                                <small class="form-control-feedback"><?php echo form_error('selectservices'); ?></small>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6 p-t-30">
                                                <button type="button" class="btn waves-effect waves-light btn-success m-t-5" data-toggle="modal" data-target="#servicesmaster-modal">Add New Services</button>
                                            </div>
                                            <!--/span-->
                                            
                                        </div>
                                        <!--/row-->
                                        <?php if(isset($servicesdetails))
                                        { 
                                            foreach($servicesdetails as $servicesdetail) 
                                            { 
                                                $SCode = $servicesdetail->ServiceCode;
                                                $SType = $servicesdetail->ServiceType;
                                                $SStatus = $servicesdetail->ServiceStatus;
                                                if($SStatus == 1 ){ $SStatus ='Active'; }else{ $SStatus = 'Deactive'; }
                                                $SDesc = $servicesdetail->ServiceDescription;
                                            } 
                                        ?>
                                        <div class="row p-t-20 b-all bg-light-info servicesdetails">
                                            <div class="col-md-4 SL_Data">
                                                <small class="text-muted">Service Code </small>
                                                <h6 class="SCode"><?=$SCode?></h6><hr>
                                                <small class="text-muted">Service Type </small>
                                                <h6 class="SType"><?=$SType?></h6><hr>
                                                <small class="text-muted">Service Status </small>
                                                <h6 class="SStatus"><?=$SStatus?></h6>
                                            </div>
                                            <div class="col-md-8">
                                                <small class="text-muted">Service Description </small>
                                                <h6 class="SDesc"><?=$SDesc?></h6><hr>
                                                <button type="button" class="btn waves-effect waves-light btn-danger" data-toggle="modal" data-target="#servicesmaster-modal" onclick="edit_servicesmaster();" >Edit Services</button>
                                                <button type="button" class="btn btn-inverse closeservicesdetails">Cancel</button>
                                            </div>
                                            <div class="col-md-4">
                                                
                                            </div>
                                        </div>
                                        <!--/row-->
                                    <?php } ?>

                                        <h4 class="box-title m-t-20">Plans Master <button type="button" class="btn waves-effect waves-light btn-success m-l-20" data-toggle="modal" data-target="#planmaster-modal">Add Plan</button> </h4>
                                        <hr>
                                        <div class="table-responsive">
                                            <!-- <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th width="30%">Plan Title</th>
                                                        <th width="20%">Plan Duration</th>
                                                        <th width="20%">Plan Price</th>
                                                        <th width="20%">Currency</th>
                                                        <th width="10%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="addrow">
                                                    <tr>
                                                        <td>
                                                            <?php 
                                                                if(form_error('plantitle')) 
                                                                    echo "<div class='form-group has-danger'>";
                                                                else     
                                                                    echo "<div class='form-group' >";
                                                            ?>                                                        
                                                            <input type="text" class="form-control" name="plantitle" value="<?=set_value('plantitle')?>" id="plantitle">
                                                            <input type="hidden" class="form-control" name="planid" value="<?=set_value('planid',0)?>" id="planid">
                                                            <small class="form-control-feedback"><?php echo form_error('plantitle'); ?></small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if(form_error('planduration')) 
                                                                    echo "<div class='form-group has-danger'>";
                                                                else     
                                                                    echo "<div class='form-group' >";
                                                            ?>
                                                            <input type="text" class="form-control" name="planduration" value="<?=set_value('planduration')?>" id="planduration">
                                                            <small class="form-control-feedback"><?php echo form_error('planduration'); ?>
                                                            </small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if(form_error('planprice')) 
                                                                    echo "<div class='form-group has-danger'>";
                                                                else     
                                                                    echo "<div class='form-group' >";
                                                            ?>
                                                            <input type="text" class="form-control" name="planprice" value="<?=set_value('planprice')?>" id="planprice">
                                                            <small class="form-control-feedback"><?php echo form_error('planprice'); ?></small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if(form_error('plancurrency')) 
                                                                    echo "<div class='form-group has-danger'>";
                                                                else     
                                                                    echo "<div class='form-group' >";
                                                            ?>
                                                            <select class="form-control custom-select" name="plancurrency" id="plancurrency">
                                                                <option value="">Select Currency</option>
                                                                <option value="1">US Dollar</option>
                                                                <option value="2">Kuwait Dinar</option>
                                                            </select>
                                                            <small class="form-control-feedback"><?php echo form_error('plancurrency'); ?></small>
                                                            </div>
                                                        </td>
                                                        <td><button type="submit" class="btn waves-effect waves-light btn-success m-t-5 planbtn"   >Add Plan</button> </td>
                                                    </tr>
                                                </tbody>
                                            </table> -->

                                            <table id="demo-foo-accordion" class="table toggle-circle table-hover">
                                            <thead>
                                                <tr>
                                                    <th data-toggle="true"> Plan Title </th>
                                                    <th> Plan Duration </th>
                                                    <th> Plan Price </th>
                                                    <th> Currency </th>
                                                    <th data-hide="all" width="100%">  </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if(isset($plans)) {
                                                foreach ($plans as $plan) 
                                                {
                                                ?>
                                                <tr  class="getrowplanID" value="<?=$plan->PlanID?>" >
                                                    <td><input type="hidden" value="<?=$plan->PlanID?>" class="rowplanID" name="rowplanID" ><?=$plan->PlanTitle?></td>
                                                    <td><?=$plan->PlanDuration?></td>
                                                    <td><?=$plan->PlanPrice?></td>
                                                    <td><?=$plan->MasterCurrencyLongTitle?></td>
                                                    <td class="setplanattribute"> 
                                                        <div class="pull-left">
                                                        <table class="table table-bordered planattr_table">
                                                            <tr>
                                                                <th>Attribute</th>
                                                                <th>Values</th>
                                                                <th>Features</th>
                                                                <th>Action </th>
                                                            </tr>
                                                            <tbody class="setplanattribute<?=$plan->PlanID?>"></tbody>
                                                        </table></div>
                                                        <div class="pull-left m-t-10"><button type="button" class="btn waves-effect waves-light btn-success m-l-20 getplanID" title="Add New Attribute"  data-toggle="modal" data-target="#planattributes-modal" data-id="<?=$plan->PlanID?>" > Add Plan Attribute</button></div>
                                                    </td>
                                                    <td><button type="button" class="btn waves-effect waves-light btn-danger" data-toggle="modal" data-target="#planmaster-modal" onclick="edit_plansmaster(<?=$plan->PlanID?>);"  >Edit Plan</button> 
                                                    <?php if($plan->PlanStatus == 1) { ?>
                                                    <button type="button" class="btn waves-effect waves-light btn-inverse" onclick="statusupdate_plansmaster(<?=$plan->PlanID?>,0);"   >Deactive</button>
                                                    <?php } else { ?>
                                                    <button type="button" class="btn waves-effect waves-light btn-inverse" onclick="statusupdate_plansmaster(<?=$plan->PlanID?>,1);"   >Active</button>
                                                    <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                }}
                                                ?>
                                                
                                            </tbody>
                                        </table>
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                




                <!-- servicesmaster modal content -->
                <div id="servicesmaster-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Services Master</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form id="servicesmasterform" role="form" method="post">
                                    <div class="form-group servicetitlegrp">
                                        <label for="service-title" class="control-label">Service Title:</label>
                                        <input type="text" class="form-control" name="servicetitle" id="service-title">
                                        <input type="hidden" class="form-control" name="serviceid" id="service-id" value="0">
                                        <small class="form-control-feedback"><div class="servicetitleerror"></div></small>
                                    </div>
                                    <div class="form-group servicecodegrp">
                                        <label for="service-code" class="control-label">Service Code:</label>
                                        <input type="text" class="form-control" name="servicecode" id="service-code">
                                        <small class="form-control-feedback"><div class="servicecodeerror"></div></small>
                                    </div>
                                    <div class="form-group servicetypegrp">
                                        <label for="service-type" class="control-label">Service Type:</label>
                                        <input type="text" class="form-control" name="servicetype" id="service-type">
                                        <small class="form-control-feedback"><div class="servicetypeerror"></div></small>
                                    </div>
                                    <div class="form-group servicestatusgrp">
                                        <label for="service-status" class="control-label">Service Status:</label>
                                        <select class="form-control" name="servicestatus" id="service-status">
                                            <option value='1'>Active</option>
                                            <option value='0'>Deactive</option>
                                        </select>
                                        <small class="form-control-feedback"><div class="servicestatuserror"></div></small>
                                    </div>
                                    <div class="form-group servicedescgrp">
                                            <label for="service-description" class="control-label">Service Description:</label>
                                            <textarea class="form-control" name="servicedescription" id="service-description"></textarea>
                                            <small class="form-control-feedback"><div class="servicedescriptionerror"></div></small>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" onclick="add_servicesmaster();" class="btn btn-danger waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.servicesmaster modal -->

                <!-- planmaster modal content -->
                <div id="planmaster-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Plan Master</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form id="planmasterform" role="form" method="post">
                                    <div class="form-group planparentservicegrp">
                                        <label for="planparentservice" class="control-label">Select Service:</label>
                                        <?php 
                                            $array = array();
                                            $array[''] = "Select Services";

                                            foreach ($services as $service) {
                                                $array[$service->ServiceID] = $service->ServiceTitle;
                                            }
                                            echo form_dropdown("planparentservice", $array, set_value("planparentservice"), "id='planparentservice' class='form-control custom-select planparentservice'");
                                        ?>
                                        <input type="hidden" class="form-control" name="planid" id="planid" value="0">
                                        <small class="form-control-feedback"><div class="planparentserviceerror"></div></small>
                                    </div>
                                    <div class="form-group plantitlegrp">
                                        <label for="plantitleplantitle" class="control-label">Plan Title:</label>
                                        <input type="text" class="form-control" name="plantitle" id="plantitle">
                                        <small class="form-control-feedback"><div class="plantitleerror"></div></small>
                                    </div>
                                    <div class="form-group plandurationgrp">
                                        <label for="planduration" class="control-label">Plan Duration:</label>
                                        <input type="text" class="form-control numberonlyvalidate" name="planduration" id="planduration">
                                        <small class="form-control-feedback"><div class="plandurationerror"></div></small>
                                    </div>
                                    <div class="form-group planpricegrp">
                                        <label for="planprice" class="control-label">Plan Price:</label>
                                        <input type="text" class="form-control numberonlyvalidate" name="planprice" id="planprice">
                                        <small class="form-control-feedback"><div class="planpriceerror"></div></small>
                                    </div>
                                    <div class="form-group plancurrencygrp">
                                            <label for="plancurrency" class="control-label">Plan Currency:</label>
                                            <?php
                                            $array = array();
                                            $array[''] = "Select Currency";

                                            foreach ($currency as $curren) {
                                                $array[$curren->MasterCurrencyID] = $curren->MasterCurrencyLongTitle;
                                            }
                                            echo form_dropdown("plancurrency", $array, set_value("plancurrency"), "id='plancurrency' class='form-control custom-select plancurrency'");
                                            ?>
                                            <small class="form-control-feedback"><div class="plancurrencyerror"></div></small>
                                    </div>
                                    <div class="text-aligncenter has-danger">
                                        <small class="form-control-feedback"><div class="commonerror"></div></small>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" onclick="add_plansmaster();" class="btn btn-danger waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- /.planmaster modal -->

                <!-- planattributes modal content -->
                <div id="planattributes-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Plan Attributes</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form  role="form" method="post" id="planattributeform">
                                    <div class="form-group attributegrp">
                                        <label for="recipient-name" class="control-label">Attribute:</label>
                                        <input type="hidden" class="form-control" id="parentplan" name="parentplan" value="">
                                        <input type="hidden" class="form-control" id="attributeid" name="attributeid" value="0">
                                        <?php
                                        $array = array();
                                        $array[''] = "Select Attribute";

                                        foreach ($attributemaster as $attrmaster) {
                                            $array[$attrmaster->AttributeID] = $attrmaster->AttributeDescription;
                                        }
                                        echo form_dropdown("attribute", $array, set_value("attribute"), "id='attribute' class='form-control custom-select attribute'");
                                        ?>
                                        <small class="form-control-feedback"><div class="attributeerror"></div></small>
                                    </div>
                                    <div class="form-group attributevaluegrp">
                                        <label for="recipient-name" class="control-label">Attribute Value:</label>
                                        <input type="text" class="form-control numberonlyvalidate" id="attributevalue" name="attributevalue">
                                        <small class="form-control-feedback"><div class="attributevalueerror"></div></small>
                                    </div>
                                    <div class="form-group featureincludedgrp">
                                        <label for="recipient-name" class="control-label">Feature Included:</label>
                                        <select class="form-control custom-select" id="featureincluded" name="featureincluded">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <small class="form-control-feedback"><div class="featureincludederror"></div></small>
                                    </div>
                                    <div class="text-aligncenter has-danger">
                                        <small class="form-control-feedback"><div class="commonerror"></div></small>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" onclick="add_planattribute();" class="btn btn-danger waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.planattributes modal -->                                
                                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
<script src="<?=base_url('assets/js/custom/jquery_2_1_1_jquery.min.js')?>"></script>

<script type='text/javascript'>
function add_newplan()
{
$('.addrow').append('<tr><td><input type="text" class="form-control"></td><td><input type="text" class="form-control"></td><td><input type="text" class="form-control"></td><td><select class="form-control custom-select"><option value="">Select Currency</option><option value="">US Dollar</option><option value="">Kuwait Dinar</option></select></td><td class="remove_newplan1"><button type="button" class="btn waves-effect waves-light btn-danger remove_newplan"    >Remove Plan</button> </td></tr>');
}

$(document).ready(function(){    

    $('.selectservices').on('change', function() { 
        $('form#indexservice').submit();
    });

     $(".numberonlyvalidate").keyup(function (e) {
        $('.commonerror').html("");
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            //e.preventDefault();
            this.value = this.value.replace(/[^0-9]/g, '');
            $('.commonerror').html("Enter Numbers Only...!!!");
        }
    });

    $(document).on("click", ".getplanID", function () {
     var planID = $(this).data('id'); 
     $(".modal-body #parentplan").val( planID );
    });

    $(document).on("click", ".getrowplanID", function () {
    //var rowplanID = $(this).closest('td').find('.getrowplanID .rowplanID').val();
    var rowplanID = $(this).attr('value');
        $.ajax({
            url: '<?php echo base_url("adm01/adm0101/cnt_sca01001_Service_PricingPlans/getPlanAttribute"); ?>',
            type: 'post',
            data:{'planID': rowplanID},
            dataType: 'html',
            success: function (data) {
                console.log(data);
            $('.setplanattribute'+rowplanID).html(data);
            }
        });
    });
});        

$('.closeservicesdetails').on('click', function() {
    $('.servicesdetails').removeClass( "show" );
    $('.servicesdetails').addClass( "hide" );
});


function add_servicesmaster()
{
    var serviceid=$('#service-id').val();
    var servicetitle=$('#service-title').val();
    var servicecode=$('#service-code').val();
    var servicetype=$('#service-type').val();
    var servicestatus=$('#service-status').val();
    var servicedescription=$('#service-description').val(); 

    if(servicetitle == '') { $('.servicetitlegrp').addClass( "has-danger" );  
        $('.servicetitleerror').html("The Service Title is required"); } 
    else { $('.servicetitlegrp').removeClass( "has-danger" ); $('.servicetitleerror').html("");  }
    if(servicecode == '') { $('.servicecodegrp').addClass( "has-danger" ); $('.servicecodeerror').html("The Service Code is required");  } 
    else { $('.servicecodegrp').removeClass( "has-danger" ); $('.servicecodeerror').html("");  }
    if(servicetype == '') { $('.servicetypegrp').addClass( "has-danger" ); $('.servicetypeerror').html("The Service Type is required"); } 
    else { $('.servicetypegrp').removeClass( "has-danger" ); $('.servicetypeerror').html(""); }
    if(servicestatus == '') { $('.servicestatusgrp').addClass( "has-danger" ); $('.servicestatuserror').html("The Service Status is required"); } 
    else { $('.servicestatusgrp').removeClass( "has-danger" ); $('.servicestatuserror').html("");  }
    if(servicedescription == '') { $('.servicedescgrp').addClass( "has-danger" ); $('.servicedescriptionerror').html("The Service Description is required"); } 
    else { $('.servicedescgrp').removeClass( "has-danger" ); $('.servicedescriptionerror').html("");  }

    console.log(servicetitle+' '+servicecode+' '+servicetype+' '+servicestatus+' '+servicedescription);

    if(servicetitle != '' && servicecode != '' && servicetype != '' && servicestatus != '' && servicedescription != '')
    {
    $(document).ready(function(){
        var dataString = $("#servicesmasterform").serialize();
        console.log(dataString);
        var url="adm01/adm0101/cnt_sca01001_Service_PricingPlans/ServiceMaster"
        $.ajax({
        type:"POST",
        url:"<?php echo base_url() ?>"+url,
        data:dataString,
        success:function (data) {
            console.log(data);
            if(data == 1)
            {
                location.reload();
                //window.location = baseurl+"adm01/adm0101/cnt_sca01001_Service_PricingPlans/index";
            }
            else
            {
            
            }
        }
        });     
    })
    }
}

function add_plansmaster()
{
    var planparentservice=$('#planparentservice').val();
    var plantitle=$('#plantitle').val();
    var planduration=$('#planduration').val();
    var planprice=$('#planprice').val();
    var plancurrency=$('#plancurrency').val(); 

    if(planparentservice == '') { $('.planparentservicegrp').addClass( "has-danger" );  
        $('.planparentserviceerror').html("The Service is required"); } 
    else { $('.planparentservicegrp').removeClass( "has-danger" ); $('.servicetitleerror').html("");  }
    if(plantitle == '') { $('.plantitlegrp').addClass( "has-danger" ); $('.plantitleerror').html("The Plan Title is required");  } 
    else { $('.plantitlegrp').removeClass( "has-danger" ); $('.plantitleerror').html("");  }
    if(planduration == '') { $('.plandurationgrp').addClass( "has-danger" ); $('.plandurationerror').html("The Plan Duration is required"); } 
    else { $('.plandurationgrp').removeClass( "has-danger" ); $('.plandurationerror').html(""); }
    if(planprice == '') { $('.planpricegrp').addClass( "has-danger" ); $('.planpriceerror').html("The Plan Price is required"); } 
    else { $('.planpricegrp').removeClass( "has-danger" ); $('.planpriceerror').html("");  }
    if(plancurrency == '') { $('.plancurrencygrp').addClass( "has-danger" ); $('.plancurrencyerror').html("The Plan Currency is required"); } 
    else { $('.plancurrencygrp').removeClass( "has-danger" ); $('.plancurrencyerror').html("");  }

    console.log(planparentservice+' '+plantitle+' '+planduration+' '+planprice+' '+plancurrency);

    if(planparentservice != '' && plantitle != '' && planduration != '' && planprice != '' && plancurrency != '')
    {
    $(document).ready(function(){
        var dataString = $("#planmasterform").serialize();
        console.log(dataString);
        var url="adm01/adm0101/cnt_sca01001_Service_PricingPlans/PlanMaster"
        $.ajax({
        type:"POST",
        url:"<?php echo base_url() ?>"+url,
        data:dataString,
        success:function (data) {
            console.log(data);
            if(data == 1)
            {
            location.reload();
            }
            else
            {
            
            }
        }
        });     
    })
    }
}

function edit_servicesmaster()
{
   var serviceID = $('#selectservices').val();
   $.ajax({
        url: '<?php echo base_url("adm01/adm0101/cnt_sca01001_Service_PricingPlans/getServiceMasterData"); ?>',
        type: 'post',
        data:{'serviceID': serviceID},
        dataType: 'html',
        success: function (data) {
        var parsed = JSON.parse(data);
        $.each(parsed, function(key, item) {
            $("#service-id").val(item['ServiceID']);
            $("#service-title").val(item['ServiceTitle']);
            $("#service-code").val(item['ServiceCode']);
            $("#service-type").val(item['ServiceType']);
            $("#service-description").text(item['ServiceDescription']);
            var ServiceStatus = item['ServiceStatus'];
            $("div.servicestatusgrp select").val(ServiceStatus);
        });
        }
    });
}

function edit_plansmaster($planID)
{
    $.ajax({
        url: '<?php echo base_url("adm01/adm0101/cnt_sca01001_Service_PricingPlans/getPlanData"); ?>',
        type: 'post',
        data:{'planID': $planID},
        dataType: 'html',
        success: function (data) {
        var parsed = JSON.parse(data); console.log(parsed);
        $.each(parsed, function(key, item) {
            $("#planid").val(item['PlanID']);
            $("#plantitle").val(item['PlanTitle']);
            $("#planparentservice").val(item['PlanParentService']);
            $("#planduration").val(item['PlanDuration']);
            $("#planprice").val(item['PlanPrice']);
            $("#plancurrency").val(item['PlanCurrency']);
            $(".planbtn").text("Update Plan");
            //var ServiceStatus = item['ServiceStatus'];
            //$("div.servicestatusgrp select").val(ServiceStatus);
        });
        }
    });
}

function statusupdate_plansmaster($planID,$status)
{ 
    var stat; 
    if($status == 1 ) { stat = 'Activated'; } else { stat = 'Deactivated'; }
    swal({   
        title: "Are you sure?",   
        text: "You want change status this plan!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, change it!",   
        closeOnConfirm: false 
    }, function(){  
        $.ajax({
        url: '<?php echo base_url("adm01/adm0101/cnt_sca01001_Service_PricingPlans/statusupdatePlanData"); ?>',
        type: 'post',
        data:{'planID': $planID, 'Status': $status},
        dataType: 'html',
        success: function (data) {
            if(data == 1)
            {
                location.reload();
            }
        }
        });
    });
}

function add_planattribute()
{ 
    var parentplan=$('#parentplan').val(); 
    var attribute=$('#attribute').val();
    var attributevalue=$('#attributevalue').val();
    var featureincluded=$('#featureincluded').val(); 

    if(attribute == '') { $('.attributegrp').addClass( "has-danger" );  
        $('.attributeerror').html("The Attribute is required"); } 
    else { $('.attributegrp').removeClass( "has-danger" ); $('.attributeerror').html("");  }
    if(attributevalue == '') { $('.attributevaluegrp').addClass( "has-danger" ); $('.attributevalueerror').html("The Attribute Value is required");  } 
    else { $('.attributevaluegrp').removeClass( "has-danger" ); $('.attributevalueerror').html("");  }
    if(featureincluded == '') { $('.featureincludedgrp').addClass( "has-danger" ); $('.featureincludederror').html("The Feature Included is required"); } 
    else { $('.featureincludedgrp').removeClass( "has-danger" ); $('.featureincludederror').html(""); }
    
    console.log(attribute+' '+attributevalue+' '+featureincluded);

    if(attribute != '' && attributevalue != '' && featureincluded != '')
    {
    $(document).ready(function(){
        var dataString = $("#planattributeform").serialize();
        console.log(dataString);
        var url="adm01/adm0101/cnt_sca01001_Service_PricingPlans/PlanAttribute"
        $.ajax({
        type:"POST",
        url:"<?php echo base_url() ?>"+url,
        data:dataString,
        success:function (data) {
            console.log(data);
            if(data == 1)
            {
                location.reload();
                //window.location = baseurl+"adm01/adm0101/cnt_sca01001_Service_PricingPlans/index";
            }
            else
            {
            
            }
        }
        });     
    })
    }
}

function edit_planattribute($planid,$attrid)
{
    $.ajax({
        url: '<?php echo base_url("adm01/adm0101/cnt_sca01001_Service_PricingPlans/getPlanAttributeData"); ?>',
        type: 'post',
        data:{'planID': $planid, 'AttributeID': $attrid},
        dataType: 'html',
        success: function (data) {
        var parsed = JSON.parse(data);
        $.each(parsed, function(key, item) {
            $("#parentplan").val(item['ServiceAttributeParentPlan']);
            $("#attributeid").val(item['ServiceAttributeID']);
            $("div.attributegrp select").val(item['ServiceAttributeParentAttribute']);
            $("#attributevalue").val(item['ServiceAttributeValue']);
            $("div.featureincludedgrp select").val(ServiceAttributeIncluded);
        });
        }
    });
}

function delete_planattribute($attrid)
{ 
    swal({   
        title: "Are you sure?",   
        text: "You will not be able to recover this data!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        closeOnConfirm: false 
    }, function(){  
        $.ajax({
        url: '<?php echo base_url("adm01/adm0101/cnt_sca01001_Service_PricingPlans/deletePlanAttributeData"); ?>',
        type: 'post',
        data:{'AttributeID': $attrid},
        dataType: 'html',
        success: function (data) { 
            if(data == 1)
            {
                location.reload();
            }
        }
        });
    });
}
</script>  


<link href="<?=base_url('assets/plugins/footable/css/footable.core.css')?>" rel="stylesheet">
<style type="text/css">
    table.planattr_table td,table.planattr_table th 
    {       
        padding: 5px 50px;
        text-align: center;
        border: 1px solid #dee2e6;   
    } 
    table.planattr_table { width: 100%; }
    table.planattr_table .btn { padding: 0px 2px; } 
</style>   
    