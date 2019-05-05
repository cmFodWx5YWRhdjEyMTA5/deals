<?php
$token = Yii::app()->session['user_token'];
$profile_data = Generic::getProfileData($token);
$user_name = isset($profile_data['user_name']) ? $profile_data['user_name'] : '';
$register_type = isset($profile_data['register_type']) ? $profile_data['register_type'] : '';
?>


<?php
echo $this->renderPartial($sidebar_type,array(
    'profile_data'=>$profile_data,
    'business_status' => $business_status,
    'store_url' => $store_url
));
?>


<div id="tabs-dashboard-01" class="uzr-panels">
    <div class="inner">
        <div id="tab004" class="uzr-panel tab-panel">
            <a class="tab-accordion-trigger" href="#tab004">
                <span><i class="adicon-heart"></i></span>
                Favourite Ads
            </a>
            <header>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-6">
                        <div class="icon-heading">
                            <h4><i class="adicon-heart tc12"></i> Favourite Ads</h4>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <?php
                        $this->renderPartial("/elements/notification",array('register_type' => $register_type));
                        ?>
                        <div class="listing-actions pull-left" data-target="#items-listing-area" style="margin-top: -40px">
                            <div class="inner">
                                <div class="layout-action">
                                    <a href="#" class="active">
                                        <i class="fa fa-bars"></i>
                                        <span class="tooltip">List layout</span>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-th"></i>
                                        <span class="tooltip">Grid layout</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="inner">
                <div class="items-list-md style2 style3 pad-top-0">

                    <div id="items-listing-area" class="items-list clearfix">
                        <?php
                        $counter = 0;
                        foreach ($favorite_ads as $ad) {
                                $images = json_decode($ad->image_url);

                            ?>
                        <article class="item-spot">
                            <a href="#" class="imgAsBg">
                                <img src="<?php echo ImageHelper::cloudinary($images[0],$option_array); ?>" alt="<?php echo $ad->title ?>">
                            </a>
                            <div class="item-content">
                                <header>
                                    <h6><a href="<?php echo $baseUrl.'/ad?ad_id='.urlencode(base64_encode($ad->id)).'&ad_type='.urlencode(base64_encode('ads')); ?>" target="_blank"><?php echo $ad->title ?></a></h6>
                                    <span class="col-sm-12" style="padding-left: 0px;"><i class="fa fa-heart" style="color: #0083c9"></i> Liked: <?php echo $favorite_ads_counter[$counter] ?></span>
                                </header>
                                <div class="price-tag"><?php echo $ad->price ?></div>
                                <div class="dashboard-btn-actions">
                                    <a href="<?php echo $baseUrl.'/ad?ad_id='.urlencode(base64_encode($ad->id)).'&ad_type='.urlencode(base64_encode('ads')); ?>" class="btn btn-transparent" target="_blank">view ad</a>
                                </div>
                            </div>
                        </article>
                        <?php $counter++;
                        } ?>

                    </div>

                </div>
                <br>

            </div>
        </div>
    </div>
</div><!--panel-->
</div>
</div>
</div>
</div>
<script type="text/javascript">
    function ChangeFavoriteStatus(obj,ad_id){
        var search_class,find,status;
        search_class='favorite-active';
        if($(obj).hasClass("favorite")){
            find = $(obj);
        }
        else{
            if($(obj).find('.favorite')){
                find = $(obj).find('.favorite');
            }
        }

        if(find) {
            $.ajax({
                dataType: "json"
                , type: "POST"
                , url: SITE_URL + "site/ChangeFavoriteStatus"
                , data: {ad_id: ad_id}
                , success: function (data) {
                    if (data.status == 'favorite') {
                        find.addClass(search_class);
                        find.attr('title', "Remove from favorite");
                        status = 'Like';


                    } else if((data.status == 'un_favorite')) {
                        find.removeClass(search_class);
                        find.attr('title', "Add as favorite");
                        window.location = SITE_URL + 'my-profile/favourite-ads';
                    }

                },
                error: function (e) {
                    if (window.console && window.console.log) {
                        console.log('ajax error');
                    }
                }
            });
        }
    }





</script>
