<?php
    $info_array = array(
        'profile_data'=>$profile_data,
        'store_url' => $store_url
    );
    if(isset($service)){
        $info_array['service'] = $service;
        $info_array['service_plan'] = $service_plan;
    }
    echo $this->renderPartial($sidebar_type,$info_array);

?>
<style>
    .favorite-active {
        color: red;
    }
    ul.favorite_filter li{
        color: #0079CA;
        display: block;
        position: relative;
        float: left;
        height: 100px;
    }

    ul.favorite_filter li input[type=radio]{
        position: absolute;
        visibility: hidden;
    }

    ul.favorite_filter li label{
        display: block;
        position: relative;
        font-weight: 300;
        font-size: 15px;
        line-height: 12px;
        padding: 25px 25px 25px 55px;
        margin: 10px auto;
        height: 30px;
        z-index: 9;
        cursor: pointer;
        -webkit-transition: all 0.25s linear;
    }

    ul.favorite_filter li:hover label{
        color: #FF0000;
    }

    ul.favorite_filter li .check{
        display: block;
        position: absolute;
        border: 5px solid #0079CA;
        border-radius: 100%;
        height: 25px;
        width: 25px;
        top: 30px;
        left: 20px;
        z-index: 5;
        transition: border .25s linear;
        -webkit-transition: border .25s linear;
    }

    ul.favorite_filter li:hover .check {
        border: 5px solid #E25B60;
    }

    ul.favorite_filter li .check::before {
        display: block;
        position: absolute;
        content: '';
        border-radius: 100%;
        height: 13px;
        width: 13px;
        top: 1px;
        left: 1px;
        margin: auto;
        transition: background 0.25s linear;
        -webkit-transition: background 0.25s linear;
    }

    .favorite_filter input[type=radio]:checked ~ .check {
        border: 5px solid #E25B60;
    }

    .favorite_filter input[type=radio]:checked ~ .check::before{
        background: #E25B60;
    }

    .favorite_filter input[type=radio]:checked ~ label{
        color: #E25B60;
    }

    .signature {
        position: fixed;
        margin: auto;
        bottom: 0;
        top: auto;
        width: 100%;
    }

    .signature p{
        text-align: center;
        font-family: Helvetica, Arial, Sans-Serif;
        font-size: 0.85em;
        color: #AAAAAA;
    }

    .signature .much-heart{
        display: inline-block;
        position: relative;
        margin: 0 4px;
        height: 10px;
        width: 10px;
        background: #0079CA;
        border-radius: 4px;
        -ms-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .signature .much-heart::before,
    .signature .much-heart::after {
        display: block;
        content: '';
        position: absolute;
        margin: auto;
        height: 10px;
        width: 10px;
        border-radius: 5px;
        background: #0079CA;
        top: -4px;
    }

    .signature .much-heart::after {
        bottom: 0;
        top: auto;
        left: -4px;
    }

    .signature a {
        color: #AAAAAA;
        text-decoration: none;
        font-weight: bold;
    }
</style>

<div id="tabs-dashboard-01" class="uzr-panels">
    <div class="inner">

        <div id="tab001" class="uzr-panel tab-panel">
            <a class="tab-accordion-trigger" href="#tab001">
                <span><i class="adicon-grid"></i></span>
                Service Dashboard
            </a>
            <header>
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <h4>Hello <?php if($business_status != '') { echo $profile_data['enterprise_name']; } else { echo $profile_data['user_name']; } ?> !</h4>
                        <!--<span>Last account activity: 1 hour ago</span>-->
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <?php
                        //$this->renderPartial("/elements/notification",array('register_type' => $register_type));
                        ?>
                    </div>
                </div>

            </header>
            <?php if(!isset($service_status)){ ?>
            <div class="inner">
                <?php
                $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'service-plan-choose-form',
                    'enableAjaxValidation'=>false,
                    'action'=>'/my-profile/service-information',
                    'enableClientValidation'=>false,
                ));
                ?>
                <div class="call-to-action-2">
                    <?php if(!isset($service_status)) { ?>
                        <div class="">
                            <h4>Welcome To Service Provider Dashboard. Let us know about the service you want. Choose from below:</h4>
                        </div>
                        <ul class="favorite_filter">
                            <li>
                                <input id="banner-option" name="selector" checked="" value="1" type="radio">
                                <label for="banner-option">Banner</label>
                                <div class="check"></div>
                            </li>
                            <li>
                                <input id="website-option" name="selector" value="2" type="radio">
                                <label for="website-option">Website</label>
                                <div class="check">
                                    <div class="inside"></div>
                                </div>
                            </li>
                            <li>
                                <input id="landing_page-option" name="selector" value="3" type="radio">
                                <label for="landing_page-option">Landing Page</label>
                                <div class="check">
                                    <div class="inside"></div>
                                </div>
                            </li>
                        </ul>
                        <div class="clr"></div>

                        <section id="banner_pricePlans">
                            <ul id="plans">
                                <li class="plan">
                                    <ul class="planContainer">
                                        <li class="title"><h2>Banner Promote</h2></li>
                                        <li class="price"><p><span id="selected_banner_price">Cost</span>/<span>month</span></p></li>
                                        <li>
                                            <ul class="options">
                                                <?php
                                                    $counter = 1;
                                                    foreach($service_config['banner_config'] as $banner_config) {
                                                        ?>
                                                <li><div class="col-md-8 price_list"><input type="checkbox" id="banner<?php echo $counter ?>" name="banner_pricing" value="<?php echo $banner_config->price ?>" data-value="<?php echo $banner_config->id ?>"> <label for="banner<?php echo $counter ?>"><?php echo $banner_config->name ?></label></div><div class="col-md-4"><span>&#2547; <?php echo $banner_config->price ?></span></div><div class="clr"></div></li>
                                                <?php
                                                    $counter++;
                                                    }
                                                ?>
                                                <li><div class="col-md-8 price_list">Share Facebook Link</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                                <li><div class="col-md-8 price_list">Banner design</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                            </ul>
                                        </li>
                                        <li class="button"><a href="javascript:void(0)" class="view_details">View Details</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </section>
                        <section id="website_pricePlans" style="display: none;">
                            <ul id="plans">
                                <li class="plan">
                                    <ul class="planContainer">
                                        <li class="title"><h2><?php echo $service_config['website_config'][0]->name ?></h2></li>
                                        <li class="price"><p>$<?php echo $service_config['website_config'][0]->price ?>/<span><?php echo $service_config['website_config'][0]->duration ?> months</span></p></li>
                                        <li>
                                            <ul class="options">
                                                <li><div class="col-md-8 price_list">Promotional Banner</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                                <li><div class="col-md-8 price_list">Social Media Promotion</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                                <li><div class="col-md-8 price_list">Upsell Banner</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                                <li><div class="col-md-8 price_list">Share Facebook Link</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                                <li><div class="col-md-8 price_list">Banner design</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                            </ul>
                                        </li>
                                        <li class="button"><a href="javascript:void(0)" class="view_details">View Details</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </section>
                        <section id="landing_page_pricePlans" style="display: none;">
                            <ul id="plans">
                                <li class="plan">
                                    <ul class="planContainer">
                                        <li class="title"><h2><?php echo $service_config['landing_page_config'][0]->name ?></h2></li>
                                        <li class="price"><p>$<?php echo $service_config['landing_page_config'][0]->price ?>/<span><?php echo $service_config['landing_page_config'][0]->duration ?> months</span></p></li>
                                        <li>
                                            <ul class="options">
                                                <li><div class="col-md-8 price_list">Landing one page</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                                <li><div class="col-md-8 price_list">Service Banner</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                                <li><div class="col-md-8 price_list">Social Media Promotion</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                                <li><div class="col-md-8 price_list">Upsell Banner</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                                <li><div class="col-md-8 price_list">Share Facebook Link</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                                <li><div class="col-md-8 price_list">Banner design</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                            </ul>
                                        </li>
                                        <li class="button"><a href="javascript:void(0)" class="view_details">View Details</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </section>
                    <input type="hidden" name="request_type" id="request_type" value="1" />
                        <input type="hidden" name="plan_config" id="plan_config">
                    <?php } else if($service_status == 'pending') { ?>
                        <div class="">
                            <h4>You have a pending service request. Please wait for approval.</h4>
                        </div>
                    <?php } else { ?>
                        <div class="">
                            <h4>Your service request has been approved.</h4>
                        </div>
                    <?php } ?>
                </div>
                <?php
                $this->endWidget();
                ?>
                <div id="show-plan" style="display: none; margin-top: 10px;">
                    <section id="pricePlans">
                        <form action="" id="pricing-plan-form" method="post">
                            <ul id="plans">
                                <li class="plan active" style="width: 60%;margin:0 auto;float: none">
                                    <ul class="planContainer">
                                        <li class="title">Banner will be displayed like the screenshot below. Click on proceed to go to next page.</li>
                                        <li><img src="" /></li>
                                        <li class="button"><a href="javascript:void(0)" class="promotion_plan_proceed">Proceed</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </form>
                    </section>
                </div>
            </div>
            <?php } else { ?>
            <div class="inner">
                <?php if($service_status == 'approved'){ ?>
                    <div class="call-to-action-2">
                        <h2>Congratulations. You have an active service promotion for <?=$service_plan->name?>. Your service will expire at <?php $expire_date = new \DateTime($service->expire_date); echo $expire_date->format('d M Y') ?></h2>
                    </div>
                <?php } else { ?>
                    <div class="call-to-action-2">
                        <h2>Please wait for your service promotion to be approved</h2>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div><!--panel-->
    </div>
</div>
</div>
</div>
</div>
</div>
<script>
    $(document).ready(function(){

        $('.view_details').on('click',function(){
            if(!$('#plan_config').val()){
                alert('Please select banner promotion to view details');
                return false;
            }
            var image_path = baseUrl() + 'images/featured/service_promotion_' + $('#plan_config').val() + '.jpg';
            $('#show-plan img').prop('src',image_path);
            if($('#plan_config').val() == 6 || $('#plan_config').val() == 7) {
                $('#show-plan img').hide();
                $('#show-plan li.title').hide();
            }
            $('#show-plan').show();
        });

        $('.promotion_plan_proceed').on('click',function(){
            if(!$('#plan_config').val()){
                alert('Please select banner promotion to proceed');
                return false;
            }
            $('#service-plan-choose-form').submit();
        });

    });


    $('#banner-option').on('click',function(){
        $('#show-plan').hide();
        $('#request_type').val($(this).val());
        $('#banner_pricePlans').show();
        $('#website_pricePlans').hide();
        $('#landing_page_pricePlans').hide();
        if($('input[name="banner_pricing"]').is(":checked")){
            $('#plan_config').val($('input[name="banner_pricing"]:checked').attr('data-value'));
        } else {
            $('#plan_config').val("");
        }
    });

    $('#website-option').on('click',function(){
        $('#show-plan').hide();
        $('#request_type').val($(this).val());
        $('#banner_pricePlans').hide();
        $('#website_pricePlans').show();
        $('#landing_page_pricePlans').hide();
        $('#plan_config').val(6);
    });

    $('#landing_page-option').on('click',function(){
        $('#show-plan').hide();
        $('#request_type').val($(this).val());
        $('#banner_pricePlans').hide();
        $('#website_pricePlans').hide();
        $('#landing_page_pricePlans').show();
        $('#plan_config').val(7);
    });

    $('input[name="banner_pricing"]').on('click',function(){
        $('#show-plan').hide();
        var box = $(this);
        if (box.is(":checked")) {
            var group = "input:checkbox[name='" + box.attr("name") + "']";
            $(group).prop("checked", false);
            box.prop("checked", true);
            $('#selected_banner_price').html('$' + box.val());
            $('#plan_config').val(box.attr('data-value'));
        } else {
            box.prop("checked", false);
            $('#selected_banner_price').html('cost');
        }
    });

    $('#service-plan-choose-form').on('submit',function(){
        if(!$('#plan_config').val()){
           alert('Please select a banner type');
           return false;
        }
    });
</script>

