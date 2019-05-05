
<?php echo $this->renderPartial('../elements/_search_form');
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

if(isset($mega_sell_ads_details) && !empty($mega_sell_ads_details)){
    //$mega_sell_ads_details_image_url = Generic::getImagePathFromSiteDirectory('topRightSide', $mega_sell_ads_details[0]['banner_image'],  false);
    $mega_sell_ads_details_image_url =  $mega_sell_ads_details[0]['banner_image'];

}
if(isset($related_product_banner) && !empty($related_product_banner)){
    //$image_url_related_product_banner = Generic::getImagePathFromSiteDirectory('topRightSide', $related_product_banner[0]['banner_image'],  false);
    $image_url_related_product_banner =  $related_product_banner[0]['banner_image'];

}
if(isset($up_sell_product_banner) && !empty($up_sell_product_banner)){
    //$image_url_up_sell_product_banner = Generic::getImagePathFromSiteDirectory('topRightSide', $up_sell_product_banner[0]['banner_image'],  false);
    $image_url_up_sell_product_banner = $up_sell_product_banner[0]['banner_image'];

}


?>


<div id="page" style="margin-top: 100px; margin-left: -16px" xmlns="http://www.w3.org/1999/html">

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home"> <a href="/" title="Go to Home Page">Home</a> <span>/</span> </li>
                        <li class="category1599"> <a href="#" title=""><?=$category_name[0]['category_name']?></a> <span>/ </span> </li>
                        <li class="category1600"> <a href="#" title=""><?=$sub_category_name?></a> <span>/</span> </li>
                        <li class="category1601"> <strong><?=$title?></strong> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Main Container -->
    <section class="main-container col1-layout">
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-main">
                        <div class="product-view">
                            <div class="product-essential">
                                <div class="container">
                                    <div class="row">
                                        <div class="single-products row">
                                            <!-- Start single product image -->
                                            <div class="product-img-box col-lg-4 col-sm-4 col-xs-12">
                                                <div class="single-product-image">
                                                    <div id="content-eleyas">
                                                        <div id="my-tab-content" class="tab-content">

                                                            <?php
                                                            $counter = 1;
                                                            foreach( $images as $image )
                                                            {
                                                            if($counter == 1){
                                                                echo '<div class="tab-pane active" id="view'.$counter.'">';
                                                            } else {
                                                                echo '<div class="tab-pane" id="view'.$counter.'">';
                                                            }
                                                            $counter++;
                                                            ?>
                                                            <a class="fancybox" href="<?=$image?>" data-fancybox-group="gallery" title=""><img src="<?= ImageHelper::cloudinary($image,$opt)?>" alt=""><span>View larger<i class="fa fa-search-plus"></i></span></a>
                                                        </div>
                                                        <?php } ?>

                                                    </div>
                                                    <div id="viewproduct" class="nav nav-tabs producttabcarosel product-view" data-tabs="tabs">
                                                        <?php
                                                        $counter = 0;
                                                        foreach( $images as $image )
                                                        {
                                                        if($counter == 0){
                                                            echo '<div class="pro-view active">';
                                                        } else {
                                                            echo '<div class="pro-view">';
                                                        }
                                                        $counter++;
                                                        ?>
                                                        <a href="#view<?=$counter?>" data-toggle="tab"><img src="<?= ImageHelper::cloudinary($image,$small_image_opt)?>" alt=""></a></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End single product image -->


                                    <div class="product-shop col-lg-5 col-sm-5 col-xs-12">
                                        <div class="product-next-prev">
                                            <?php if($next_link != '') { ?>
                                                <a class="product-next" href="<?php echo $baseUrl.'/ad?ad_id='.urlencode(base64_encode($next_link)).'&ad_type='.urlencode(base64_encode('ads')); ?>"><span></span></a>
                                                <?php
                                            }
                                            if($prev_link) {
                                                ?>
                                                <a class="product-prev" href="<?php echo $baseUrl.'/ad?ad_id='.urlencode(base64_encode($prev_link)).'&ad_type='.urlencode(base64_encode('ads')) ?>"><span></span></a>
                                            <?php } ?>
                                        </div>
                                        <div class="product-name">
                                            <br>
                                            <h1><?=$title?></h1>
                                        </div>
                                        <div class="ratings">
                                            <p class="col-sm-12">
                                                <span class="col-sm-6"><i class="fa fa-eye" style="color: #0083c9"></i> Ad Views: <?=$view_count?></span>
                                                <span class="col-sm-6"><i class="fa fa-heart" style="color: #0083c9"></i> Liked: <?=$favorite_counter?></span>
                                            </p><p class="col-sm-12">
                                                <span class="col-sm-6"><i class="fa fa-th-list" style="color: #0083c9"></i> Ad ID: <?=$ad_details['ad_id'] ?></span>
                                                <span class="col-sm-6"><i class="fa fa-clock-o" style="color: #0083c9"></i>
                                                    Posted:
                                                    <?php $post_date = new \DateTime($ad_details['create_date']);
                                                    $current_time = new \DateTime(); $time_difference = $current_time->diff($post_date);
                                                    if($time_difference->y) {
                                                        echo $time_difference->y." year ago";
                                                    } else {
                                                        if($time_difference->m){
                                                            echo $time_difference->m." month ago";
                                                        } else {
                                                            if($time_difference->d) {
                                                                echo $time_difference->d." days ago";
                                                            } else {
                                                                if($time_difference->h) {
                                                                    echo $time_difference->h." hour ago";
                                                                } else {
                                                                    if($time_difference->i) {
                                                                        echo $time_difference->i." min ago";
                                                                    } else {
                                                                        echo $time_difference->s." sec ago";
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="price-block">
                                            <div class="price-box">
                                                <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price">BDT <?=$price?></span> </p>
                                            </div>
                                        </div>
                                        <!-- short-info -->
                                        <div class="short-info col-sm-6">
                                            <h4>Short Information</h4>
                                            <?php if($ad_details['condition'] == 1){?>
                                                <p><strong>Condition: </strong>New</p>
                                            <?php } else { ?>
                                                <p><strong>Condition: </strong>Used</p>
                                                <?php
                                            }
                                            $counter = 1;
                                            foreach ($ad_details_all as $column) { ?>

                                                <p><strong><?=ucwords(str_replace("_"," ",$column['field_name']))?>: </strong><?=$column['field_value']?> </p>

                                                <?php $counter++;
                                            }
                                            ?>
                                            <?php if ($ad_details['price_type'] == 1){?>
                                                <p><strong>Price Type: </strong>Fixed</p>
                                            <?php } else {?>
                                                <p><strong>Price Type: </strong>Negotiable</p>
                                            <?php } ?>
                                        </div><!-- short-info -->

                                        <?php if (!$ad_details['price_type']){?>
                                            <!-- Make offer section -->
                                            <div class="make-offer col-sm-6">
                                                <h4>Make Offer</h4>
                                                <?php
                                                if(Yii::app()->session['user_token'] != '') {
                                                    $form=$this->beginWidget('CActiveForm', array(
                                                        'id'=>'offer-form',
                                                        'enableAjaxValidation'=>false,
                                                        'action'=>'javascript:void(0)',
                                                        'enableClientValidation'=>false,

                                                    ));
                                                    ?>
                                                    <div align="left" id="offer_status" class="form-group"></div>
                                                    <div class="form-group row" style="margin-left: 0px;">
                                                        <input name="offer_price" id="offer_price" class="form-control number_input" placeholder="Estimated price" />
                                                    </div>
                                                    <div>
                                                        <input type="hidden" name="ip_address" id="ip_address" value="<?php echo $ip_address ?>" />
                                                        <input type="hidden" name="ad_id" id="ad_id" value="<?php echo $ad_details['id'] ?>" />
                                                        <input type="hidden" name="offered_by" id="offered_by" value="<?php echo $loggedin_user->id ?>" />
                                                        <a href="javascript:void(0)" class="btn estimation_submit"><i class="fa fa-gift"></i>Submit Offer</a>
                                                    </div>
                                                    <p></p>
                                                    <?php $this->endWidget();
                                                } else { ?>
                                                    <a href="<?php $baseUrl ?>sign-in" id="make_offer" class="btn btn-green"><i class="fa fa-gift"></i>Make an Offer</a>
                                                <?php } ?>
                                            </div><!-- make-offer -->
                                        <?php } ?>
                                        <div class="clr"></div>
                                        <!-- contact-with -->

                                        <div class="contact-with">
                                            <h4>Contact with </h4>
                                            <div id="send_message_confirmation">

                                            </div>
								<span class="btn btn-red show-number">
									<i class="fa fa-phone-square"></i>
									<span class="hide-text">Show phone number </span>
									<span class="hide-number" style="font-size: 14px;"><?=$phone_number?></span>
								</span>
                                            <a href="javascript:void(0)" id="send_message" class="btn">
                                                <i class="fa fa-envelope-square"></i>Send Message
                                            </a>
                                        </div><!-- contact-with -->
                                    </div>

                                    <div class="col-lg-3 col-sm-3 col-xs-12 pro-banner"><br>
                                        <img alt="banner" src="<?php echo ImageHelper::cloudinary($mega_sell_ads_details_image_url,$opt_mega_sell_ads_details_image) ?>">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-collateral col-lg-12 col-sm-12 col-xs-12">
                <div class="add_info">
                    <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                        <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Product Description </a> </li>
                        <!--<li><a href="#product_tabs_tags" data-toggle="tab">Tags</a></li>-->
                        <!--<li> <a href="#product_tabs_custom" data-toggle="tab">Custom Tab</a> </li>-->
                        <!--<li> <a href="#product_tabs_custom1" data-toggle="tab">Custom Tab1</a> </li>-->
                    </ul>
                    <div id="productTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="product_tabs_description">
                            <div class="std">
                                <p><?=$description?></p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="product_tabs_tags">
                            <div class="box-collateral box-tags">
                                <div class="tags">
                                    <form id="addTagForm" action="#" method="get">
                                        <div class="form-add-tags">
                                            <label for="productTagName">Add Tags:</label>
                                            <div class="input-box">
                                                <input class="input-text" name="productTagName" id="productTagName" type="text">
                                                <button type="button" title="Add Tags" class=" button btn-add" onClick="submitTagForm()"> <span>Add Tags</span> </button>
                                            </div>
                                            <!--input-box-->
                                        </div>
                                    </form>
                                </div>
                                <!--tags-->
                                <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="product_tabs_custom">
                            <div class="product-tabs-content-inner clearfix">
                                <p><strong>Lorem Ipsum</strong><span>&nbsp;is
                      simply dummy text of the printing and typesetting industry. Lorem Ipsum
                      has been the industry's standard dummy text ever since the 1500s, when
                      an unknown printer took a galley of type and scrambled it to make a type
                      specimen book. It has survived not only five centuries, but also the
                      leap into electronic typesetting, remaining essentially unchanged. It
                      was popularised in the 1960s with the release of Letraset sheets
                      containing Lorem Ipsum passages, and more recently with desktop
                      publishing software like Aldus PageMaker including versions of Lorem
                      Ipsum.</span></p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="product_tabs_custom1">
                            <div class="product-tabs-content-inner clearfix">
                                <p> <strong> Comfortable </strong><span>&nbsp;preshrunk shirts. Highest Quality Printing.  6.1 oz. 100% preshrunk heavyweight cotton Shoulder-to-shoulder taping Double-needle sleeves and bottom hem

                      Lorem Ipsumis
                      simply dummy text of the printing and typesetting industry. Lorem Ipsum
                      has been the industry's standard dummy text ever since the 1500s, when
                      an unknown printer took a galley of type and scrambled it to make a type
                      specimen book. It has survived not only five centuries, but also the
                      leap into electronic typesetting, remaining essentially unchanged. It
                      was popularised in the 1960s with the release of Letraset sheets
                      containing Lorem Ipsum passages, and more recently with desktop
                      publishing software like Aldus PageMaker including versions of Lorem
                      Ipsum.</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</section>
<!-- Main Container End -->

<div class="container">

    <!-- Related Slider -->
    <?php
    $opt = array(
        'w' => '225',
        'h' => '170',
        'g' => 'center',
        'r' => '0'
    );
    $counter = 1;
    $favorite_ads = Generic::getAllFavoritesAds();
    if(isset($related_products) && !empty($related_products)){?>

        <div class="related-pro">

            <div class="slider-items-products">
                <div class="related-block">
                    <div id="related-products-slider" class="product-flexslider hidden-buttons">
                        <div class="home-block-inner">
                            <div class="block-title">
                                <h2>Related Products</h2>
                            </div>
                            <img alt="banner" src="<?php echo ImageHelper::cloudinary($image_url_related_product_banner,$opt_related_product_banner_image) ?>">

                        </div>
                        <div class="slider-items slider-width-col4 products-grid block-content">

                            <?php
                            foreach($related_products as $single_product){
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


                                    ?>

                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="item-img">
                                                <div class="item-img-info">
                                                    <a class="product-image" title="<?= $single_product['title'] ?>" href="<?php echo $baseUrl ?>/ad?ad_id=<?php echo urlencode(base64_encode($single_product['id'])) ?>&ad_type=<?php echo urlencode(base64_encode('ads')) ?>"> <img alt="<?= $single_product['title'] ?>" src="<?php echo ImageHelper::cloudinary($images[0],$opt) ?>"> </a>

                                                    <?php if($ad_details['condition'] == 1){?>
                                                        <div class="new-label new-top-right">
                                                            New
                                                        </div>
                                                    <?php }?>


                                                    <div class="box-hover">
                                                        <ul class="add-to-links">
                                                            <li><a class="link-quickview"
                                                                   href="javascript:void(0);"></a>
                                                            </li>
                                                            <li><a class="link-wishlist favorite <?=$favorites_class?>" title="<?=$favorites_title?>"  href="javascript:void(0);" onclick="ChangeFavoriteStatus(<?=$fav_params;?>)"></a>
                                                            </li>
                                                            <li><a class="link-compare"
                                                                   href="javascript:void(0);"></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="info-inner">
                                                    <div class="item-title"> <a title="<?php echo $single_product['title'] ?>" href="<?php echo $baseUrl ?>/ad?ad_id=<?php echo urlencode(base64_encode($single_product['id'])) ?>&ad_type=<?php echo urlencode(base64_encode('ads')) ?>"> <?php echo $single_product['title'] ?> </a> </div>
                                                    <div class="rating">
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <div style="width:80%" class="rating"></div>
                                                            </div>
                                                            <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                        </div>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="item-price">
                                                            <div class="price-box"> <span class="regular-price"> <span class="price"><?php echo "BDT " . $single_product['price'] ?></span> </span>
                                                            </div>
                                                        </div>
                                                        <div class="action">
                                                            <button class="button btn-cart" type="button" title="" data-original-title="View Details" onclick="redirectToProduct('<?=$single_product['id']?>','ads')"><span>View Details</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php }}?>

                            <!-- End Item -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End related products Slider -->

    <?php }?>


</div>
<!-- Related Products Slider End -->

<!-- Upsell Product Slider -->

<div class="container">
    <!-- upsell Slider -->
    <?php
    $opt = array(
        'w' => '225',
        'h' => '170',
        'g' => 'center',
        'r' => '0'
    );
    $counter = 1;
    $favorite_ads = Generic::getAllFavoritesAds();
    if(isset($up_sell_products) && !empty($up_sell_products)){?>
        <div class="upsell-pro">
            <div class="slider-items-products">
                <div class="upsell-block">
                    <div id="upsell-products-slider" class="product-flexslider hidden-buttons">
                        <div class="home-block-inner">
                            <div class="block-title">
                                <h2>Upsell Product</h2>
                            </div>
                            <img alt="banner" src="<?php echo ImageHelper::cloudinary($image_url_up_sell_product_banner,$opt_up_sell_product_banner_image)?>">
                        </div>
                        <div class="slider-items slider-width-col4 products-grid block-content">





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


                                    ?>

                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="item-img">
                                                <div class="item-img-info">
                                                    <a class="product-image" title="<?= $single_product['title'] ?>" href="<?php echo $baseUrl ?>/ad?ad_id=<?php echo urlencode(base64_encode($single_product['id'])) ?>&ad_type=<?php echo urlencode(base64_encode('ads')) ?>"> <img alt="<?= $single_product['title'] ?>" src="<?php echo ImageHelper::cloudinary($images[0],$opt) ?>"> </a>

                                                    <?php if($ad_details['condition'] == 1){?>
                                                        <div class="new-label new-top-right">
                                                            New
                                                        </div>
                                                    <?php }?>


                                                    <div class="box-hover">
                                                        <ul class="add-to-links">
                                                            <li><a class="link-quickview"
                                                                   href="javascript:void(0);"></a>
                                                            </li>
                                                            <li><a class="link-wishlist favorite <?=$favorites_class?>" title="<?=$favorites_title?>"  href="javascript:void(0);" onclick="ChangeFavoriteStatus(<?=$fav_params;?>)"></a>
                                                            </li>
                                                            <li><a class="link-compare"
                                                                   href="javascript:void(0);"></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="info-inner">
                                                    <div class="item-title"> <a title="<?php echo $single_product['title'] ?>" href="<?php echo $baseUrl ?>/ad?ad_id=<?php echo urlencode(base64_encode($single_product['id'])) ?>&ad_type=<?php echo urlencode(base64_encode('ads')) ?>"> <?php echo $single_product['title'] ?> </a> </div>
                                                    <div class="rating">
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <div style="width:80%" class="rating"></div>
                                                            </div>
                                                            <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                        </div>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="item-price">
                                                            <div class="price-box"> <span class="regular-price"> <span class="price"><?php echo "BDT " . $single_product['price'] ?></span> </span>
                                                            </div>
                                                        </div>
                                                        <div class="action">
                                                            <button class="button btn-cart" type="button" title="" data-original-title="View Details" onclick="redirectToProduct('<?=$single_product['id']?>','ads')"><span>View Details</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php }}?>




                            <!-- End Item -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php }?>
    <!-- End Upsell  Slider -->
</div>

</div>

</div>
</sction>

<!-- End Footer -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 840px">
        <div class="modal-content">
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
                                    <input type="text" class="form-control" name="sender_name" id="sender_name" placeholder="Your name" />
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
                                    <input type="email" class="form-control" name="sender_email" id="sender_email" placeholder="Your Email" />
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
                                    <input type="tel" class="form-control" name="sender_phone" id="sender_phone" placeholder="Your Phone" />
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row form-group item-description" title="Enquiry message details">
                            <label class="col-sm-3 label-title">Details</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="message-details" id="message-details" placeholder="Write few lines about your enquiry" rows="6"></textarea>
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
    });

    $('#enquiry-form').on('submit',function () {
        name = $('#sender_name').val();
        email = $('#sender_email').val();
        phone = $('#sender_phone').val();
        details = $('#message-details').val();
        data = $('#enquiry-form').serialize();

        $.ajax({
            type : 'POST',
            url  : SITE_URL+"site/saveMessage",
            data : data,
            cache: false,
            dataType:"json",
            success : function(response){
                if(response.status=="success"){
                    $('#send_message_confirmation').html('<span class="info">Message sent successful</span>');
                    $('#sender_name').val('');
                    $('#sender_email').val('');
                    $('#sender_phone').val('');
                    $('#message-details').val('');
                    $('#myModal').modal('hide');
                }
            }


        });

    });

</script>