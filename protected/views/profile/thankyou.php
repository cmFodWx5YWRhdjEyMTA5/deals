<?php
    echo $this->renderPartial($sidebar_type,array(
        'profile_data'=>$profile_data,
        'business_status' => $business_status,
        'store_url' => $store_url
    ));
?>

<div id="tabs-dashboard-01" class="uzr-panels">
    <div class="inner">

        <div id="tab001" class="uzr-panel tab-panel">
            <a class="tab-accordion-trigger" href="#tab001">
                <span><i class="adicon-grid"></i></span>
                Dashboard
            </a>
            <header>
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <h4>Hello <?=$user_name?> !</h4>
                        <!--<span>Last account activity: 1 hour ago</span>-->
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <?php
                        $this->renderPartial("/elements/notification",array('register_type' => $register_type));
                        ?>
                    </div>
                </div>

            </header>
            <div class="inner">
                <div class="call-to-action-2">
                        <section id="something-sell" class="clearfix parallax-section">
                            <div class="">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <h2 class="title">Thank you for choosing our Service</h2>
                                        <h4>Our representative will contact with you soon.</h4>
                                    </div>
                                </div><!-- row -->
                            </div><!-- contaioner -->
                        </section>
                </div>

                <?php if($business_status) { ?>
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

            </div>
        </div><!--panel-->
    </div>
</div>
</div>
</div>
</div>
</div>

