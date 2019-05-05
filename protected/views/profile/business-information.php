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
                $this->renderPartial("/elements/notification",array('register_type' => $register_type));
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
                            <h4><i class="adicon-create tc4"></i> Upload your business e-store information</h4>
                        </header>
                        <div class="inner border">
                            <div class="row business-information">
                                <div class="col-xs-12 col-md-12">
                                    <form action="<?=$baseUrl?>/my-profile/payment-selection" id="payment-form-section" method="post">
                                        <input type="hidden" id="user_id" class="form-control" name="user_id" value="<?=$user_id?>">
                                        <div class="form-group">
                                            <label>Company/Enterprise Name :</label>
                                            <label style="color: green"><?=$enter_prise_name?></label>
                                            <input type="hidden" id="company_name" name="company_name" value="<?=$enter_prise_name?>" class="form-control" >
                                            <a href="javascript:void(0)" class="skip" style="margin:-24px 212px;font-size: 16px;font-weight: bold;color: red">Skip now & upload next</a>
                                        </div>

<!--                                        <div class="form-group">-->
<!--                                            <label>Company URL Alias</label>-->
<!--                                            <input type="text" id="company_url_alias"  name="company_url_alias" value="--><?//=$url_alias?><!--"  class="form-control" data-container="body" data-toggle="popover" data-trigger="focus" data-content="Type your company url alias here. Example: service_zone">-->
<!--                                            <div id="success_html"></div>-->
<!--                                            <div id="suggestion_html"></div>-->
<!--                                        </div>-->
                                        <div class="form-group">
                                            <label>Company/Enterprise Slogan (Ex: Your ads our services)</label>
                                            <input type="text" id="slogan" name="slogan" class="form-control" value="" data-container="body" data-toggle="popover" data-trigger="focus" data-content="Type your company slogan here. Example: Your ads our services">
                                        </div>

                                        <div class="form-group">
                                            <label>Company/Enterprise Logo (Upload logo or visiting card)(Preferred size: 220x55 px)</label>
                                            <input type="file" name="files" id="filer_input9">
                                            <input type="hidden" name="logo_image" value="" id="logo_image" >
                                        </div>
                                        <div>
                                            <label>Main Banner (Upload Three Image)<p>(Preferred size: 850x430 px)</p></label>
                                            <input type="file" name="files[]" id="filer_input10" multiple="multiple">
                                            <input type="hidden" name="banner_image" value="" id="banner_image" >
                                        </div>
                                        <div>
                                            <label>Sub Banner (Upload Two Image)<p>(Preferred size: 370x190 px)</p></label>
                                            <input type="file" name="files[]" id="filer_input11" multiple="multiple">
                                            <input type="hidden" name="sub_banner" value="" id="sub_banner_image" >
                                        </div>

                                        <div class="form-group">
                                            <label>Select your product category</label>
                                            <div class="show">
                                                <div class="firsts">
                                                    <select id="firsts" multiple="true">
                                                        <?php
                                                        if (isset($result)){
                                                            foreach($result as $category){
                                                                $category_id = $category['category_id'];
                                                                $category_name = $category['category_name'];
                                                                ?>
                                                                <option value="<?=$category_id?>">  <?=$category_name?> </option>
                                                            <?php }}?>

                                                    </select>
                                                </div>
                                                <div class="mid" style="width: 150px;  margin-left: 25px">
                                                    <a href="javascript:void(0);" class='add_button'> Add </a><br>
                                                    <a href="javascript:void(0);" class='remove_button'> Remove </a><br>
                                                    <a href="javascript:void(0);" class='add-all'> Add All </a><br>
                                                    <a href="javascript:void(0);" class='remove-all'> Remove All </a>
                                                </div>
                                                <div class="ends">
                                                    <select id="second" name="categories" multiple="multiple">


                                                    </select>
                                                    <input type="hidden" name="category" value="" id="category" >

                                                </div>
                                                <div style="clear:both;"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Write something about your business e-store</label>

                                            <textarea rows="20" cols="40" id="about_us" name="about_us" data-container="body" data-toggle="popover" data-trigger="focus" data-content="Write some description about your company / business."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Us (Write some short information)</label>
                                            <textarea rows="20" cols="40" id="contact_us" name="contact_us" data-container="body" data-toggle="popover" data-trigger="focus" data-content="Type your company / business contact information here."></textarea>

                                        </div>
                                        <div class="form-group">

                                        </div>
                                        <div align="left" id="update_name_status"></div>
                                        <input type="hidden" id="pricing_plan_id" name="pricing_plan_id" value="<?php echo $pricing_plan_id ?>" />
                                        <input type="hidden" id="ad_post_service" name="ad_post_service" value="<?php echo $ad_post_service ?>" />
                                        <button type="submit" id="estore_submit"  class="btn btn-small btn-green">Submit Now</button><a href="javascript:void(0)" class="skip">Skip now & upload next</a><br><br>
                                        <a href="<?php $baseUrl ?>/my-profile/create-e-store"><< Go Back</a>

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
    function check_btn(){
        alert('assd');
    }
