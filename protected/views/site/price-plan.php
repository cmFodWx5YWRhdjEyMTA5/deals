<?php $baseUrl = Yii::app()->request->baseUrl;?>

<section id="main" class="clearfix contact-us">
    <div class="container">
        <div id="title-price" class="title"><img src="<?=$baseUrl?>/images/bg/price-pic.jpg"></div>
        <div class="container"  style="border: 1px solid #fe9c00;">
            <h3 style="border-bottom: 1px solid #c9c9c9; text-align: center;padding-bottom: 15px"><i>We accept payment methods</i></h3>
            <div class="col-md-4">
                <label style="text-decoration: underline">By Visa / Mastercard</label>
                <p><span>All Debit / Credit card</span></p>
                <img src="<?=$baseUrl?>/images/home1/p2.png" width="46" height="28">
                <img src="<?=$baseUrl?>/images/home2/pay3.png" width="43" height="25">
                <img src="<?=$baseUrl?>/images/home1/diners.jpg" width="70" height="40">
            </div>
            <div class="col-md-4" style="border-left: 1px solid #c9c9c9; border-right: 1px solid #c9c9c9">
                <label style="text-decoration: underline">By Bank deposit</label>
                <div class="form-group" id="bank_details_block">
                    <br>
                    <div>
                        <label>A/C Name:</label>
                        <span>DEWY IT LTD</span>
                    </div>
                    <div>
                        <label>A/C Number:</label>
                        <span>2001070143053</span>
                    </div>
                    <div>
                        <label>Bank Name:</label>
                        <span>Eastern Bank Ltd, Khulna Br.</span>
                    </div>
                    <div>
                        <label>Swift Code:</label>
                        <span>EBLDBDDH</span>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <label style="text-decoration: underline">By Direct payment</label>
                <p><img src="<?=$baseUrl?>/images/home1/hand-in-cash.png?" style="padding:9px 0 0 120px"></p>
            </div>
        </div><br>
        <div id="send_request_confirmation"></div>
        <div id="tabs">
            <section id="main" class="clearfix contact-us" style="padding: 0">
            <ul>
                <li><a href="#tabs-1">BUSINESS E-STORE</a></li>
                <li><a href="#tabs-2">SERVICE PROMOTION</a></li>
                <li><a href="#tabs-3">INDIVIDUAL PLAN</a></li>
            </ul>
            <div id="tabs-1">
                <div id="tab009" class="uzr-panel tab-panel">
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
                                    <li class="plan active" style="width: 60%;margin: 0 auto; float: none">
                                        <ul class="planContainer">
                                            <li class="title"><h2 id="price_plan_name"><?=isset($business_plan_details['name'])?></h2></li>
                                            <li class="price"><p style="font-size: 32px;height: 48px;line-height: 1.46em;background: #f7814d"><?=$currency_sign?> <span id="price_plan_price" style="color: #fff"><?=isset($business_plan_details['price'])?></span> <span style="font-size: 16px;color: #fff0ef;" id="price_plan_duration">/ <?=isset($business_plan_details['duration'])?></span></p></li>
                                            <li id="price_plan_details">
                                                <?=isset($business_plan_details['details'])?>
                                            </li><br>
                                            <label for="get_ad_post"><input type="checkbox" id="get_ad_post" name="get-ad-post" style="margin-left: -12px;"><span style="color: #364762; font-weight: bold"> Get Ads Post Services (Post Ads by Support Team).<br> Extra &#2547; 1000 will be charged.</span></label>
                                            <li class="button"><a href="javascript:void(0);" onclick="CheckLogin()" class="pricing_plan_proceed">Proceed</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <input type="hidden" id="pricing_plan_id" name="pricing_plan_id" value="">
                                <input type="hidden" id="get-ad-post-service" name="get-ad-post-service" value="">
                            </form>
                        </section>
                    </div>

                </div><!--panel-->
            </div>
            <div id="tabs-2">
                <section id="pricePlans">
                    <form action="" id="pricing-plan-form" method="post">
                        <ul id="plans">
                            <li class="plan">
                                <ul class="planContainer">
                                    <li class="title" style="background: #fff"><h3 id="price_plan_name" style="color: #000">Website Promote</h3></li>
                                    <li class="price"><p style="font-size: 32px;height: 48px;line-height: 1.46em;background: #f7814d"><?=$currency_sign?> <span id="price_plan_price" style="color: #fff"><?=$web_promotion?></span> <span style="font-size: 16px;color: #fff0ef;" id="price_plan_duration">/ 3 Months</span></p></li>
                                    <li id="price_plan_details1">
                                        <ul class="options">
                                            <li><div class="col-md-8 price_list">Promotional Banner</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                            <li><div class="col-md-8 price_list">Social Media Promotion</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                            <li><div class="col-md-8 price_list">Upsell Banner</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                            <li><div class="col-md-8 price_list">Share Facebook Link</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                            <li><div class="col-md-8 price_list">Banner design</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                        </ul>
                                    </li><br>
                                    <li class="button"><a href="javascript:void(0);" onclick="CheckLogin()" class="pricing_plan_proceed">Proceed</a></li>
                                </ul>
                            </li>
                            <li class="plan active">
                                <ul class="planContainer">
                                    <li class="title"><h3 id="price_plan_name">Banner Promote</h3></li>
                                    <li class="price"><p style="font-size: 32px;height: 48px;line-height: 1.46em;background: #f7814d"><span id="price_plan_price" style="color: #fff">Duration</span> <span style="font-size: 16px;color: #fff0ef;" id="price_plan_duration">/ 3 Months</span></p></li>
                                    <li id="price_plan_details2">
                                        <ul class="options">
                                            <li><div class="col-md-8 price_list">Home top Banner</div><div class="col-md-4"><span><?=$currency_sign?> <?=$banner_hometop?></span></div><div class="clr"></div></li>
                                            <li><div class="col-md-8 price_list">Category Banner</div><div class="col-md-4"><span><?=$currency_sign?> <?=$banner_category?></span></div><div class="clr"></div></li>
                                            <li><div class="col-md-8 price_list">Menu Banner</div><div class="col-md-4"><span><?=$currency_sign?> <?=$banner_menu?></span></div><div class="clr"></div></li>
                                            <li><div class="col-md-8 price_list">Promotional Banner</div><div class="col-md-4"><span><?=$currency_sign?> <?=$banner_promo?></span></div><div class="clr"></div></li>
                                            <li><div class="col-md-8 price_list">Upsell Banner</div><div class="col-md-4"><span><?=$currency_sign?> <?=$banner_upsell?></span></div><div class="clr"></div></li>
                                            <li><div class="col-md-8 price_list">Share Facebook Link</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                            <li><div class="col-md-8 price_list">Banner design</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                        </ul>
                                    </li><br>
                                    <li class="button"><a href="javascript:void(0);" onclick="CheckLogin()" class="pricing_plan_proceed">Proceed</a></li>
                                </ul>
                            </li>
                            <li class="plan">
                                <ul class="planContainer">
                                    <li class="title"><h3 id="price_plan_name">Landing Page</h3></li>
                                    <li class="price"><p style="font-size: 32px;height: 48px;line-height: 1.46em;background: #f7814d"><?=$currency_sign?> <span id="price_plan_price" style="color: #fff"><?=$landing_page?></span> <span style="font-size: 16px;color: #fff0ef;" id="price_plan_duration">/ 6 Months</span></p></li>
                                    <li id="price_plan_details3">
                                        <ul class="options">
                                            <li><div class="col-md-8 price_list">Landing one page</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                            <li><div class="col-md-8 price_list">Service Banner</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                            <li><div class="col-md-8 price_list">Social Media Promotion</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                            <li><div class="col-md-8 price_list">Upsell Banner</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                            <li><div class="col-md-8 price_list">Share Facebook Link</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                            <li><div class="col-md-8 price_list">Banner design</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                        </ul>
                                    </li><br>
                                    <li class="button"><a href="javascript:void(0);" onclick="CheckLogin()" class="pricing_plan_proceed">Proceed</a></li>
                                </ul>
                            </li>
                        </ul>
                        <input type="hidden" id="pricing_plan_id" name="pricing_plan_id" value="">
                        <input type="hidden" id="get-ad-post-service" name="get-ad-post-service" value="">
                        <input type="hidden" id="currency_rate" name="currency_rate" value="<?=$currency_rate?>">
                    </form>
                </section>
            </div>
                <div id="tabs-3">
                    <section id="pricePlans">
                        <form action="" id="pricing-plan-form" method="post">
                            <ul id="plans">
                                <li class="plan active" style="margin:0 auto;float: none;">
                                    <ul class="planContainer">
                                        <li class="title"><h3 id="price_plan_name">Individual Ads</h3></li>
                                        <li class="price"><p style="font-size: 32px;height: 48px;line-height: 1.46em;background: #f7814d"><?=$currency_sign?> <span id="price_plan_price" style="color: #fff"><?=$individual?></span> <span style="font-size: 16px;color: #fff0ef;" id="price_plan_duration">/ 1 Month</span></p></li>
                                        <li id="price_plan_details4">
                                            <ul class="options">
                                                <li><div class="col-md-8 price_list">Individual ads</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                                <li><div class="col-md-8 price_list">Share Facebook Link</div><div class="col-md-4"><span>Yes</span></div><div class="clr"></div></li>
                                            </ul>
                                        </li><br>
                                        <li class="button"><a href="javascript:void(0);" onclick="CheckLogin()" class="pricing_plan_proceed">Proceed</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <input type="hidden" id="pricing_plan_id" name="pricing_plan_id" value="">
                            <input type="hidden" id="get-ad-post-service" name="get-ad-post-service" value="">
                        </form>
                    </section>
                </div>
                </section>
    </div><!-- container -->
        </div>
