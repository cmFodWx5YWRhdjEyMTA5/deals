<?php
$uri = Yii::app()->request->requestUri;
$base_url = Yii::app()->request->getBaseUrl(true);
$current_url = $base_url.$uri;
$category_id = $store_details->categories;
$individual_category_id = explode(',',$category_id);
foreach($individual_category_id as $id){
    $category_name[] = Category::model()->findByPk($id);
}
$title = isset($ad_details['title']) ? $ad_details['title'] : '';
$image_url = isset($ad_details['image_url']) ? $ad_details['image_url'] : '';
$description = isset($ad_details['description']) ? $ad_details['description'] : '';
$price = isset($ad_details['price']) ? $ad_details['price'] : '';
$user_id = $ad_details['user_id'];
$profile_data = Generic::getUserData($user_id);
$phone_number = isset($profile_data['phone_number']) ? $profile_data['phone_number'] : '';
$images = json_decode($ad_details['image_url']);
$ad_details_all = Generic::getAddDetailsFromAddMetaTable($ad_details['id']);
$category_id = isset($ad_details['category_id']) ? $ad_details['category_id'] : '';
$opt_main_image = array(
    'w' => '1000',
    'h' => '800',
    'g' => 'center',
    'r' => '0'
);

$small_image_opt = array(
    'w' =>'200',
    'h' =>'192',
    'g'=>'center',
    'r' => '0'
);
$related_image_opt= array(
    'w' =>'270',
    'h' =>'336',
    'g'=>'center',
    'r' => '0',
    'c' => 'pad'
);
$item_code = $ad_details['ad_id'];
$uri = Yii::app()->request->requestUri;
$base_url = Yii::app()->request->getBaseUrl(true);
$current_url = $base_url.$uri;
$link = $current_url;

$favorite_ads = Generic::getAllFavoritesAds();
$fav_params = "this,'".$ad_details['id']."'";
$favorites_class = "";
$favorites_title = "Ad as favorite";
if($favorite_ads && in_array($ad_details['id'],$favorite_ads)){
    $favorites_class = "favorite-active";
    $favorites_title = "Remove From favorite";

}


$baseUrl = Yii::app()->request->getBaseUrl(true);
$image_path = $baseUrl. "/images/logo.jpg";
$image_path = (isset($images) && !empty($images))? $images[0] : $image_path ;

$og_image = $image_path;

$meta_desc = strip_tags($description);
$og_title =  $title;
$og_desc =  $description;
$meta_keyword = "";

Yii::app()->clientScript->registerMetaTag($og_title,null,null,array('property'=>'og:title'));
Yii::app()->clientScript->registerMetaTag(strip_tags($description),null,null,array('property'=>'og:description'));
Yii::app()->clientScript->registerMetaTag($og_image,null,null,array('property'=>'og:image'));

Yii::app()->clientScript->registerMetaTag('image/jpg',null,null,array('property'=>'og:image:type'));
Yii::app()->clientScript->registerMetaTag('300',null,null,array('property'=>'og:image:width'));
Yii::app()->clientScript->registerMetaTag('300',null,null,array('property'=>'og:image:height'));

#for tweeter
Yii::app()->clientScript->registerMetaTag('summary','twitter:card');
Yii::app()->clientScript->registerMetaTag($og_title,'twitter:title');
Yii::app()->clientScript->registerMetaTag($link,'twitter:url');
Yii::app()->clientScript->registerMetaTag($og_desc,'twitter:description');
Yii::app()->clientScript->registerMetaTag($og_image,'twitter:image');


$facebook_link = (isset($store_details->facebook_link) && !empty($store_details->facebook_link)) ? $store_details->facebook_link : "#" ;
$twitter_link = (isset($store_details->twitter_link) && !empty($store_details->twitter_link)) ? $store_details->twitter_link : "#" ;
$linkedin_link = (isset($store_details->linkedin_link) && !empty($store_details->linkedin_link)) ? $store_details->linkedin_link : "#" ;
$google_plus_link = (isset($store_details->google_plus_link) && !empty($store_details->google_plus_link)) ? $store_details->google_plus_link : "#" ;

?>


<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-584a8c4494271a7c"></script>


