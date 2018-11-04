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
            <a class="tab-accordion-trigger" href="#tab007">
                <span><i class="adicon-settings"></i></span>
                Create Your Own E-Store
            </a>
            <div class="row">
                <div class="col-sm-12">
                    <div class="info">
                    </div>
                    <h2>Subscription status: <?php echo $subscription_status ?></h2>
                    <h3>Current Plan: <?php echo $plan_name ?></h3>
                    <h4>Ad Post Service: <?php echo $ad_post_service ?></h4>
                    <?php if($ad_post_service == 'Not Taken') { ?>
                        <a href="javascript:void(0)" class="btn get_ad_post_service">Get Ad Post Service</a>
                    <?php } ?>
                    <input type="hidden" name="plan_name" id="plan_name" value="<?php echo $plan_name ?>">
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id ?>">
                    <input type="hidden" name="plan_status" id="plan_status" value="<?php echo $subscription_status ?>">
                </div>
            </div>
            <div class="row pricing-section">
                <div class="col-sm-4">
                    <div class="pric" style="background: #D1D4AC; padding: 15px 15px 25px">
                        <h2>STANDARD</h2>
                        <h3><sup>BDT</sup><b id="price-plan" style="font-weight: bolder">500</b><span>/Per Month</span></h3>
                        <div class="pric-menu">
                            <div class="divTable">
                                <div class="divRow">
                                    <div class="divCell col-md-9">Create e Store</div>
                                    <div class="divCell2 col-md-3">Yes</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Ads Upload</div>
                                    <div class="divCell2 col-md-3">10</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Featured Ads</div>
                                    <div class="divCell2 col-md-3" id="feature">01</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Premium Ads</div>
                                    <div class="divCell2 col-md-3" id="premium">01</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Top Ads</div>
                                    <div class="divCell2 col-md-3" id="top">01</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input value="1" name="standard" id="standard" type="checkbox" <?php if($plan_name == 'Standard' && $subscription_status == 'Active') echo 'disabled'; ?>><span style="color: #000; font-weight: normal"> Get Ads Post Services (Post Ads by Support Team)</span><br>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-primary plan_selection <?php if($plan_name == 'Standard' && $subscription_status == 'Active') echo 'inactiveLink'; ?>" data-value="1">Choose Plan</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="pric active" style="background: #D1D4AC; padding: 15px 15px 25px">
                        <div class="popular">
                            <h2>Most Popular</h2>
                        </div>
                        <h2>SILVER</h2>
                        <h3><sup>BDT</sup><b id="price-plan2" style="font-weight: bolder">900</b><span>/Per Month</span></h3>
                        <div class="pric-menu">
                            <div class="divTable">
                                <div class="divRow">
                                    <div class="divCell col-md-9">Create e Store</div>
                                    <div class="divCell2 col-md-3">Yes</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Ads Upload</div>
                                    <div class="divCell2 col-md-3">20</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Featured Ads</div>
                                    <div class="divCell2 col-md-3" id="feature2">02</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Premium Ads</div>
                                    <div class="divCell2 col-md-3" id="premium2">02</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Top Ads</div>
                                    <div class="divCell2 col-md-3" id="top2">02</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Live Chat</div>
                                    <div class="divCell2 col-md-3">Yes</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Social media marketing</div>
                                    <div class="divCell2 col-md-3">Yes</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input value="1" name="silver" id="silver" type="checkbox" <?php if($plan_name == 'Silver' && $subscription_status == 'Active') echo 'disabled'; ?>><span style="color: #000; font-weight: normal"> Get Ads Post Services (Post Ads by Support Team)</span><br>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-primary plan_selection <?php if($plan_name == 'Silver' && $subscription_status == 'Active') echo 'inactiveLink'; ?>" data-value="2">Choose Plan</a>
                            <!--                            <a href="/price-plan-details" class="btn btn-primary">More details</a>-->
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="pric" style="background: #D1D4AC; padding: 15px 15px 25px">
                        <h2>PLATINUM</h2>
                        <h3><sup>BDT</sup><b id="price-plan3" style="font-weight: bolder">1350</b><span>/Per Month</span></h3>
                        <div class="pric-menu">
                            <div class="divTable">
                                <div class="divRow">
                                    <div class="divCell col-md-9">Create e Store</div>
                                    <div class="divCell2 col-md-3">Yes</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Ads Upload</div>
                                    <div class="divCell2 col-md-3">30</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Featured Ads</div>
                                    <div class="divCell2 col-md-3" id="feature3">02</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Premium Ads</div>
                                    <div class="divCell2 col-md-3" id="premium3">02</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Top Ads</div>
                                    <div class="divCell2 col-md-3" id="top3">02</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Hot Ads</div>
                                    <div class="divCell2 col-md-3">01</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Live Chat</div>
                                    <div class="divCell2 col-md-3">Yes</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Social media marketing</div>
                                    <div class="divCell2 col-md-3">Yes</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Email Marketing</div>
                                    <div class="divCell2 col-md-3">Yes</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Recommends  Ads</div>
                                    <div class="divCell2 col-md-3">Yes</div>
                                </div>
                                <div class="divRow">
                                    <div class="divCell col-md-9">Promotion Banner</div>
                                    <div class="divCell2 col-md-3" id="promotion-banner">No</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input value="1" name="platinum" id="platinum" type="checkbox" <?php if($plan_name == 'Platinum' && $subscription_status == 'Active') echo 'disabled'; ?>><span style="color: #000; font-weight: normal"> Get Ads Post Services (Post Ads by Support Team)</span><br>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-primary plan_selection <?php if($plan_name == 'Platinum' && $subscription_status == 'Active') echo 'inactiveLink'; ?>" data-value="3">Choose Plan</a>
                            <!--                            <a href="/price-plan-details" class="btn btn-primary">More details</a>-->
                        </div>
                    </div>
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