</section><!-- main -->

<div class="modal fade" id="myModal_ads_special_plan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 600px">
        <div class="modal-content" style="position: relative;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Send Request For <div class="result"></div></h4>
            </div>
            <div class="modal-body">
                <?php
                $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'sending-ads-request-form',
                    'enableAjaxValidation'=>false,
                    'action'=>'javascript:void(0)',
                    'enableClientValidation'=>false,

                ));
                ?>
                <input type="hidden" id="myRequest" name="my_request" value="" />
                <div class="row">
                        <div class="row form-group item-description" title="Name">
                            <label class="col-sm-3 label-title">Name</label>
                            <div class="col-sm-9">
                                <?php if(isset($loggedin_user)) { ?>
                                    <span><?php echo $loggedin_user->user_name ?></span>
                                    <input type="hidden" class="form-control" name="sender_name" id="sender_name" value="<?php echo $loggedin_user->user_name ?>" />
                                <?php } else { ?>
                                    <input type="text" class="form-control" name="sender_name" id="sender_name" placeholder="Your name" required />
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row form-group item-description" title="Email">
                            <label class="col-sm-3 label-title">Email</label>
                            <div class="col-sm-9">
                                <?php if(isset($loggedin_user)) { ?>
                                    <span><?php echo $loggedin_user->email ?></span>
                                    <input type="hidden" class="form-control" name="sender_email" id="sender_email" value="<?php echo $loggedin_user->email ?>" />
                                <?php } else { ?>
                                    <input type="email" class="form-control" name="sender_email" id="sender_email" placeholder="Your Email" required />
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row form-group item-description" title="Phone">
                            <label class="col-sm-3 label-title">Phone</label>
                            <div class="col-sm-9">
                                <?php if(isset($loggedin_user)) { ?>
                                    <span><?php echo $loggedin_user->phone_number ?></span>
                                    <input type="hidden" class="form-control" name="sender_phone" id="sender_phone" value="<?php echo $loggedin_user->phone_number ?>" />
                                <?php } else { ?>
                                    <input type="tel" class="form-control" name="sender_phone" id="sender_phone" placeholder="Your Phone" required />
                                <?php } ?>
                            </div>
                        </div>
                      <span style="display: none; padding-left: 10px; width: 50px; float: left;" id="favorite-send-loading">
                                            <img alt="Loading..." src="/images/loader.gif">
                                        </span>
                    <button type="submit" class="btn btn-primary">Send Request</button>
                </div>
                <div class="clr"></div>
                <?php $this->endWidget();?>
            </div><!-- slider -->


        </div>

    </div>
</div>

<div class="modal fade" id="myModal_business_ads_plan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 600px">
        <div class="modal-content" style="position: relative;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Choose Plan For <div class="result_for_business_ads"></div></h4>
            </div>
            <div class="modal-body">
                <?php
                $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'sending-business-request-form',
                    'enableAjaxValidation'=>false,
                    'action'=>'javascript:void(0)',
                    'enableClientValidation'=>false,

                ));
                ?>
                <input type="hidden" id="myRequest2" name="my_request" value="" />
                    <div class="row">
                        <div class="row form-group item-description" title="Name">
                            <label class="col-sm-3 label-title">Name</label>
                            <div class="col-sm-9">
                                <?php if(isset($loggedin_user)) { ?>
                                    <span><?php echo $loggedin_user->user_name ?></span>
                                    <input type="hidden" class="form-control" name="sender_name" id="sender_name1" value="<?php echo $loggedin_user->user_name ?>" />
                                <?php } else { ?>
                                    <input type="text" class="form-control" name="sender_name" id="sender_name1" placeholder="Your name" required />
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row form-group item-description" title="Email">
                            <label class="col-sm-3 label-title">Email</label>
                            <div class="col-sm-9">
                                <?php if(isset($loggedin_user)) { ?>
                                    <span><?php echo $loggedin_user->email ?></span>
                                    <input type="hidden" class="form-control" name="sender_email" id="sender_email1" value="<?php echo $loggedin_user->email ?>" />
                                <?php } else { ?>
                                    <input type="email" class="form-control" name="sender_email" id="sender_email1" placeholder="Your Email" required />
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row form-group item-description" title="Phone">
                            <label class="col-sm-3 label-title">Phone</label>
                            <div class="col-sm-9">
                                <?php if(isset($loggedin_user)) { ?>
                                    <span><?php echo $loggedin_user->phone_number ?></span>
                                    <input type="hidden" class="form-control" name="sender_phone" id="sender_phone1" value="<?php echo $loggedin_user->phone_number ?>" />
                                <?php } else { ?>
                                    <input type="tel" class="form-control" name="sender_phone" id="sender_phone1" placeholder="Your Phone" required />
                                <?php } ?>
                            </div>
                        </div>
                        <span style="display: none; padding-left: 10px; width: 50px; float: left;" id="favorite-send-loading1">
                                            <img alt="Loading..." src="/images/loader.gif">
                                        </span>
                        <button type="submit" class="btn btn-primary">Send Request</button>
                    </div>
                    <div class="clr"></div>
                <?php $this->endWidget();?>
            </div><!-- slider -->


        </div>

    </div>
</div>

<style>
    .divTable{
        display:table;
        width:auto;
        background-color:#eee;
        /*border:1px solid  #666666;*/
        border-spacing:5px;/*cellspacing:poor IE support for  this*/
    }
    .divRow{
        display:table-row;
        width:auto;
        clear:both;
    }
    .divCell{
        float:left;/*fix for  buggy browsers*/
        display:table-column;
        /*width:190px;*/
        background-color:#fe9c00;
        padding: 8px;
        text-align: center;
    }
    .divCell2{
        float:left;/*fix for  buggy browsers*/
        display:table-column;
        /*width:60px;*/
        background-color:#fe9c00;
        padding: 8px;
        margin-left: 5px;
        text-align: center;
    }

    .divRow:hover .btn{
        background-color: #0072bc;
        color: #fff;
    }
    #Home-page-ads:hover {
        position: relative;
    }
    #Home-page-ads:hover:after {
        /*content: url(images/home_page_ads.png);*/ /* no need for qoutes */
        display: block;
        position: absolute;
        left: 770px; /* change this value to one that suits you */
        top: 0px; /* change this value to one that suits you */
    }
    #Search-Page:hover {
        position: relative;
    }
    #Search-Page:hover:after {
        /*content: url(images/search_page.png);*/ /* no need for qoutes */
        display: block;
        position: absolute;
        left: 770px; /* change this value to one that suits you */
        top: 0px; /* change this value to one that suits you */
    }
    #Ads-details-page:hover {
        position: relative;
    }
    #Ads-details-page:hover:after {
        /*content: url(images/ads_details_page.png);*/ /* no need for qoutes */
        display: block;
        position: absolute;
        left: 770px; /* change this value to one that suits you */
        top: 0px; /* change this value to one that suits you */
    }
    #All-ads-page:hover {
        position: relative;
    }
    #All-ads-page:hover:after {
        /*content: url(images/all_ads_page.png);*/ /* no need for qoutes */
        display: block;
        position: absolute;
        left: 770px; /* change this value to one that suits you */
        top: -168px; /* change this value to one that suits you */
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
        padding-left: 57px;
    }