<div class="wrap">
    <?php
        echo $this->renderPartial('common_header',array(
            'user_details' => $user_details,
            'current_url' => $current_url,
            'store_details' => $store_details,
            'opt' => $opt,
            'category_name' => $category_name
            ));
    ?>
    <!-- End Header -->
    <div id="content">
        <div class="content-shop left-sidebar">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8 col-xs-12 main-content">
                        <div class="main-content-shop">
                            <div class="main-detail">
                                <div class="row">
                                    <div class="col-md-5 col-sm-12 col-xs-12">
                                        <div class="detail-gallery">
                                            <div class="mid">
                                                <img width="350" height="320" src="<?= $images[0]?>" alt=""/>
                                                <p><i class="fa fa-search"></i> Mouse over to zoom in</p>
                                            </div>
                                            <div class="carousel">
                                                <ul>
                                                    <?php
                                                    $counter = 0;
                                                    foreach($images as $image)
                                                    {
                                                        if($counter == 0){
                                                        $class = "active";
                                                    } else {
                                                        $class = "";
                                                    }
                                                    $counter++;
                                                     ?>
                                                    <li><a href="javascript:void(0);" class="<?=$class?>"><img width="80" height="70" src="<?=$image?>" alt=""/></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                            <div class="gallery-control">
                                                <a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
                                                <a href="#" class="next"><i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- End Gallery -->
                                    </div>
                                    <div class="col-md-7 col-sm-12 col-xs-12">
                                        <div class="detail-info">
                                            <h2 class="title-detail"><?=$title?></h2>
                                            <div class="col-md-12">
                                             <!--<a class="link-wishlist favorite <?=$favorites_class?>" title="<?=$favorites_title?>"  href="javascript:void(0);" onclick="ChangeFavoriteStatus(<?=$fav_params;?>)"></a><label> Liked : <span id="favourite"><?=$favorite_counter?></span></label> -->
                                                <div class="product-view">
                                                        <i class="fa fa-eye"></i> <label> Total Views: </label> <span><?=$view_count?></span>
                                                </div>

                                                <div class="product-price-type">
                                                    <?php if(isset($ad_details['package_type']) && !empty($ad_details['package_type'])){ ?>
                                                    <label>Package Type: </label>
                                                        <span>
                                                            <?php
                                                              echo ucwords($ad_details['package_type'])
                                                            ?>
                                                        </span>
                                                    <?php } ?>
                                                </div>
                                                <div class="product-price-type">
                                                    <?php if(isset($ad_details['internet_speed']) && !empty($ad_details['internet_speed'])){ ?>
                                                    <label>Internet Speed: </label>
                                                        <span>
                                                            <?php
                                                              echo $ad_details['internet_speed']." Mbps"
                                                            ?>
                                                        </span>
                                                    <?php } ?>
                                                </div>
                                                <div class="product-price-type">
                                                    
                                                    <?php if(isset($ad_details['public_ip']) && !empty($ad_details['public_ip'])){ ?>
                                                    <label>Public IP: </label>
                                                        <span> Yes</span>
                                                    <?php } else { ?>
                                                    <label>Public IP: </label>
                                                        <span> No</span>
                                                    <?php } ?>
                                                </div>
                                                <div class="product-price-type">
                                                    
                                                    <?php if(isset($ad_details['package_type']) && !empty($ad_details['package_type']) && $ad_details['package_type'] != 'combo bandwidth'){ 
                                                            if(isset($ad_details['youtube_speed']) && !empty($ad_details['youtube_speed'])){
                                                        ?>

                                                        <label>GGC/Youtube Speed: </label>
                                                        <span>
                                                            <?php
                                                              echo $ad_details['youtube_speed']. " Mbps"
                                                            ?>
                                                        </span>
                                                        <?php } ?>
                                                        <?php if(isset($ad_details['bdix_speed']) && !empty($ad_details['bdix_speed'])){ ?>
                                                            <label>BDIX Speed: </label>
                                                            <span>
                                                                <?php
                                                                  echo $ad_details['bdix_speed']. " Mbps"
                                                                ?>
                                                            </span>

                                                        <?php } ?>


                                                    <?php } ?>
                                                </div>
                                                <div class="product-price-type">
                                                    <?php if(isset($ad_details['ftp_link']) && !empty($ad_details['ftp_link'])){ ?>
                                                    <label>FTP: </label>
                                                        <span>Yes</span>
                                                    <?php } ?>
                                                </div>
                                                <div class="product-price-type">
                                                    <?php if(isset($ad_details['live_tv']) && !empty($ad_details['live_tv'])){ ?>
                                                    <label>Live TV: </label>
                                                        <span>Yes</span>
                                                    <?php } ?>
                                                </div>
                                                <div class="product-price-type">
                                                    <?php if(isset($ad_details['facebook_link']) && !empty($ad_details['facebook_link'])){ ?>
                                                    <label>Facebook Page: </label>
                                                        <?php echo $ad_details['facebook_link'] ?>
                                                    <?php } ?>
                                                </div>
                                                <div class="product-price-type">
                                                    <?php if(isset($ad_details['website_link']) && !empty($ad_details['website_link'])){ ?>
                                                    <label>Website: </label>
                                                        <span><?php echo $ad_details['website_link'] ?></span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            
                                            <div style="clear: both;"></div>
                                            <?php if($ad_details['show_price']){
                                                if($ad_details['discount']){?>
                                                    <div class="info-price info-price-detail">
                                                        <label>Price:</label> <span>&#2547; <?=$discounted_total?></span>
                                                        <del>&#2547; <?=$price?></del>
                                                    </div>
                                                    <?php } else {?>
                                            <div class="info-price info-price-detail">
                                                <label>Price:</label> <span>&#2547; <?=$price?></span>
                                            </div>
                                            <?php } }?>
                                           <br>
                                            <?php
                                           $counter = 1;
                                           foreach ($ad_details_all as $column) { ?>

                                               <p><strong><?=ucwords(str_replace("_"," ",$column['field_name']))?>: </strong><?=$column['field_value']?> </p>

                                               <?php $counter++;
                                           }
                                           ?>


                                            <div class="attr-info">
                                            <a class="addcart-link buttons" href="javascript:void(0);"><i class="fa fa-shopping-cart"></i> Order Now</a>
                                                </div>
                                            <!-- End Attr Info -->
                                        </div>
                                        <!-- Detail Info -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Main Detail -->
                            <div class="tab-detail">
                                <div class="title-tab-detail">
                                    <ul role="tablist">
                                        <li class="active"><a href="#details" data-toggle="tab">Product Details </a></li>
                                       

                                    </ul>
                                </div>
                                <div class="content-tab-detail">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="details">
                                            <div class="table-content-tab-detail">
                                                <div class="icon-table-detail"></div>
                                                <div class="info-table-detail">
                                                    <p><?=$description?></p>
                                                </div>
                                            </div>

                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="make_offer">
                                            <div class="table-content-tab-detail">
                                                <div class="icon-table-detail"></div>
                                                <div class="info-table-detail">
                                                <?php if($loggedin_user) {
                                                    if($loggedin_user->id != $ad_owner_details->id) {
                                                        ?>
                                                        <!-- Make offer section -->
                                                        <div class="make-offer col-sm-6">
                                                            <?php
                                                            if (Yii::app()->session['user_token'] != '') {
                                                                $form = $this->beginWidget('CActiveForm', array(
                                                                    'id' => 'offer-form',
                                                                    'enableAjaxValidation' => false,
                                                                    'action' => 'javascript:void(0)',
                                                                    'enableClientValidation' => false,

                                                                ));
                                                                ?>
                                                                <div align="left" id="offer_status"
                                                                     class="form-group"></div>
                                                                <div class="form-group row" style="margin-left: 0px;">
                                                                    <input name="offer_price" id="offer_price"
                                                                           class="form-control number_input"  style="width: 80%"
                                                                           placeholder="Estimated price"/>
                                                                </div>
                                                                <div>
                                                                    <input type="hidden" name="ip_address" id="ip_address"
                                                                           value="<?php echo $ip_address ?>"/>
                                                                    <input type="hidden" name="ad_id" id="ad_id"
                                                                           value="<?php echo $ad_details['id'] ?>"/>
                                                                    <input type="hidden" name="offered_by" id="offered_by"
                                                                           value="<?php echo $loggedin_user->id ?>"/>
                                                                    <a href="javascript:void(0)"
                                                                       class="btn estimation_submit"><i
                                                                            class="fa fa-gift"></i>Submit
                                                                        Offer</a>
                                                                </div>
                                                                <p></p>
                                                                <?php $this->endWidget();
                                                            } else { ?>
                                                                <a href="<?php $baseUrl ?>sign-in" id="make_offer"
                                                                   class="btn btn-green"><i class="fa fa-gift"></i>Make an
                                                                    Offer</a>
                                                            <?php } ?>
                                                        </div><!-- make-offer -->
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <!-- Make offer section -->
                                                    <div class="make-offer col-sm-6">
                                                        <?php
                                                        if (Yii::app()->session['user_token'] != '') {
                                                            $form = $this->beginWidget('CActiveForm', array(
                                                                'id' => 'offer-form',
                                                                'enableAjaxValidation' => false,
                                                                'action' => 'javascript:void(0)',
                                                                'enableClientValidation' => false,

                                                            ));
                                                            ?>
                                                            <div align="left" id="offer_status"
                                                                 class="form-group"></div>
                                                            <div class="form-group row" style="margin-left: 0px;">
                                                                <input name="offer_price" id="offer_price"
                                                                       class="form-control number_input"
                                                                       style="width: 80%" placeholder="Estimated price"/>
                                                            </div>
                                                            <div>
                                                                <input type="hidden" name="ip_address" id="ip_address"
                                                                       value="<?php echo $ip_address ?>"/>
                                                                <input type="hidden" name="ad_id" id="ad_id"
                                                                       value="<?php echo $ad_details['id'] ?>"/>
                                                                <input type="hidden" name="offered_by" id="offered_by"
                                                                       value="<?php echo $loggedin_user->id ?>"/>
                                                                <a href="javascript:void(0)"
                                                                   class="btn estimation_submit"><i
                                                                        class="fa fa-gift"></i>Submit
                                                                    Offer</a>
                                                            </div>
                                                            <p></p>
                                                            <?php $this->endWidget();
                                                        } else {

                                                            $current_url = base64_encode(Yii::app()->getBaseUrl(true).Yii::app()->request->url);
                                                            ?>
                                                            <br>
                                                            <a href="<?php echo Yii::app()->getBaseUrl(true);?>/sign-in?return_url=<?=$current_url?>" id="make_offer"
                                                               class="btn btn-green"><i class="fa fa-gift"></i> Make an
                                                                Offer</a>
                                                        <?php } ?>
                                                    </div><!-- make-offer -->
                                                    <?php
                                                }?>
                                                </div>
                                            </div>

                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="send_message">
                                            <div class="table-content-tab-detail">
                                                <div class="icon-table-detail"></div>
                                                <div class="info-table-detail">
                                                    <?php
                                                    if($loggedin_user) {
                                                        if($loggedin_user->id != $ad_owner_details->id) { ?>
                                                            <a href="javascript:void(0)" id="send_message" class="btn">
                                                                <i class="fa fa-envelope-square"></i>Send Message
                                                            </a>
                                                            <?php
                                                        }
                                                    } else { ?>
                                                        <a href="javascript:void(0)" id="send_message" class="btn">
                                                            <i class="fa fa-envelope-square"></i> Send Message
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End Main Content Shop -->

                        <!-- End Tab Detail -->


                           <?php
                            if(isset($upsell_products) && !empty($upsell_products)){?>
                            <div class="upsell-detail">
                            <h2 class="title-default">OTHER PACKAGES</h2>
                            <div class="upsell-detail-slider">
                                <div class="wrap-item">
                                 <?php
                                // Generic::_setTrace($upsell_products);
                                       foreach($upsell_products as $individual_products){
                                           $ad_url = Generic::getAdUrlFromAdId($individual_products['id']);
                                           $images = json_decode($individual_products['image_url']);
                                           $base_url = Yii::app()->request->getBaseUrl(true);
                                           ?>

                                    <div class="item">
                                        <div class="item-product">
                                            <div class="product-thumb">
                                                <a class="product-thumb-link" target="_blank" href="<?=$ad_url?>">
                                                    <img class="first-thumb" alt="" src="<?= ImageHelper::cloudinary($images[0],$related_image_opt)?>">
                                                    <img class="second-thumb" alt="" src="<?= ImageHelper::cloudinary($images[0],$related_image_opt)?>">
                                                </a>
                                                <div class="product-info-cart">

                                                    <a class="addcart-link" target="_blank" href="<?=$ad_url?>"><i class="fa fa-eye"></i> View Details</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h3 class="title-product"><a target="_blank" href="<?=$ad_url?>"><?=$individual_products['title']?></a></h3>
                                                <?php if($individual_products['show_price']){ ?>
                                                <div class="info-price">
                                                    <span>&#2547; <?=$individual_products['price']?></span>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                       <?php  } ?>

                                    <!-- End Item -->
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- End Upsell Detail -->


                    </div>

                    <div class="col-md-3 col-sm-4 col-xs-12 sidebar">
                        <div class="sidebar-shop sidebar-left">
                            <?php
                            if(isset($related_products) && !empty($related_products)){ ?>
                            <div class="widget widget-related-product">
                                <h2 class="widget-title">RELATED PRODUCTS</h2>
                                <ul class="list-product-related">

                                      <?php
                                      foreach($related_products as $individual){
                                          $images = json_decode($individual['image_url']);

                                          $related_image_opt= array(
                                              'w' =>'130',
                                              'h' =>'142',
                                              'g'=>'center',
                                              'r' => '0'
                                          );

                                          ?>

                                    <li class="clearfix">
                                        <div class="product-related-thumb">
                                            <a href="<?=$base_url.'/isp/'.$store_details->url_alias?>/package-details/<?=$individual['id']?>"><img src="<?= ImageHelper::cloudinary($images[0],$related_image_opt)?>" alt="" /></a>
                                        </div>
                                        <div class="product-related-info">
                                            <h3 class="title-product"><a href="<?=$base_url.'/isp/'.$store_details->url_alias?>/package-details/<?=$individual['id']?>"><?=$individual['title']?></a></h3>
                                            <?php if($individual['show_price']){ ?>
                                            <div class="info-price">
                                                <span>&#2547; <?=$individual['price']?>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </li>

                                      <?php  }?>

                                </ul>
                            </div>
                            <?php } ?>
                            
                            <!-- End Adv -->
                        </div>
                        <!-- End Sidebar Shop -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content Shop -->
    </div>
    <!-- End Content -->
    <?php
        echo $this->renderPartial('common_footer',array(
            'user_details' => $user_details,
            'store_details' => $store_details,
            'base_url' => $base_url,
            'facebook_link' => $facebook_link,
            'twitter_link' => $twitter_link,
            'linkedin_link' => $linkedin_link,
            'google_plus_link' => $google_plus_link
            ));
    ?>
    <!-- End Footer -->






</div>
<div class="modal fade" id="myModal_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 600px">
        <div class="modal-content" style="position: relative;padding: 50px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Send Request For Place Your Order </h4>
            </div>
            <div class="modal-body">
                <form class="sending-ads-request" action="<?php echo Yii::app()->getBaseUrl(true) ?>/isp/isp-order-confirm" id="sending_ads_request" method="post">
                    <input type="hidden" id="myRequest" name="my_request" value="" />
                    <input type="hidden" id="logo" name="logo" value="<?=$store_details->logo?>" />
                    <input type="hidden" id="enterprise_name" name="enterprise_name" value="<?=$user_details->enterprise_name?>" />
                    <input type="hidden" id="address" name="address" value="<?=$user_details->address?>" />
                    <input type="hidden" id="return_url" name="return_url" value="<?=$return_url ?>" />
                    <input type="hidden" id="phone_number" name="phone_number" value="<?=$user_details->phone_number?>" />
                    <input type="hidden" id="estore_id" name="estore_id" value="<?=$store_details->id?>" />
                    <input type="hidden" id="owner_email" name="owner_email" value="<?=$user_details->email?>" />
                    <?php if(isset($loggedin_user)) { ?>
                        <input type="hidden" id="logged_user_id" name="logged_user_id" value="<?=$loggedin_user->id?>" />
                    <?php }?>


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
                        <div class="row form-group " title="Name">
                            <label class="col-sm-3 label-title">Product Name: </label>
                            <div class="col-sm-9">
                                <span><?=$title?></span>
                                <input type="hidden" class="form-control" name="product_name" id="product_name" value="<?=$title?>" required />
                            </div>
                        </div>
                        <div class="row form-group " title="Code">
                            <label class="col-sm-3 label-title">Item Code: </label>
                            <div class="col-sm-9">
                                <span><?php echo $item_code;?></span>
                                <input type="hidden" class="form-control" name="item_code" id="item_code" value="<?=$item_code?>" required />
                            </div>
                        </div>
                        <div class="row form-group " title="Price">
                            <label class="col-sm-3 label-title">Product Price: </label>
                            <div class="col-sm-9">
                                <span style="color: red">&#2547; <?=$price?></span>
                                <input type="hidden" class="form-control" name="product_price" id="product_price" value="<?=$price?>" required />
                            </div>
                        </div>
                        <div class="js_favorite_massage favorite-massage alert-warning"></div>
                         <span style="display: none; padding-left: 10px; width: 50px; float: left;" id="favorite-send-loading">
                                            <img alt="Loading..." src="/images/loader.gif">
                                        </span>
                        <div class="success_message"></div>
                        <button type="submit" id="order-send" class="btn btn-primary">Send Request</button>
                    </div>
                    <div class="clr"></div>
                </form>
            </div><!-- slider -->


        </div>

    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 840px">
        <div class="modal-content" style="position: absolute; top:122px; right: 64px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Send Message</h4>
            </div>
            <div class="modal-body">
                <?php
                $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'enquiry-form',
                    'enableAjaxValidation'=>false,
                    'action'=>'javascript:void(0)',
                    'enableClientValidation'=>false,

                ));
                ?>
                <div class="row col-sm-12">
                    <div class="col-sm-6">
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
                                <?php if($loggedin_user) { ?>
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
                                <?php if($loggedin_user) { ?>
                                    <span><?php echo $loggedin_user->phone_number ?></span>
                                    <input type="hidden" class="form-control" name="sender_phone" id="sender_phone" value="<?php echo $loggedin_user->phone_number ?>" />
                                <?php } else { ?>
                                    <input type="tel" class="form-control" name="sender_phone" id="sender_phone" placeholder="Your Phone" required />
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row form-group item-description" title="Enquiry message details">
                            <label class="col-sm-3 label-title">Details</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="message-details" id="message-details" required placeholder="Write few lines about your enquiry" rows="6"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="sender" id="sender" value="<?php if($loggedin_user) { echo $loggedin_user->id; } else { echo "0"; } ?>" />
                        <input type="hidden" name="receiver" id="receiver" value="<?php echo $ad_details['user_id'] ?>" />
                        <input type="hidden" name="ad_id" id="ad_id" value="<?php echo urlencode(base64_encode($ad_details['id'])) ?>" />
                        <button type="submit" id="enquiry_submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <div class="clr"></div>
                <?php $this->endWidget();?>
            </div><!-- slider -->


        </div>

    </div>
</div>
<style>

     .btn, .make-offer .btn {
        background-color: #0d79bf;
        border: 1px solid transparent;
        color: #fff;
        margin-bottom: 17px;
        margin-right: 17px;
    }
    .btn {
        border: medium none;
        display: inline-block;
        font-size: 12px;
        font-weight: 700;
        padding: 10px 20px;
        position: relative;
        text-decoration: none !important;
        text-transform: uppercase;
    }
     #offer_status .error {
         color: #FF433D;
     }

     .link-wishlist{
         font-family: FontAwesome;
         padding: 7px;
         margin-right: 10px;;
         font-size: 24px;
         text-align: center;
         cursor: pointer;
         outline: none;
         color: #3B5998;
         border: none;
         border-radius: 15px;
         box-shadow: 0 2px #999;
     }

     .link-wishlist:hover {background-color: #3B5998;
         color: #fff2f2;
     }
     .link-wishlist:after {
         content: "\f004";
         font-size: 20px;
         font-weight: normal;
     }

     .link-wishlist:active {
         background-color: #3e8e41;
         box-shadow: 0 5px #666;
         transform: translateY(4px);
     }

     .favorite-active{
         color: red !important;
     }


</style>



<script>

    
    $(document).ready(function () {
        // Attach Button click event listener for sending message
        $("#send_message").click(function(){
            // show Modal
            $('#myModal').modal('show');
        });

        $('.show-number').click(function(){
            $('.hide-number').show();
            $('.hide-text').hide();
            $(this).removeClass('btn-red');
            $(this).addClass('btn-red-hover');
        });
    });
    $('#enquiry-form').on('submit',function () {
        name = $('#sender_name').val();
        email = $('#sender_email').val();
        phone = $('#sender_phone').val();
        details = $('#message-details').val();
        data = $('#enquiry-form').serialize();
        if(name == '' || email == '' || phone == '' || details == ''){
            return false;
        }

        $.ajax({
            type : 'POST',
            url  : SITE_URL+"site/saveMessage",
            data : data,
            cache: false,
            dataType:"json",
            success : function(response){
                if(response.status=="success"){
                    $('#send_message_confirmation').html('<span class="info">Message sent successful</span>');
                    $('#message-details').val('');
                    $('#myModal').modal('hide');
                }
            }


        });

    });




    $('.buttons').on('click', function () {
        var id =  $(this).parent().parent().attr('id');
        var text = $(this).parent().children(".divCell").html();
        document.getElementById('myRequest').value = text + ' in '+ id;
        $('.result').html(text + ' in '+ id);
        $('#myModal_order').modal('show');
    })


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
                        $('#favourite').html(data.favourite);


                    } else if((data.status == 'un_favorite')) {
                        find.removeClass(search_class);
                        find.attr('title', "Add as favorite");
                        $('#favourite').html(data.favourite);
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


