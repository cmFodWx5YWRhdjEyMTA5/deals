<?php
$baseUrl = Yii::app()->getBaseUrl(true);

    $info_array = array(
        'profile_data'=>$profile_data,
        'business_status' => $business_status,
        'store_url' => $store_url
    );
    if(isset($isp_details) && $isp_details != ''){
        $info_array['user_ads_array'] = $user_ads_array;
        $info_array['isp_details'] = $isp_details;
    }
    echo $this->renderPartial($sidebar_type,$info_array);
    if(isset($user_ads_array)) {
        if (!$user_ads_array) {
            $user_ads_array = (array)$user_ads_array;
            $user_ads_array['user_total_ad_count'] = 0;
            $user_ads_array['user_total_featured_ad_count'] = 0;
            $user_ads_array['user_total_premium_ad_count'] = 0;
            $user_ads_array['user_total_top_ad_count'] = 0;
        }
    }

    //Generic::_setTrace(count($active_ads));
?>
<style type="text/css">
    .green {
        color: #348c34;
    }
    .red {
        color: #ef0303;
    }
</style>

<div id="tabs-dashboard-01" class="uzr-panels">
    <div class="inner">

        <div id="tab001" class="uzr-panel tab-panel">
            <a class="tab-accordion-trigger" href="#tab001">
                <span><i class="adicon-grid"></i></span>
                Dashboard
            </a>
            <header>
                <div class="row">
                    <!-- If E-store is incomplete -->
                    <?php if($remarks){ ?>
                    <div class="col-xs-8 col-md-4">
                        <h4>Hello <?=$profile_data['user_name'];?> !</h4>
                        <h5>Registration Number: <?=$profile_data['id'];?></h5>
                        <p><h5 style="color: green"><?php if($business_status != '') { echo strtoupper($profile_data['enterprise_name']); }?></h5></p>
                        <!--<span>Last account activity: 1 hour ago</span>-->
                    </div>
                    <!-- Red notification button -->
                    <div class="col-xs-4 col-md-3">
                        <a href="<?php echo Yii::app()->createUrl('/my-profile/update-e-store');?>" type="button" class="btn btn-danger" style="margin-top: 0;">
                            Incomplete<br>E-store !
                        </a>
                    </div>
                    <div class="col-xs-12 col-md-5">
                        <?php
                        $this->renderPartial("/elements/notification",array('register_type' => $register_type));
                        ?>
                    </div>
                    <!-- If E-store is complete -->
                    <?php } else {?>
                        <div class="col-xs-12 col-md-6">
                            <h4>Hello <?=$profile_data['user_name'];?> !</h4>
                            <h5>Registration Number: <?=$profile_data['id'];?></h5>
                            <p><h5 style="color: green"><?php if($business_status != '') { echo strtoupper($profile_data['enterprise_name']); }?></h5></p>
                            <!--<span>Last account activity: 1 hour ago</span>-->
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <?php
                            $this->renderPartial("/elements/notification",array('register_type' => $register_type));
                            ?>
                        </div>
                    <?php }?>
                </div>

            </header>
            <div class="inner">
                <div class="call-to-action-2">
                    <!-- IF Store slogan,logo,banner and categories are null $remarks = 1 -->
                    <?php if($remarks){ ?>
                        <div class="alert alert-info alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-right: 2%;">&times;</a>
                            Please Complete Your Estore Configuration By Filling All Necessary Information
                            <a href="<?php echo Yii::app()->createUrl('/my-profile/update-e-store');?>"><strong>Here</strong></a>.
                        </div>
                    <?php } ?>
                    <?php if($profile_data['register_type'] == 'business') { ?>
                        <section id="something-sell" class="clearfix parallax-section">
                            <div class="">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <?php if($business_status == 'pending') { ?>
                                            <h2 class="title">You have an ISP registration waiting for Approval</h2>
                                            <h4>Please wait while it is approved.</h4>
                                        <?php } else if($business_status == 'pending') { ?>
                                            <h2 class="title">You have an Estore waiting for Approval</h2>
                                            <h4>Please wait while it is approved.</h4>
                                        <?php } else if($business_status == 'no_store') { ?>
                                            <h2 class="title" style="color: #fff">Do you want to create estore?</h2>
                                            <h4 style="color: #fff">Choose a service plan and create Estore!!</h4>
                                            <a href="<?php echo Yii::app()->createUrl('/my-profile/create-e-store');?>" class="btn btn-theme" style="width: 34%;font-size: 18px">Choose Your Plan</a>
                                        <?php } else if($business_status == 'expired') { ?>
                                            <h3 class="title">Your Subscription Plan Has been Expired.</h3>
                                            <h4>Please Renew or Upgrade.</h4>
                                            <a href="/my-profile/change-plan" class="btn btn-primary">Renew/Upgrade Subscription Plan</a>
                                        <?php } else if($business_status == 'approved'){ ?>
                                            <?php
                                            
                                            if($isp_details){
                                            $error_message = "";
                                            $class = "display:none";
                                                //Generic::_setTrace($user_ads_array);
                                            ?>
                                            <div class="inner" style="<?=$class?>">
                                                <p><strong style="color: #ff5765"><?=$error_message?></strong></p>
                                                <?php if($error_message != '') {?>
                                                    <a href="/my-profile/change-plan" class="btn btn-primary">Upgrade Subscription Plan</a>
                                                <?php } ?>
                                            </div>
                                                <h3 class="title">Uploaded Packages : &nbsp;&nbsp;<?php if($user_ads_array != '') { echo $user_ads_array['user_total_ad_count']; } else { echo '0'; } ?></h3>
                                                <h3 class="title">Duration : &nbsp;&nbsp;<?php echo date('Y-m-d',strtotime($isp_details->expire_date)) ?></h3>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div><!-- row -->
                            </div><!-- container -->
                        </section>
                    <?php } elseif($profile_data['register_type'] == 'store') { ?>
                        <section id="something-sell" class="clearfix parallax-section">
                            <div class="">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <?php if($business_status == 'pending' && $register_type == 'business') { ?>
                                            <h2 class="title">You have an ISP registration waiting for Approval</h2>
                                            <h4>Please wait while it is approved.</h4>
                                        <?php } else if($business_status == 'pending' && $register_type == 'store') { ?>
                                            <h2 class="title">You have an Estore waiting for Approval</h2>
                                            <h4>Please wait while it is approved.</h4>
                                        <?php } else if($business_status == 'no_store') { ?>
                                            <h2 class="title" style="color: #fff">Do you want to create estore?</h2>
                                            <h4 style="color: #fff">Choose a service plan and create Estore!!</h4>
                                            <a href="<?php echo Yii::app()->createUrl('/my-profile/create-e-store');?>" class="btn btn-theme" style="width: 34%;font-size: 18px">Choose Your Plan</a>
                                        <?php } else if($business_status == 'expired') { ?>
                                            <h3 class="title">Your Subscription Plan Has been Expired.</h3>
                                            <h4>Please Renew or Upgrade.</h4>
                                            <a href="/my-profile/change-plan" class="btn btn-primary">Renew/Upgrade Subscription Plan</a>
                                        <?php } else if($business_status == 'approved'){ ?>
                                            <?php
                                            if(isset($user_ads_array) && $plan_details_array){
                                            $error_message = "";
                                            $class = "display:none";
                                                if(isset($user_ads_array['user_total_ad_count'])) {
                                                    if ($user_ads_array['user_total_ad_count'] >= $plan_details_array['ad_count']) {
                                                        $error_message = "<h3>You exceed total number of products of your subscribed plan.<h3>";
                                                        $class = "display:block";
                                                    }
                                                }
                                            ?>
                                            <div class="inner" style="<?=$class?>">
                                                <p><strong style="color: #ff5765"><?=$error_message?></strong></p>
                                                <?php if($error_message != '') {?>
                                                    <a href="/my-profile/change-plan" class="btn btn-primary">Upgrade Subscription Plan</a>
                                                <?php } ?>
                                            </div>
                                                <h3 class="title">Uploaded Products : &nbsp;&nbsp;<?php if($user_ads_array != '') { echo $user_ads_array['user_total_ad_count']; } else { echo '0'; } ?></h3>
                                                <h3 class="title">Featured Products : &nbsp;&nbsp;<?php if($user_ads_array != '') { echo $user_ads_array['user_total_featured_ad_count']; } else { echo '0'; } ?></h3>
                                                <h3 class="title">Premium Products : &nbsp;&nbsp;<?php if($user_ads_array != '') { echo $user_ads_array['user_total_premium_ad_count']; } else { echo '0'; } ?></h3>
                                                <h3 class="title">Top Products : &nbsp;&nbsp;<?php if($user_ads_array != '') { echo $user_ads_array['user_total_top_ad_count']; } else { echo '0'; } ?></h3>
                                                <h3 class="title">Duration : &nbsp;&nbsp;<?php echo date('Y-m-d',strtotime($subscription_details['expiration_date'])) ?></h3>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div><!-- row -->
                            </div><!-- container -->
                        </section>
                    <?php } else { ?>
                        <div class="inner">
                            <?php if(!empty($active_ads) || !empty($inactive_ads)){ ?>
                                <h3><span class="green">Active Ads: <?php echo count($active_ads) ?> </span></h3>
                                <h3><span class="red">Waiting for Approval Ads: <?php echo count($inactive_ads) ?> </span></h3>
                            <?php } else { ?>
                                <p>You don't have any active Ads. <strong>Post an ad now!</strong></p>
                                <a href="javascript:void(0);" onclick="CheckLogin()" class="btn btn-transparent">post an ad</a>
                        <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <?php if($register_type == 'business') { ?>
                    <?php if($business_status == 'approved' || $business_status == 'expired') { ?>
                    <div class="cat-boxes clearfix">
                        <a href="<?php echo Yii::app()->createUrl('/my-profile/my-packages'); ?>" class="cat-box">
                            <div class="inner">
                                <div class="adicon-document"></div>
                                <span>my packages</span>
                            </div>
                        </a>
                        <a href="<?php echo Yii::app()->createUrl('/my-profile/messages'); ?>" class="cat-box">
                            <div class="inner">
                                <div class="adicon-envelope bg6"></div>
                                <span>messages</span>
                            </div>
                        </a>
                        <a href="<?php echo Yii::app()->createUrl('/my-profile/favourite-ads'); ?>" class="cat-box">
                            <div class="inner">
                                <div class="adicon-heart bg12"></div>
                                <span>favorite ads</span>
                            </div>
                        </a>
                        <a href="<?php echo Yii::app()->createUrl('/my-profile/my-searches'); ?>" class="cat-box">
                            <div class="inner">
                                <div class="adicon-car bg5"></div>
                                <span>my searches</span>
                            </div>
                        </a>

                        <a href="<?php echo Yii::app()->createUrl('/my-profile/settings'); ?>" class="cat-box">
                            <div class="inner">
                                <div class="adicon-settings bg4"></div>
                                <span>settings</span>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                <?php } else { ?>
                    <?php if($business_status == 'approved' || $business_status == 'expired') { ?>
                    <div class="cat-boxes clearfix">
                        <a href="<?php echo Yii::app()->createUrl('/my-profile/my-ads'); ?>" class="cat-box">
                            <div class="inner">
                                <div class="adicon-document"></div>
                                <span>my ads</span>
                            </div>
                        </a>
                        <a href="<?php echo Yii::app()->createUrl('/my-profile/messages'); ?>" class="cat-box">
                            <div class="inner">
                                <div class="adicon-envelope bg6"></div>
                                <span>messages</span>
                            </div>
                        </a>
                        <a href="<?php echo Yii::app()->createUrl('/my-profile/favourite-ads'); ?>" class="cat-box">
                            <div class="inner">
                                <div class="adicon-heart bg12"></div>
                                <span>favorite ads</span>
                            </div>
                        </a>
                        <a href="<?php echo Yii::app()->createUrl('/my-profile/my-searches'); ?>" class="cat-box">
                            <div class="inner">
                                <div class="adicon-car bg5"></div>
                                <span>my searches</span>
                            </div>
                        </a>

                        <a href="<?php echo Yii::app()->createUrl('/my-profile/settings'); ?>" class="cat-box">
                            <div class="inner">
                                <div class="adicon-settings bg4"></div>
                                <span>settings</span>
                            </div>
                        </a>
                    </div>
                    <?php } ?>

                <?php } ?>

            </div>
        </div><!--panel-->
    </div>
</div>
</div>
</div>
</div>
</div>

