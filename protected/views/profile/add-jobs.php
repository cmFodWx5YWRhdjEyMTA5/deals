<?php
$baseUrl = Yii::app()->request->baseUrl;
$session =  Yii::app()->session['user_token'];
$token = Yii::app()->session['user_token'];
$profile_data = Generic::getProfileData($token);
$category_id = isset($profile_data['business_category_id']) ? $profile_data['business_category_id'] : '';

//$result = Yii::app()->db->createCommand( "SELECT * FROM tbl_category  WHERE parent_id LIKE '$category_id'")->queryAll();
$user_id = isset($profile_data['id']) ? $profile_data['id'] : '';
$result = Yii::app()->db->createCommand( "SELECT categories FROM tbl_estore  WHERE user_id LIKE '$user_id'")->queryAll();
$individual_category_id = explode(',',$result[0]['categories']);

foreach($individual_category_id as $id){
    $category_name[] = Category::model()->findByPk($id);
}

$expire_date =Subscription_plan ::model()->findByAttributes(array('user_id' => $user_id));

echo $this->renderPartial($sidebar_type,array(
    'profile_data'=>$profile_data,
    'business_status' => $business_status,
    'store_url' => $store_url
));
//Generic::_setTrace($plan_details_array,false);
//Generic::_setTrace('sss');

?>
<script language="javascript" type="text/javascript" src="<?php Yii::app()->getBaseUrl(true)?>/js/tinymce/tinymce.js"></script>
<script language="javascript" type="text/javascript">
    tinyMCE.init({
        theme : "modern",
        mode: "exact",
        elements : "ad_description_business",
        theme_advanced_toolbar_location : "top",
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,"
        + "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
        + "bullist,numlist,outdent,indent",
        theme_advanced_buttons2 : "link,unlink,anchor,image,separator,"
        +"undo,redo,cleanup,code,separator,sub,sup,charmap",
        theme_advanced_buttons3 : "",
        height:"350px",
        width:"auto"
    });
