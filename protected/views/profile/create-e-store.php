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
    <!--<header>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <?php
/*                $this->renderPartial("/elements/notification",array('register_type' => $register_type));
                */?>
            </div>
        </div>
    </header>-->
    <div class="inner">
        <div id="tab009" class="uzr-panel tab-panel">
            <h1 class="title" style="text-align: center;margin-top: 50px;font-family: cursive">Do you want to create e-store? Please choose a price plan.</h1>
            <div class="clr"></div>
            <section id="pricePlans" style="margin-left: 5px">
                <ul id="plans">
                    <li class="plan">
                        <ul class="planContainer duration-plan">
                            <li class="title"><h2>3 MONTHS</h2></li>
                            <li class="price"><p style="margin-top: 17px"><label for="basic1" style="margin-left: -9px;color:#3e4f6a"><input type="checkbox" id="basic1" name="pricing" value="1">&nbsp;&nbsp;BASIC <span><?=$currency_sign?> <?php echo $currency_rate*30;?></span></label></p></li>
                            <li class="price"><p><label for="silver4" style="color: #3e4f6a"><input type="checkbox" id="silver4" name="pricing" value="4">&nbsp;&nbsp;SILVER <span><?=$currency_sign?> <?php echo $currency_rate*45;?></span></label></p></li>
                            <li class="price"><p><label for="gold7" style="margin-left: -7px;color: #3e4f6a"><input type="checkbox" id="gold7" name="pricing" value="7">&nbsp;&nbsp;GOLD <span><?=$currency_sign?> <?php echo $currency_rate*60;?></span></label></p></li>
                            <li class="button"><input type="button" id="view-details1" class="view-details" name="view_details" value="View Details"/></li>
                        </ul>
                    </li>

                    <li class="plan active">
                        <ul class="planContainer">
                            <li class="title"><h2>6 MONTHS</h2></li>
                            <li class="price"><p style="margin-top: 17px"><label for="basic2" style="margin-left: -8px;color: #f7814d;"><input type="checkbox" id="basic2" name="pricing" value="2">&nbsp;&nbsp;BASIC <span><?=$currency_sign?> <?php echo $currency_rate*60;?></span></label></p></li>
                            <li class="price"><p><label for="silver5" style="color: #f7814d"><input type="checkbox" id="silver5" name="pricing" value="5">&nbsp;&nbsp;SILVER <span><?=$currency_sign?> <?php echo $currency_rate*90;?></span></label></p></li>
                            <li class="price"><p><label for="gold8" style="margin-left: 3px;color: #f7814d"><input type="checkbox" id="gold8" name="pricing" value="8">&nbsp;&nbsp;GOLD <span><?=$currency_sign?> <?php echo $currency_rate*120;?></span></label></p></li>
                            <li class="button"><input type="button" id="view-details2" class="view-details" name="view_details" value="View Details"/></li>
                        </ul>
                    </li>

                    <li class="plan">
                        <ul class="planContainer">
                            <li class="title"><h2>12 MONTHS</h2></li>
                            <li class="price"><p style="margin-top: 17px"><label for="basic3" style="margin-left: -18px;color:#3e4f6a"><input type="checkbox" id="basic3" name="pricing" value="3">&nbsp;&nbsp;BASIC <span><?=$currency_sign?> <?php echo $currency_rate*90;?></span></label></p></li>
                            <li class="price"><p><label for="silver6" style="color:#3e4f6a"><input type="checkbox" id="silver6" name="pricing" value="6">&nbsp;&nbsp;SILVER <span><?=$currency_sign?> <?php echo $currency_rate*145;?></span></label></p></li>
                            <li class="price"><p><label for="gold9" style="margin-left: -7px;color:#3e4f6a"><input type="checkbox" id="gold9" name="pricing" value="9">&nbsp;&nbsp;GOLD <span><?=$currency_sign?> <?php echo $currency_rate*180;?></span></label></p></li>
                            <li class="price"><p><label for="ultimate" style="margin-left: -7px;color:#3e4f6a"><input type="checkbox" id="ultimate" name="pricing" value="10">&nbsp;&nbsp;ULTIMATE <span><?=$currency_sign?> <?php echo $currency_rate*230;?></span></label></p></li>
                            <li class="button"><input type="button" id="view-details3" class="view-details" name="view_details" value="View Details"/></li>
                        </ul>
                    </li>


                </ul>
            </section>
            <div id="show-plan" style="display: none">
                <section id="pricePlans">
                    <form action="" id="pricing-plan-form" method="post">
                    <ul id="plans">
                        <li class="plan active" style="width: 60%;margin:0 auto;float: none">
                            <ul class="planContainer">
                                <li class="title"><h2 id="price_plan_name"><?=isset($business_plan_details['name'])?></h2></li>
                                <li class="price"><p style="font-size: 32px;height: 48px;line-height: 1.46em;background: #f7814d"><?=$currency_sign?> <span id="price_plan_price" style="color: #fff"><?=isset($business_plan_details['price'])?></span> <span style="font-size: 16px;color: #fff0ef;" id="price_plan_duration">/ <?=isset($business_plan_details['duration'])?></span></p></li>
                                <li id="price_plan_details">
                                    <?=isset($business_plan_details['details'])?>
                                </li><br>
                                <label for="get_ad_post"><input type="checkbox" id="get_ad_post" name="get-ad-post" style="margin-left: -12px;"><span style="color: #364762; font-weight: bold"> Get Services from Our Support Team (Designing Your Products and Manage EStore Panel), Extra &#2547; 2000 will be charged.</span></label>
                                <li class="button"><a href="javascript:void(0)" class="pricing_plan_proceed">Proceed</a></li>
                            </ul>
                        </li>
                    </ul>
                        <input type="hidden" id="pricing_plan_id" name="pricing_plan_id" value="">
                        <input type="hidden" id="ad_post_service" name="ad_post_service" value="">
                        <input type="hidden" id="currency_rate" name="currency_rate" value="<?=$currency_rate?>">
                        </form>
                </section>
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
    $(document).ready(function() {
        checkUrlAlias();
        $('#company_url_alias').on('focus',function(){
            $("#success_html").html('');

        });
        $('#company_url_alias').on('blur',function(){
            checkUrlAlias();
        });
        function checkUrlAlias(){
            var company_url_alias = $('#company_url_alias').val();
            var user_id = $('#user_id').val();
            $.ajax({
                type : 'POST',
                url  : SITE_URL+"estore/CheckCompanyName",
                data : {url_alias:company_url_alias,user_id:user_id},
                cache: false,
                dataType:"json",
                success : function(response){
                    if(response.status=="success"){
                        $("#success_html").html('<div class="alert alert-danger"> <span></span> &nbsp; '+response.message+' !</div>');
                        $("#suggestion_html").html(response.suggestion);

                    }else if(response.status=="false") {
                        $("#success_html").html('<div class="alert alert-success"> <span></span> &nbsp; '+response.message+' !</div>');
                    }
                }
            });
        }

        var input = document.querySelector('input[name="standard"]');
        var input2 = document.querySelector('input[name="silver"]');
        var input3 = document.querySelector('input[name="platinum"]');

        function check() {
            var a = input.checked ? "02" : "01";
            var b = input.checked ? "02" : "01";
            var c = input.checked ? "02" : "01";
            var d = input.checked ? "1000" : "500";
            var e = input2.checked ? "04" : "02";
            var f = input2.checked ? "04" : "02";
            var g = input2.checked ? "04" : "02";
            var h = input2.checked ? "1500" : "900";
            var i = input3.checked ? "04" : "02";
            var j = input3.checked ? "04" : "02";
            var k = input3.checked ? "04" : "02";
            var l = input3.checked ? "2000" : "1350";
            var m = input3.checked ? "01" : "No";
            document.getElementById('feature').innerHTML = a;
            document.getElementById('premium').innerHTML = b;
            document.getElementById('top').innerHTML = c;
            document.getElementById('price-plan').innerHTML = d;
            document.getElementById('feature2').innerHTML = e;
            document.getElementById('premium2').innerHTML = f;
            document.getElementById('top2').innerHTML = g;
            document.getElementById('price-plan2').innerHTML = h;
            document.getElementById('feature3').innerHTML = i;
            document.getElementById('premium3').innerHTML = j;
            document.getElementById('top3').innerHTML = k;
            document.getElementById('price-plan3').innerHTML = l;
            document.getElementById('promotion-banner').innerHTML = m;
        }
        input.onchange = check;
        input2.onchange = check;
        input3.onchange = check;
        check();


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

    $('.view-details').on('click',function(){
        if($('input[name="pricing"]:checked').length > 0){
            var selected_value = $('input[name="pricing"]:checked').val();
            var currency_rate = $('#currency_rate').val();
            $.ajax({
                type : 'POST',
                url  : SITE_URL+"profile/BusinessPlan",
                data : {selected_value:selected_value,currency_rate:currency_rate},
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
                            $('#pricing_plan_id').val(response.id);
                        }
                    }
                });
            }
        else {
            alert('Please select a Price Plan');
        }
    });

    $('.pricing_plan_proceed').on('click',function(){
        var action_url = 'payment-selection';
        if($('input[name="get-ad-post"]').prop('checked') == true){
            $('#ad_post_service').val(1);
        } else {
            $('#ad_post_service').val(0);
        }
        $('#pricing-plan-form').prop('action', action_url);
        $('#pricing-plan-form').submit();
    });

    /*$('.pricing_plan_proceed').on('click',function(){
        var action_url = '';
        if($('input[name="get-ad-post"]').prop('checked') == true){
            action_url = 'business-information-with-post-service';
            $('#ad_post_service').val(1);
        } else {
            action_url = 'business-information';
            $('#ad_post_service').val(0);
        }
        $('#pricing-plan-form').prop('action', action_url);
        $('#pricing-plan-form').submit();
    });*/


</script>



