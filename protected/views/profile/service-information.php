<?php

$baseUrl = Yii::app()->request->baseUrl;
$session =  Yii::app()->session['user_token'];
$token = Yii::app()->session['user_token'];
$user_id = isset($profile_data['id']) ? $profile_data['id'] : '';
$all_category_list = Generic::getAllCategoryData();
$user_name = isset($profile_data['user_name']) ? $profile_data['user_name'] : '';
$email = isset($profile_data['email']) ? $profile_data['email'] : '';
$phone_number = isset($profile_data['phone_number']) ? $profile_data['phone_number'] : '';
$address = isset($profile_data['address']) ? $profile_data['address'] : '';
$password = isset($profile_data['password']) ? $profile_data['password'] : '';
$enter_prise_name = isset($profile_data['enterprise_name']) ? $profile_data['enterprise_name'] : '';
$url_alias = str_replace(" ","_",strtolower($enter_prise_name));
$category_id = isset($profile_data['business_category_id']) ? $profile_data['business_category_id'] : '';
$result = Yii::app()->db->createCommand( "SELECT * FROM tbl_category  WHERE parent_id LIKE '$category_id'")->queryAll();


$ad_type = 'ads';
$user_id = $profile_data['id'];
$ads = Generic::getAdDetailsFromAddTable($user_id);
$opt = array(
    'w' =>'320',
    'h' =>'240',
    'g'=>'center',
    'r' => '0'
);


?>

<?php
echo $this->renderPartial($sidebar_type,array(
    'profile_data'=>$profile_data,
    'business_status' => $business_status,
    'store_url' => $store_url
));
?>

<div id="tabs-dashboard-01" class="uzr-panels">
    <header>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <?php
                //$this->renderPartial("/elements/notification",array('register_type' => $register_type));
                ?>
            </div>
        </div>

    </header>
    <div class="inner">
        <div id="tab009" class="uzr-panel tab-panel">
            <div class="clr"></div>


            <div class="row estore_configuration">

                <div class="inner">

                    <div class="basic-card">
                        <header style="border-bottom: #fff">
                            <h4><i class="adicon-create tc4"></i> Upload your service promotion related information</h4>
                        </header>
                        <div class="inner border">
                            <div class="row business-information">
                                <div class="col-xs-12 col-md-12">
                                    <form action="<?=$baseUrl?>/my-profile/payment-selection" id="payment-form-section" method="post">
                                        <input type="hidden" id="user_id" class="form-control" name="user_id" value="<?=$user_id?>">
                                        <div class="form-group">
                                            <label>About Your Service</label><br>
                                            <textarea rows="20" cols="40" id="about_service" name="about_service" required data-container="body" data-toggle="popover" data-trigger="focus" data-content="Write some description about your service."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Details</label><br>
                                            <textarea rows="20" cols="40" id="contact_details" name="contact_details" required data-container="body" data-toggle="popover" data-trigger="focus" data-content="Write about your contact information."></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Upload your documents (logo, banner images, documents etc.)</label>
                                            <input type="file" name="files" id="filer_input23">
                                            <input type="hidden" name="service_documents" value="" id="service_documents" >
                                        </div>

                                        <div class="form-group">
                                            <label>Additional Comments</label><br>
                                            <textarea rows="20" cols="40" id="additional_comment" name="additional_comment" required data-container="body" data-toggle="popover" data-trigger="focus" data-content="Write about your uploaded documents. Your suggestion and recommendations."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Facebook Link</label>
                                            <input type="text" id="facebook_link" name="facebook_link" value="<?=$facebook_link?>"  class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>Twitter Link</label>
                                            <input type="text" id="twitter_link" name="twitter_link" value="<?=$twitter_link?>"  class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>LinkedIn Link</label>
                                            <input type="text" id="linkedin_link" name="linkedin_link" value="<?=$linked_link?>"  class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>Google Plus Link</label>
                                            <input type="text" id="google_plus_link" name="google_plus_link" value="<?=$google_plus_link?>"  class="form-control" >
                                        </div>

                                        <div align="left" id="update_name_status"></div>
                                        <input type="hidden" id="promotion_plan" name="promotion_plan" value="<?php echo $plan_config ?>" />
                                        <input type="hidden" id="request_type" name="request_type" value="<?php echo $request_type ?>" />
                                        <input type="hidden" id="request_for" name="request_for" value="service_promotion" />
                                        <button type="submit" id="service_submit"  class="btn btn-small btn-green">Submit Now</button><br><br>
                                        <a href="<?php $baseUrl ?>/my-profile/dashboard"><< Go Back</a>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div><!--basic-card-->




                </div>
            </div>

        </div><!--panel-->
    </div>
</div>
</div>
</div>
</div>
</div>

<style>

    .show {
        width:900px;
        clear:both;
    }
    .firsts {
        background-color:#ffe6e6;
        width:200px;
        float:left;
    }
    .mid {
        padding-left: 30px;
        float:left;
        text-align:center;
        width:369px;

    }
    .ends {
        background-color:#ffe6e6;
        width:200px;
        float:left;
    }
    input[type="file"] {

        display:inline;
    }
    .imageThumb {
        max-height: 75px;
        border: 2px solid;
        margin: 10px 10px 0 0;
        padding: 1px;
        display: inline;
    }

    .planContainer .button input {
        text-transform: uppercase;
        text-decoration: none;
        color: #3e4f6a;
        font-weight: 700;
        letter-spacing: 3px;
        line-height: 2.8em;
        border: 2px solid #3e4f6a;
        display: inline-block;
        width: 80%;
        height: 2.8em;
        border-radius: 4px;
        margin: 1.5em 0 1.8em;
        background: #fff;
    }

    .planContainer .button input:hover {
        background: #3e4f6a;
        color: #fff;
    }

    .price_list{
        text-align: left;
        padding-left: 68px;
    }


</style>

<script>

    $('.back_btn').on('click',function(){
        $('.pricing-section').show('slow');
        $('.estore_configuration').hide('slow');
        $('html, body').animate({ scrollTop: 0 }, 'slow');
    });


    function placeValue(suggestion_string){
        jQuery('#company_url_alias').val(suggestion_string);
    }

    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    $('.popover-dismiss').popover({
        trigger: 'focus'
    })


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

    $('#payment-form-section').on('submit',function(){
        if($('#service_documents').val() == ''){
            alert('Please upload a file describing your service');
            return false;
        }
    });


</script>



