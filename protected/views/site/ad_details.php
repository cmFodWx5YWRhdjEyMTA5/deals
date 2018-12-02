
<?php
$baseUrl = Yii::app()->request->getBaseUrl(true);
$opt_mega_sell_ads_details_image = array(
    'w' => '285',
    'h' => '385',
    'g' => 'center',
    'r' => '0'
);
$opt_related_product_banner_image = array(
    'w' => '300',
    'h' => '380',
    'g' => 'center',
    'r' => '0'
);

$opt_up_sell_product_banner_image = array(
    'w' => '300',
    'h' => '380',
    'g' => 'center',
    'r' => '0'
);


$mega_sell_ads_details_image_url = "";
$image_url_related_product_banner = "";
$image_url_up_sell_product_banner = "";

$discount = round($ad_details['discount']);
$total_price = $ad_details['price'];
$discounted_total = $total_price - ($total_price * ($discount/100));

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
$image_path = $baseUrl. "/images/bdads24_FB_ProfilePic.jpg";
$image_path = (isset($images) && !empty($images))? $images[0] : $image_path ;
$og_image = $image_path;

$meta_desc = strip_tags($description);
$og_title =  $title;
$og_desc =  "I found this ads on bdads24.com – a great website to find electronics, cars, clothing, digital cameras, and everything. bdads24.com makes it easy to find a product. What do you think of this one?";
$meta_keyword = "Free classifieds, classifieds, classified ads,Online Shopping Bangladesh: Electronics, Fashion, Mobiles at bdads24.com";

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