</script>
<div id="tabs-dashboard-01" class="uzr-panels">
    <div class="inner">
        <div id="ad-post" class="uzr-panel tab-panel">
            <a class="tab-accordion-trigger" href="#ad-post">
                <span><i class="adicon-alarm"></i></span>
                Ad Alerts

                <!-- main -->

                <div class="container">

                    <div class="breadcrumb-section">
                        <!-- breadcrumb -->
                        <ol class="breadcrumb">
                            <li><a href="index-2.html">Home</a></li>
                            <li>Job Post</li>
                        </ol><!-- breadcrumb -->

                    </div><!-- banner -->

                    <div class="adpost-details">
                        <div class="row">
                            <div class="col-md-12">

                                <?php
                                $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'job-post-form',
                                    'enableAjaxValidation'=>false,
                                    'action'=>'javascript:void(0);',
                                    'enableClientValidation'=>false,

                                ));
                                ?>
                                <fieldset>
                                    <div class="section postdetails">
                                        <h4>Post Job <span class="pull-right">* Mandatory Fields</span></h4>

                                        <div id="error_ad_post"></div>
                                        <div class="row form-group add-title" id='title' title="Keep it short but catchy and no pirce or phone number, Example: iPhone 6 Plus 64GB Black Unlocked">
                                            <label class="col-sm-3 label-title">Job Title<span class="required">*</span></label>
                                            <div class="col-sm-9" >
                                                <input type="text" name="job_title" id="job_title" class="form-control"  placeholder="Executive Manager">
                                            </div>
                                            <div id="message"></div>
                                        </div>

                                        <div class="row form-group add-vacancy" id='vacancy' title="">
                                            <label class="col-sm-3 label-title">No of Vacancy<span class="required">*</span></label>
                                            <div class="col-sm-9" >
                                                <input type="text" name="job_vacancy" id="job_vacancy" class="form-control"  placeholder="5">
                                            </div>
                                            <div id="message"></div>
                                        </div>

                                        <div class="row form-group category" id='category' title="">
                                            <label class="col-sm-3 label-title">Job Category<span class="required">*</span></label>
                                            <div class="col-sm-9" >
                                                <input type="text" name="job_category" id="job_category" class="form-control"  placeholder="Marketing">
                                            </div>
                                            <div id="message"></div>
                                        </div>
                                        
                                        <div class="row form-group job-description" id="description" title="">
                                            <label class="col-sm-3 label-title">Job Description</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="job_description" id="job_description" placeholder="" rows="8"></textarea>
                                            </div>
                                        </div>

                                        <div class="row form-group education-requirement" id="edu_requirement" title="">
                                            <label class="col-sm-3 label-title">Educational Requirement</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="educational_requirement" id="educational_requirement" placeholder="" rows="8"></textarea>
                                            </div>
                                        </div>

                                        <div class="row form-group exp_requirement" id="exp_requirement" title="">
                                            <label class="col-sm-3 label-title">Experience Requirement</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="experience_requirement" id="experience_requirement" placeholder="" rows="8"></textarea>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row form-group salary" id='salary' title="">
                                            <label class="col-sm-3 label-title">Salary<span class="required">*</span></label>
                                            <div class="col-sm-9" >
                                                <input type="text" name="job_salary" id="job_salary" class="form-control"  placeholder="40000 BDT or Negotiable">
                                            </div>
                                            <div id="message"></div>
                                        </div>

                                        <div class="row form-group deadline" id='deadline' title="">
                                            <label class="col-sm-3 label-title">Deadline<span class="required">*</span></label>
                                            <div class="col-sm-9" >
                                                <input type="text" name="job_deadline" id="job_deadline" class="form-control"  placeholder="2018-12-01">
                                            </div>
                                            <div id="message"></div>
                                        </div>

                                        <div class="row form-group job-type" id='job-type' title="">
                                            <label class="col-sm-3 label-title">Job Type<span class="required">*</span></label>
                                            <div class="col-sm-9" >
                                                <input type="text" name="job_type" id="job_type" class="form-control"  placeholder="Full Time">
                                            </div>
                                            <div id="message"></div>
                                        </div>

                                        <div class="row form-group job-location" id='job-location' title="">
                                            <label class="col-sm-3 label-title">Job Location<span class="required">*</span></label>
                                            <div class="col-sm-9" >
                                                <input type="text" name="job_location" id="job_location" class="form-control"  placeholder="Dhaka etc.">
                                            </div>
                                            <div id="message"></div>
                                        </div>
                                        
                                        <div class="row form-group job-requirement" id="job-requirement" title="">
                                            <label class="col-sm-3 label-title">Job Requirement</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="job_requirement" id="job_requirement" placeholder="" rows="8"></textarea>
                                            </div>
                                        </div>

                                        <div class="row form-group additional_comment" id="additional_comment" title="">
                                            <label class="col-sm-3 label-title">Additional Requirement</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="additional_requirement" id="additional_requirement" placeholder="" rows="8"></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">   
                                        <div style="clear:both"></div>

                                    </div><!-- section -->

                                    <div class="checkbox section agreement">
                                        <div align="left" id="ad_status_business"></div>
                                        <button type="submit" id="job_submit" class="btn btn-theme" style="width: 100%">Post Job</button>
                                    </div><!-- section -->

                                </fieldset>
                                <?php $this->endWidget();?>
                                <!-- form -->
                            </div>

                        </div><!-- photos-ad -->
                    </div>
                </div><!-- container -->



        </div><!--panel-->
    </div>
</div>
</div>
</div>
</div>
</div>