</script>

<script>

    $('.skip').on('click',function(){
        $('#payment-form-section').submit();
    });

    $('.add_button').click(function(){
        $('#firsts option:selected').appendTo('#second');
        var value =   $('#second').val();
        $("#category").val(value);

    });
    $('.remove_button').click(function(){
        $('#second option:selected').appendTo('#firsts');
    });
    $('.add-all').click(function(){
        $('#firsts option').appendTo('#second');
        $('#second option').prop('selected','selected');
        var value =   $('#second').val();
        $("#category").val(value);

    });
    $('.remove-all').click(function(){
        $('#second option').appendTo('#firsts');
    });

    $('.plan_selection').on('click',function(){
        plan_id = $(this).attr('data-value');
        parent_element = $(this).parent().find('input[type=checkbox]');
        if(parent_element.is(':checked')) {
            plan_name = parent_element.attr('id');
            user_id = $('#user_id').val();
            $.ajax({
                type : 'POST',
                url  : SITE_URL+"profile/SendRequestAfterPlanChosen",
                data : {plan_name:plan_name,user_id:user_id},
                cache: false,
                dataType:"json",
                success : function(response){
                    if(response.status=="success"){
                        window.location = SITE_URL+'my-profile/thank-you';
                    }
                }
            });
            return;
        }
        $('#service_plan').val(plan_id);
        if(plan_id == 1) {
            if($("#standard").is(':checked')) {
                $('#additional_service').val(1);
            } else {
                $('#additional_service').val(0);
            }
        } else if(plan_id == 2) {
            if($("#silver").is(':checked')) {
                $('#additional_service').val(1);
            } else {
                $('#additional_service').val(0);
            }
        } else if(plan_id == 3) {
            if($("#platinum").is(':checked')) {
                $('#additional_service').val(1);
            } else {
                $('#additional_service').val(0);
            }
        }

        $('.pricing-section').hide('slow');
        $('.estore_configuration').show('slow');
        $('html, body').animate({ scrollTop: 0 }, 'slow');
    });

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

    $('#view-details').on('click',function(){
        if($('input[name="pricing"]:checked').length > 0){
            var selected_value = $('input[name="pricing"]:checked').val();
            $.ajax({
                type : 'POST',
                url  : SITE_URL+"profile/BusinessPlan",
                data : {selected_value:selected_value},
                cache: false,
                dataType:"json",
                success : function(response){
                    if(response.status == 'success') {
                        checkbox_selected_id = '#show-plan';
                        $(checkbox_selected_id).show('slow');
                        $('#price_plan_name').html(response.name);
                        $('#price_plan_price').html(response.price);
                        $('#price_plan_duration').html("/"+response.duration);
                        $('#price_plan_details ').html(response.details);
                    }
                }
            });
        }
        else {
            alert('Please select a Price Plan');
        }
    });



</script>



