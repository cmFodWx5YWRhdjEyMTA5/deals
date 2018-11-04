<?php
$uri = Yii::app()->request->requestUri;
$base_url = Yii::app()->request->getBaseUrl(true);
$current_url = $base_url.$uri;
$category_id = $store_details->categories;
$individual_category_id = explode(',',$category_id);
foreach($individual_category_id as $id){
    $category_name[] = Category::model()->findByPk($id);
}

$facebook_link = (isset($store_details->facebook_link) && !empty($store_details->facebook_link)) ? $store_details->facebook_link : "#" ;
$twitter_link = (isset($store_details->twitter_link) && !empty($store_details->twitter_link)) ? $store_details->twitter_link : "#" ;
$linkedin_link = (isset($store_details->linkedin_link) && !empty($store_details->linkedin_link)) ? $store_details->linkedin_link : "#" ;
$google_plus_link = (isset($store_details->google_plus_link) && !empty($store_details->google_plus_link)) ? $store_details->google_plus_link : "#" ;

?>



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
        <div class="content-page">
            <div class="container">
                <h2 class="title-shop-page">Packages</h2>
                <div class="list-super-deal">
                    <div class="super-deal-content">
                        <div class="row">
                            <?php
                            if(isset($all_products)){
                            foreach($all_products as $products){
                            $images = json_decode($products['image_url']);
                            $opt_featured = array(
                                'w' => '300',
                                'h' => '365',
                                'g' => 'center',
                                'r' => '0'
                            );
                                $word_count = 10;

                                $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', strip_tags($products['description']));
                                $string = str_replace("\n", " ", $string);
                                $seemore = '<span class="text-bold">.....! <span>';
                                $array = explode(" ", $string);
                                if (count($array)<= $word_count)
                                {
                                    $retval =  $string;
                                }
                                else
                                {
                                    array_splice($array, $word_count);
                                    $retval = implode(" ", $array).$seemore;
                                }
                            ?>


                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="item-deal-product">
                                    <div class="product-thumb">
                                        <a class="product-thumb-link" href="<?=$base_url.'/isp/'.$store_details->url_alias?>/product-details/<?=$products['id']?>">
                                            <img class="first-thumb" alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_featured) ?>">
                                            <img class="second-thumb" alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_featured) ?>">
                                        </a>
                                        <div class="product-info-cart">

                                            <a class="addcart-link" href="<?=$base_url.'/isp/'.$store_details->url_alias?>/product-details/<?=$products['id']?>"><i class="fa fa-eye"></i> VIEW DETAILS</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="title-product"><a href="<?=$base_url.'/isp/'.$store_details->url_alias?>/product-details/<?=$products['id']?>"><?=$products['title']?></a></h3>
                                        <p class="desc"><?=$retval?></p>
                                        <?php if($products['show_price']) { ?>
                                        <div class="info-price-deal">
                                            <span>&#2547; <?=$products['price']?></span>
                                        </div>
                                        <?php } ?>
                                        <div class="deal-shop-social">
                                            <a href="<?=$base_url.'/isp/'.$store_details->url_alias?>/product-details/<?=$products['id']?>" class="deal-shop-link">view details</a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php	}}?>


                    </div>
                        <div class="pagination">
                            <?php
                            echo $pagination;
                            ?>
                        </div>
                </div>
                <!-- End Super Deal -->
            </div>
        </div>
        <!-- End Main Content Home -->
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

<style>


    /* ====================== Pagination Starts ====================== */

    div.pagination {
        padding: 3px;
        margin: 3px;
        z-index: 1000;
        font-size: 14px;
        margin-bottom: 20px;
    }

    div.pagination a {
        padding: 5px 7px;
        margin: 2px;
        border: 1px solid #0D6B23;
        text-decoration: none; /* no underline */
        background-color: #1DA93E;
        color: #FFF;
        font-weight: bold;
    }

    div.pagination a:hover, div.pagination a:active {
        border: 1px solid #0D6B23;
        color: #FFF;
        background-color: #63BC78;
    }

    div.pagination span.current {
        padding: 5px 7px;
        margin: 2px;
        border: 1px solid #0D6B23;
        font-weight: bold;
        background-color: #63BC78;
        color: #FFF;
        font-weight: bold;
    }

    div.pagination span.disabled {
        padding: 5px 7px;
        margin: 2px;
        border: 1px solid #929693;
        color: #929693;
    }
    /* ====================== Pagination Ends ====================== */














</style>