<style>
    .info { border: 1px solid #999; padding:0px 60px; font: bold 12px verdana;-moz-box-shadow: 0 0 5px #888; -webkit-box-shadow: 0 0 5px#888;box-shadow: 0 0 5px #888;text-shadow: 2px 2px 2px #ccc;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;font-family:Verdana, Geneva, sans-serif; font-size:11px; line-height:20px;font-weight:normal;color: black;background: #BDE5F8;}

    .switch {
        position: relative;
        display: block;
        vertical-align: top;
        width: 100px;
        height: 30px;
        padding: 3px;
        margin: 0 10px 10px 0;
        background: linear-gradient(to bottom, #eeeeee, #FFFFFF 25px);
        background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF 25px);
        border-radius: 18px;
        box-shadow: inset 0 -1px white, inset 0 1px 1px rgba(0, 0, 0, 0.05);
        cursor: pointer;
    }
    .switch-input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
    }
    .switch-label {
        position: relative;
        display: block;
        height: inherit;
        font-size: 10px;
        text-transform: uppercase;
        background: #eceeef;
        border-radius: inherit;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
    }
    .switch-label:before, .switch-label:after {
        position: absolute;
        top: 50%;
        margin-top: -.5em;
        line-height: 1;
        -webkit-transition: inherit;
        -moz-transition: inherit;
        -o-transition: inherit;
        transition: inherit;
    }
    .switch-label:before {
        content: attr(data-off);
        right: 11px;
        color: #aaaaaa;
        text-shadow: 0 1px rgba(255, 255, 255, 0.5);
    }
    .switch-label:after {
        content: attr(data-on);
        left: 11px;
        color: #FFFFFF;
        text-shadow: 0 1px rgba(0, 0, 0, 0.2);
        opacity: 0;
    }
    .switch-input:checked ~ .switch-label {
        background: #15831b;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
    }
    .switch-input:checked ~ .switch-label:before {
        opacity: 0;
    }
    .switch-input:checked ~ .switch-label:after {
        opacity: 1;
    }
    .switch-handle {
        position: absolute;
        top: 4px;
        left: 4px;
        width: 28px;
        height: 28px;
        background: linear-gradient(to bottom, #FFFFFF 40%, #f0f0f0);
        background-image: -webkit-linear-gradient(top, #FFFFFF 40%, #f0f0f0);
        border-radius: 100%;
        box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
    }
    .switch-handle:before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -6px 0 0 -6px;
        width: 12px;
        height: 12px;
        background: linear-gradient(to bottom, #eeeeee, #FFFFFF);
        background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF);
        border-radius: 6px;
        box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
    }
    .switch-input:checked ~ .switch-handle {
        left: 74px;
        box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
    }

    /* Transition
    ========================== */
    .switch-label, .switch-handle {
        transition: All 0.3s ease;
        -webkit-transition: All 0.3s ease;
        -moz-transition: All 0.3s ease;
        -o-transition: All 0.3s ease;
    }


</style>

<script>

    $('#job-post-form').on('submit',function(e){
        jobInsert();
    });

    function jobInsert(){
        tinyMCE.triggerSave(); 
        var data=$('#job-post-form').serialize();
        var job_title=$("#job_title").val();
        var job_vacancy=$("#job_vacancy").val();
        var job_location=$(".job_location").val();
        var job_salary=$("#job_salary").val();
        var job_type=$("#job_type").val();
        var job_deadline=$("#job_deadline").val();
        
        if(job_title==""){
            $("#ad_status_business").html('<div class="info">Please enter your  Job Title to proceed !</div>');$("#job_title").focus();
        } else if(job_vacancy==""){
            $("#ad_status_business").html('<div class="info">Please enter your Job Vacancy to go !</div>');$("#job_vacancy").focus();
        } else if(job_location==""){
            $("#ad_status_business").html('<div class="info">Please enter your Job Location to go !</div>');$("#job_location").focus();
        } else if(job_salary==""){
            $("#ad_status_business").html('<div class="info">Please enter your Job Salary to go !</div>');
            $("#job_salary").focus();
        } else if(job_type == ""){
            $("#ad_status_business").html('<div class="info">Please enter your Job Type to go !</div>');
            $("#job_salary").focus();
        } else if(job_deadline == ""){
            $("#ad_status_business").html('<div class="info">Please enter your Job Deadline to go !</div>');
            $("#job_deadline").focus();
        }else{
            $.ajax({
                type:'POST',
                url:SITE_URL+"site/SaveJobFromProfile",
                data:data,
                cache:false,
                dataType:"json",
                beforeSend:function(){
                    $("#ad_status").fadeOut();
                    $("#job_submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Submitting ...');
                },success:function(response){
                    if(response.status=="success"){
                        $("#job_submit").html('<img src="'+SITE_URL+'images/ajax-loader.gif" /> &nbsp; Submitting Data ...');
                        function redirect(){
                            window.location=SITE_URL+'my-profile/jobs';
                        } 
                        window.setTimeout(redirect,4000);
                    }else if(response.status=="false"){
                        $("#error_personal").fadeIn(1000,function(){
                            $("#error_ad_post").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response.message+' !</div>');
                        });
                    }
                }
            });
        }
    return false;
}

    $("input:checkbox").on('click', function() {
        var $box = $(this);
        if ($box.is(":checked")) {
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            $(group).prop("checked", false);
            $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
        }
    });

    

    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    $('.popover-dismiss').popover({
        trigger: 'focus'
    })
</script>