?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-584a8c4494271a7c"></script>

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

                                        <div class="col-md-5">
                                            <a class="link-wishlist favorite <?=$favorites_class?>" title="<?=$favorites_title?>"  href="javascript:void(0);" onclick="ChangeFavoriteStatus(<?=$fav_params;?>)"></a><label> Liked : <span id="favourite"><?=$favorite_counter?></span></label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="products">
                                                <i class="fa fa-eye"></i>   <label> Total Views: </label> <span><?=$view_count?></span>
                                            </div>
                                            <div class="products">
                                                <label>Ad ID: #</label> <span><?php echo $ad_details['ad_id'];?></span>
                                            </div>

                                            <?php
                                            $counter = 1;
                                            foreach ($ad_details_all as $column) { ?>
                                            <div class="products">
                                                <label><?=ucwords(str_replace("_"," ",$column['field_name']))?>: </label><span><?=$column['field_value']?></span>
                                            </div>
                                                <?php $counter++;
                                            }
                                            ?>
                                            <div class="products">
                                                <label>Availability: </label> <span>In stock</span>
                                            </div>
                                        </div>
                                        <div style="clear: both;"></div>
                                        <?php if($ad_details['show_price']){
                                            if($ad_details['discount']){?>
                                                <div class="info-price info-price-detail">
                                                    <label>Price:</label><span>&#2547; <?php echo $discounted_total ?></span>
                                                    <del>&#2547; <?php echo $price.$price_end ?></del>   <?php if ($ad_details['price_type'] == 1){?> <span style="color: #000020;font-size: 30px;"> (Fixed)</span>  <?php } else {?> <span style="color: #000020;font-size: 20px;">(Negotiable)</span> <?php } ?>
                                                </div>
                                            <?php } else {?>
                                                <div class="info-price info-price-detail">
                                                    <label>Price:</label><span>&#2547; <?php echo $price.$price_end ?></span>   <?php if ($ad_details['price_type'] == 1){?> <span style="color: #000020;font-size: 30px;"> (Fixed)</span>  <?php } else {?> <span style="color: #000020;font-size: 20px;">(Negotiable)</span> <?php } ?>
                                                </div>
                                            <?php } }?>





                                        <div class="attr-info">
                                            <a id="send_message" class="addcart-link" href="#"><i class="fa fa-shopping-cart"></i> Send Message </a>
                                            <div class="product-social-extra">
                                                <a class="wishlist-link favorite <?=$favorites_class?>" href="javascript:void(0);" onclick="ChangeFavoriteStatus(<?=$fav_params;?>)"><i class="fa fa-heart-o"></i></a>
                                                <a class="compare-link" href="#"><i class="fa fa-toggle-on"></i></a>
                                                <a class="print-link" href="#"><i class="fa fa-print"></i></a>
                                                <a class="share-link" href="#"><i class="fa fa-share"></i></a>
                                            </div>
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
                                    <li class="active"><a href="#seller" data-toggle="tab">View Location</a></li>
                                    <li ><a href="#details" data-toggle="tab">Product Details </a></li>
                                    <li><a href="#feedback" data-toggle="tab">Saler Details</a></li>
                                    <!-- <li><a href="#shipping" data-toggle="tab">Make Offer</a></li> -->

                                </ul>
                            </div>
                            <div class="content-tab-detail">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane" id="details">
                                        <div class="table-content-tab-detail">

                                            <div class="icon-table-detail"></div>
                                            <div class="info-table-detail">
                                                <p><?=$description?></p>
                                            </div>
                                        </div>

                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="feedback">
                                        <div class="inner-content-tab-detail">

                                            <div class="" style="font-size: 11px; text-align: justify">
                                                <span><i class="fa fa-user" ></i> <label style="font-size: 14px;"><?=$ad_owner_details->user_name?></label></span><br/>
                                                <span><i class="fa fa-mobile" ></i> <a class="text-decoration-underline" href="tel:<?=$phone_number?>"><label style="font-size: 14px;"> <?=$phone_number?></label></a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div role="tabpanel" class="tab-pane" id="shipping">
                                        <div class="table-content-tab-detail">
                                            <div class="make-offer">
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
                                            </div>
                                        </div>

                                    </div> -->
                                    <div role="tabpanel" class="tab-pane active" id="seller">
                                        <div class="inner-content-tab-detail">
                                            <div class="tab-pane fade in active" id="product_tabs_description">
                                                <div class="std">
                                                    <i class="fa fa-map-marker" style="color: #0083c9; margin-left: 10px"></i> <span style="font-size: 12px;"><b>Address: </b>Khulna</span>
                                                    <div id="map"></div>
                                                    <script type="text/javascript">

                                                        lat = <?=$latitude?>;
                                                        lon = <?=$longitude?>;
                                                        function initMap() {
                                                            var uluru = {lat: lat, lng: lon};
                                                            var map = new google.maps.Map(document.getElementById('map'), {
                                                                zoom: 15,
                                                                center: uluru
                                                            });
                                                            var marker = new google.maps.Marker({
                                                                position: uluru,
                                                                map: map
                                                            });
                                                        }
                                                    </script>
                                                    <script async defer
                                                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzbxUJiVCi-goerE0sbjB0ooWhVmKns8A&callback=initMap">
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <!-- End Tab Detail -->
                        <?php
                        $related_image_opt= array(
                            'w' =>'270',
                            'h' =>'336',
                            'g'=>'center',
                            'r' => '0',
                            'c' => 'pad'
                        );
                        $counter = 1;
                        $favorite_ads = Generic::getAllFavoritesAds();
                        if(isset($up_sell_products) && !empty($up_sell_products)){?>




                        <div class="upsell-detail">
                            <h2 class="title-default">UPSELL PRODUCTS</h2>
                            <div class="upsell-detail-slider">
                                <div class="wrap-item">
                                    <?php
                                    foreach($up_sell_products as $single_product){
                                    $current_date = date('Y-m-d');
                                    $expire_date = isset($single_product['expire_date']) ? $single_product['expire_date'] : '';
                                    if ($expire_date >= $current_date) {
                                    $images = json_decode($single_product['image_url']);
                                    $fav_params = "this,'".$single_product['id']."'";

                                    $favorites_class = "";
                                    $favorites_title = "Ad as favorite";
                                    if(in_array($single_product['id'],$favorite_ads)){
                                        $favorites_class = "favorite-active";
                                        $favorites_title = "Remove From favorite";

                                    }
                                        $ad_url = Generic::getAdUrlFromAdId($single_product['id']);
                                        $images = json_decode($single_product['image_url']);
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
                                                    <h3 class="title-product"><a target="_blank" href="<?=$ad_url?>"><?=$single_product['title']?></a></h3>
                                                    <div class="info-price">
                                                        <span>&#2547; <?=$single_product['price']?></span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <!-- End Item -->
                                    <?php }}?>
                                    <!-- End Item -->
                                </div>
                            </div>
                        </div>

                        <?php }?>

                        <!-- End Upsell Detail -->
                    </div>
                    <!-- End Main Content Shop -->
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12 sidebar">
                    <div class="sidebar-shop sidebar-left">
                        <?php
                        $opt = array(
                            'w' => '225',
                            'h' => '170',
                            'g' => 'center',
                            'r' => '0',
                            'c' => 'pad'
                        );
                        $counter = 1;
                        $favorite_ads = Generic::getAllFavoritesAds();
                        if(isset($related_products) && !empty($related_products)){?>

                        <div class="widget widget-related-product">
                            <h2 class="widget-title">RELATED PRODUCTS</h2>
                            <ul class="list-product-related">
                                <?php
                                foreach($related_products as $individual){
                                $images = json_decode($individual['image_url']);
                                    $ad_url = Generic::getAdUrlFromAdId($individual['id']);
                                $related_image_opt= array(
                                    'w' =>'130',
                                    'h' =>'142',
                                    'g'=>'center',
                                    'r' => '0',
                                    'c' => 'pad'
                                );

                                ?>

                                    <li class="clearfix">
                                        <div class="product-related-thumb">
                                            <a href="<?=$ad_url?>"><img src="<?= ImageHelper::cloudinary($images[0],$related_image_opt)?>" alt="" /></a>
                                        </div>
                                        <div class="product-related-info">
                                            <h3 class="title-product"><a href="<?=$ad_url?>"><?=$individual['title']?></a></h3>
                                            <div class="info-price">
                                                <span>&#2547; <?=$individual['price']?>
                                            </div>

                                        </div>
                                    </li>

                                <?php  }?>



                            </ul>
                        </div>

                        <?php }?>

                        <!-- End Related Product -->
                        <div class="widget widget-adv">
                        <h2 class="title-widget-adv">
                            <span>Week</span>
                            <strong>Special Offer</strong>
                        </h2>
                        <div class="wrap-item">
                            <div class="item">
                                <div class="item-widget-adv">
                                    <div class="adv-widget-thumb">
                                        <a href="#"><img src="<?=$baseUrl?>/images/grid/sl1.jpg" alt="" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-widget-adv">
                                    <div class="adv-widget-thumb">
                                        <a href="#"><img src="<?=$baseUrl?>/images/grid/sl2.jpg" alt="" /></a>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="item">
                                <div class="item-widget-adv">
                                    <div class="adv-widget-thumb">
                                        <a href="#"><img src="images/grid/sl3.jpg" alt="" /></a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
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


<!-- End Footer -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 840px">
        <div class="modal-content" style="position: absolute;">
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
                        <div class="row" id="send_message_confirmation">
                        </div>
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
<!-- jquery.fancybox CSS
============================================ -->
<link rel="stylesheet" href="css/fancyboxcss/fancb/jquery.fancybox.css">

<!-- style CSS
============================================ -->
<link rel="stylesheet" href="css/fancyboxcss/style.css">


<!-- jqueryui js
============================================ -->
<script src="js/fancyboxjs/jquery.fancybox.js"></script>

<!-- jquery.meanmenu js
============================================ -->
<script src="js/fancyboxjs/jquery.meanmenu.js"></script>

<!-- main js
============================================ -->
<script src="js/fancyboxjs/main.js"></script>

<script type="text/javascript">

    function redirectToProduct(id,ad_type){
        window.location = SITE_URL+'ad?ad_id='+encodeURIComponent(btoa(id))+'&ad_type='+encodeURIComponent(btoa(ad_type));
    }

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
                    $('#send_message_confirmation').html('<span class="info">Message sent Successful</span>');
                    $('#message-details').val('');
                    //$('#myModal').modal('hide');
                }
            }


        });

    });



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