</style>

<link rel="stylesheet" href="/css/tab/jquery-ui.css">

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $( function() {
        $( "#tabs" ).tabs();
    } );
</script>

<script>
    window.onload = function () {
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
    }

</script>

<script>
    $('a.position').on('click', function () {
        var id =  $(this).parent().parent().attr('id');
        var text = $(this).parent().children(".divCell").html();
        document.getElementById('myRequest').value = text + ' in '+ id;
        $('.result').html(text + ' in '+ id);
        $('#myModal_ads_special_plan').modal('show');
    })


    $('a.plan1').on('click', function () {
        var type = $(this).parent().parent().children().html();
        if($("#standard").is(':checked')){
            var ads_by = "Get ads post services";
        } else {
            var ads_by = "";
        }
        document.getElementById('myRequest2').value = type + ' '+ ads_by;
        $('#myModal_business_ads_plan').modal('show');
        $('.result_for_business_ads').html(type + ' '+ ads_by);
    })

    $('a.plan2').on('click', function () {
        var type = $(this).parent().parent().children().html();
        if($("#silver").is(':checked')){
            var ads_by = "Get ads post services";
        } else {
            var ads_by = "";
        }
        document.getElementById('myRequest2').value = type + ' '+ ads_by;
        $('#myModal_business_ads_plan').modal('show');
        $('.result_for_business_ads').html(type + ' '+ ads_by);
    })

    $('a.plan3').on('click', function () {
        var type = $(this).parent().parent().children().html();
        if($("#platinum").is(':checked')){
            var ads_by = "Get ads post services";
        } else {
            var ads_by = "";
        }
        document.getElementById('myRequest2').value = type + ' '+ ads_by;
        $('#myModal_business_ads_plan').modal('show');
        $('.result_for_business_ads').html(type + ' '+ ads_by);
    })

    $('#sending-ads-request-form').on('submit',function () {
        var name = $('#sender_name').val();
        var email = $('#sender_email').val();
        var phone = $('#sender_phone').val();
        var data = $('#sending-ads-request-form').serialize();
        $('#favorite-send-loading').show();
        if(name == '' || email == '' || phone == ''){
            return false;
        }

        $.ajax({
            type : 'POST',
            url  : SITE_URL+"site/SendAdsRequestForPricePlan",
            data : data,
            cache: false,
            dataType:"json",
            success : function(response){
                if(response.status=="success"){
                    $('#send_request_confirmation').html('<span class="info" style="color: #fff">Send request successfully</span>');
                    $('#myModal_ads_special_plan').modal('hide');
                    $('#favorite-send-loading').hide();
                }
            }


        });

    });


    $('#sending-business-request-form').on('submit',function () {
        var name = $('#sender_name1').val();
        var email = $('#sender_email1').val();
        var phone = $('#sender_phone1').val();
        var data = $('#sending-business-request-form').serialize();
        $('#favorite-send-loading1').show();
        if(name == '' || email == '' || phone == ''){
            return false;
        }

        $.ajax({
            type : 'POST',
            url  : SITE_URL+"site/SendAdsRequestForPricePlan",
            data : data,
            cache: false,
            dataType:"json",
            success : function(response){
                if(response.status=="success"){
                    $('#send_request_confirmation').html('<span class="info" style="color: #fff">Send request successfully</span>');
                    $('#myModal_business_ads_plan').modal('hide');
                    $('#favorite-send-loading1').hide();
                }
            }


        });

    });



    function CheckLogin(){
        $.ajax({
            type : 'POST',
            async: false,
            url  : SITE_URL+"site/CheckLoginStatus",
            cache: false,
            dataType:"json",
            success: function(data)
            {
                if (data.status==='not_login' ) {
                    window.location = SITE_URL+'sign-in';
                }
                else if(data.status==='login'){
                    if(data.register_type == 'business'){
                        window.location = SITE_URL+'my-profile/add-ads';

                    }else{

                        window.location = SITE_URL+'add-post-details';
                    }

                }

            },
            error: function(){
                alert('Error!')
            }
        })}

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
</script>