</style>

<script>
    $(document).ready(function() {


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

    $('#standard').on('change',function(){
        if($('input[name="standard"]:checked').length && $('#plan_name').val() == 'Standard'){
            $('.plan_selection').removeClass('inactiveLink');
        }
    });

    $('#silver').on('change',function(){
        if($('input[name="silver"]:checked').length && $('#plan_name').val() == 'Silver'){
            $('.plan_selection').removeClass('inactiveLink');
        }
    });

    $('#platinum').on('change',function(){
        if($('input[name="platinum"]:checked').length && $('#plan_name').val() == 'Platinum'){
            $('.plan_selection').removeClass('inactiveLink');
        }
    });

    $('.plan_selection').on('click',function(){
        element_current = $(this);
        plan_id = $(this).attr('data-value');
        parent_element = $(this).parent().find('input[type=checkbox]');
        plan_status = $('#plan_status').val();
        if(parent_element.is(':checked')) {
            ad_post_service = 'yes';
        } else {
            ad_post_service = 'no';
        }
            plan_name = parent_element.attr('id');
            user_id = $('#user_id').val();
            $.ajax({
                type : 'POST',
                url  : SITE_URL+"profile/SendRequestForChangePlan",
                data : {plan_name:plan_name,user_id:user_id,ad_post_service:ad_post_service,plan_status:plan_status},
                cache: false,
                dataType:"json",
                beforeSend: function(){
                    $(element_current).html('<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>Choose Plan');
                },
                success : function(response){
                    if(response.status=="success"){
                        $('.info').html('<div class="success">Your request have been sent successfully. Your Plan will be updated within next 24 hours.</div>');
                    } else {
                        $('.info').html('<div class="failure">There is a problem sending mail.</div>');
                    }
                },
                complete: function(){
                    $(element_current).html('Choose Plan');
                }
            });
            return;
    });

    $('.get_ad_post_service').on('click',function(event){
        plan_name = $('#plan_name').val();
        user_id = $('#user_id').val();
        plan_status = $('#plan_status').val();
        $.ajax({
            type : 'POST',
            url  : SITE_URL+"profile/SendRequestForAdPostService",
            data : {plan_name:plan_name,user_id:user_id},
            cache: false,
            dataType:"json",
            beforeSend: function(){
                $('.get_ad_post_service').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i>Get Ad Post Service');
                event.preventDefault();
            },
            success : function(response){
                if(response.status=="success"){
                    $('.info').html('<div class="success">Your request have been sent successfully.</div>');
                } else {
                    $('.info').html('<div class="failure">There is a problem sending mail.</div>');
                }
            },
            complete: function(){
                $('.get_ad_post_service').html('Get Ad Post Service');
            }
        });
    });

    function placeValue(suggestion_string){
        jQuery('#company_url_alias').val(suggestion_string);
    }
</script>


