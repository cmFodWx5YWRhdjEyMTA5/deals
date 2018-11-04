<?php $baseUrl = Yii::app()->getBaseUrl(true);?>
<br>
<div class="container">
    <div class="super-deal">
        <div class="super-deals-header" style="padding-bottom: 18px">
            <img src="<?=$baseUrl?>/images/home1/Pohela-Boishakh-1424.jpg" height="115">
        </div>
        <div class="super-deal-content">
            <div class="row">

                <?php
                if(isset($special_offer_ads) && !empty($special_offer_ads)){
                    $counter = 1;
                    $favorite_ads = Generic::getAllFavoritesAds();
                    foreach($special_offer_ads as $individual_ads){

                        $ad_url = Generic::getAdUrlFromAdId($individual_ads['id']);

                        $current_date = date('Y-m-d');
                        $expire_date = isset($single_product['expire_date']) ? $individual_ads['expire_date'] : '';

                        $images = json_decode($individual_ads['image_url']);
                        $fav_params = "this,'".$individual_ads['id']."'";

                        $favorites_class = "";
                        $favorites_title = "Ad as favorite";
                        if(in_array($single_product['id'],$favorite_ads)){
                            $favorites_class = "favorite-active";
                            $favorites_title = "Remove From favorite";

                        }

                        $word_count = 8;
                        $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', strip_tags($individual_ads['description']));
                        $string = str_replace("\n", " ", $string);
                        $array = explode(" ", $string);
                        if (count($array)<= $word_count)
                        {

                            $retval =  $string;
                        }
                        else
                        {
                            array_splice($array, $word_count);
                            $retval = implode(" ", $array);
                        }


                        $discount = isset($individual_ads['discount']) ? round($individual_ads['discount']) : '';
                        $total_price = isset($individual_ads['price']) ? $individual_ads['price'] : '';
                        $price_end = is_null($individual_ads['price_end']) ? '' : ' - '.$individual_ads['price_end'];
                        $discounted_total = $total_price - ($total_price * ($discount/100));
                        $opt_estore = array(
                            'w' => '230',
                            'h' => '260',
                            'g' => 'center',
                            'r' => '0',
                            'c' => 'pad'
                        );?>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="item-deal-product">
                                <div class="product-thumb">
                                    <a class="product-thumb-link" target="_blank" href="<?=$ad_url?>">
                                        <img width="230" height="260" class="first-thumb" alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_estore) ?>">
                                        <img width="230" height="260" class="second-thumb" alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_estore) ?>">
                                    </a>
                                    <div class="product-info-cart">
                                        <div class="product-extra-link">
                                            <a href="javascript:void(0);" class="wishlist-link favorite <?=$favorites_class?>" title="<?=$favorites_title?>"  href="javascript:void(0);" onclick="ChangeFavoriteStatus(<?=$fav_params?>)"><i class="fa fa-heart-o"></i></a>
                                            <a href="javascript:void(0);" class="compare-link"><i class="fa fa-toggle-on"></i></a>
                                            <a href="javascript:void(0);" data-item="<?php echo $individual_ads['id'] ?>" class="quickview-link"><i class="fa fa-search"></i></a>
                                        </div>
                                        <a class="addcart-link" target="_blank" href="<?=$ad_url?>"><i class="fa fa-shopping-basket"></i>View Details</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h3 class="title-product"><a target="_blank" href="<?=$ad_url?>"><?=$individual_ads['title']?></a></h3>
                                    <p class="desc"><?=$retval?></p>
                                    <div class="info-price-deal">
                                        <?php if($individual_ads['show_price']){ ?>
                                            <div class="info-price">
                                                <?php if($individual_ads['discount']){?>

                                                    <span>&#2547; <?=$discounted_total?></span>
                                                    <del>&#2547; <?=$individual_ads['price']?></del>
                                                <?php } else { ?>
                                                    <span>&#2547; <?=$individual_ads['price'].$price_end?></span>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="percent-saleoff" style="left: 20px;top: -6px;">
                                        <span><label><?=round($individual_ads['discount'])?>%</label> OFF</span>
                                    </div>
                                    <div class="deal-shop-social">
                                        <a href="<?=$ad_url?>" target="_blank" class="deal-shop-link">View Details</a>

                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php	}}?>





            </div>

        </div>
    </div>
</div>

<style>
    .item-deal-product:hover{
        border: 1px solid #f9bc02;
        box-shadow: 0 0 21px 5px rgba(0, 0, 0, 0.14);
        z-index: 20;
    }
</style>