
<?php echo $this->renderPartial('../elements/_search_form');
$baseUrl = Yii::app()->request->getBaseUrl(true);
?>


<div id="page" style="margin-top: 100px; margin-left: -16px">

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home"> <a href="/" title="Go to Home Page">Home</a> <span>/</span> </li>
                        <li class="category1599"> <a href="#" title=""><?=$parent_category_details->category_name?></a> <span>/ </span> </li>
                        <li class="category1600"> <a href="#" title=""><?=$category_details->category_name?></a> <span>/</span> </li>
                        <li class="category1601"> <strong><?=$ad_details->title?></strong> </li>
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
                                <form action="#" method="post" id="product_addtocart_form">
                                    <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">



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
                                                                    $images = json_decode($ad_details->image_url);
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
                                        <div class="product-next-prev"> <a class="product-next" href="#"><span></span></a> <a class="product-prev" href="#"><span></span></a> </div>
                                        <div class="product-name">
                                            <br>
                                            <h1><?=$ad_details->title?></h1>
                                        </div>
                                        <div class="ratings">
                                            <p class="col-sm-12">
                                                <span class="col-sm-6"><i class="fa fa-th-list" style="color: #0083c9"></i> Application: <?php echo "sdfd";  ?></span>
                                                <span class="col-sm-6"><i class="fa fa-clock-o" style="color: #0083c9"></i>
                                                    Time left:
                                                    <?php $post_date = new \DateTime($ad_details->deadline);
                                                    $current_time = new \DateTime(); $time_difference = $post_date->diff($current_time);
                                                    if($time_difference->y) {
                                                        echo $time_difference->y." year";
                                                    } else {
                                                        if($time_difference->m){
                                                            echo $time_difference->m." month";
                                                        } else {
                                                            if($time_difference->d) {
                                                                echo $time_difference->d." days";
                                                            } else {
                                                                if($time_difference->h) {
                                                                    echo $time_difference->h." hours";
                                                                } else {
                                                                    if($time_difference->i) {
                                                                        echo $time_difference->i." mins";
                                                                    } else {
                                                                        echo $time_difference->s." sec";
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
                                                <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price">BDT <?=$ad_details->salary?></span> </p>
                                            </div>
                                        </div>
                                        <!-- short-info -->
                                        <div class="short-info">
                                            <h4>Short Information</h4>
                                            <p><strong>Job Category: </strong><?php echo $ad_details->job_category ?></p>
                                            <p><strong>Application Deadline: </strong><?php $deadline = new \DateTime($ad_details->deadline); echo $deadline->format('d M, Y') ?></p>
                                            <p><strong>Type: </strong><?=$ad_details->job_type?></p>
                                            <p><strong>Additional: </strong><?=$ad_details->additional?></p>
                                            <p><strong>Location: </strong><?=$ad_details->job_location?></p>
                                        </div><!-- short-info -->

                                        <!-- contact-with -->
                                        <div class="contact-with">
                                            <h4>Contact with </h4>
								<span class="btn btn-red show-number">
									<i class="fa fa-phone-square"></i>
									<span class="hide-text">Show phone number </span>
									<span class="hide-number" style="font-size: 14px;"><?=$user_details->phone_number?></span>
								</span>
                                            <a href="#" class="btn"><i class="fa fa-envelope-square"></i>Apply Online</a>
                                        </div><!-- contact-with -->
                                    </div>

                                    <div class="col-lg-3 col-sm-3 col-xs-12 pro-banner"><br>
                                        <img alt="banner" src="http://htmldemo.themessoft.com/crocus/version2/images/home-banner.jpg">
                                    </div>
                                </form>
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
                            </ul>
                            <div id="productTabContent" class="tab-content">
                                <div class="tab-pane fade in active" id="product_tabs_description">
                                    <div class="std">
                                        <p><?=$ad_details->description?></p>
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

    <!-- Related Products Slider -->

    <div class="container">

        <!-- Related Slider -->
        <div class="related-pro">

            <div class="slider-items-products">
                <div class="related-block">
                    <div id="related-products-slider" class="product-flexslider hidden-buttons">
                        <div class="home-block-inner">
                            <div class="block-title">
                                <h2>Related Products</h2>
                            </div>
                            <img alt="banner" src="http://htmldemo.themessoft.com/crocus/version2/images/banner-img.jpg">

                        </div>
                        <div class="slider-items slider-width-col4 products-grid block-content">
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="ThinkPad X1 Ultrabook" src="http://htmldemo.themessoft.com/crocus/version2/products-images/product1.jpg"> </a>
                                            <div class="new-label new-top-right">new</div>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview" href="http://htmldemo.themessoft.com/crocus/version2/quick_view.html">Quick View</a>
                                                    </li>
                                                    <li><a class="link-wishlist" href="http://htmldemo.themessoft.com/crocus/version2/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare" href="http://htmldemo.themessoft.com/crocus/version2/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="ThinkPad X1 Ultrabook" href="product_detail.html"> ThinkPad X1 Ultrabook </a> </div>
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
                                                    <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="Samsung GALAXY Note" src="http://htmldemo.themessoft.com/crocus/version2/products-images/product2.jpg"> </a>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview" href="http://htmldemo.themessoft.com/crocus/version2/quick_view.html">Quick View</a>
                                                    </li>
                                                    <li><a class="link-wishlist" href="http://htmldemo.themessoft.com/crocus/version2/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare" href="http://htmldemo.themessoft.com/crocus/version2/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="Retis lapen casen" href="product_detail.html"> Samsung GALAXY Note </a> </div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:80%" class="rating"></div>
                                                        </div>
                                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"> <span class="regular-price"> <span class="price">$235.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Item -->

                            <!-- Item -->
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a class="product-image" title="Epson L360 Printer" href="product_detail.html"> <img alt="Epson L360 Printer" src="http://htmldemo.themessoft.com/crocus/version2/products-images/product3.jpg"> </a>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview" href="http://htmldemo.themessoft.com/crocus/version2/quick_view.html">Quick View</a>
                                                    </li>
                                                    <li><a class="link-wishlist" href="http://htmldemo.themessoft.com/crocus/version2/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare" href="http://htmldemo.themessoft.com/crocus/version2/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="Retis lapen casen" href="product_detail.html"> Epson L360 Printer </a> </div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:80%" class="rating"></div>
                                                        </div>
                                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"> <span class="regular-price"> <span class="price">$325.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Item -->

                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a class="product-image" title="QX30 Lens Camera" href="product_detail.html"> <img alt="QX30 Lens Camera" src="http://htmldemo.themessoft.com/crocus/version2/products-images/product4.jpg"> </a>
                                            <div class="new-label new-top-left">new</div>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview" href="http://htmldemo.themessoft.com/crocus/version2/quick_view.html">Quick View</a>
                                                    </li>
                                                    <li><a class="link-wishlist" href="http://htmldemo.themessoft.com/crocus/version2/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare" href="http://htmldemo.themessoft.com/crocus/version2/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="QX30 Lens Camera" href="product_detail.html"> QX30 Lens Camera </a> </div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:80%" class="rating"></div>
                                                        </div>
                                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"> <span class="regular-price"> <span class="price">$425.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a class="product-image" title="Smart Watch A9" href="product_detail.html"> <img alt="Smart Watch A9" src="http://htmldemo.themessoft.com/crocus/version2/products-images/product5.jpg"> </a>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview" href="http://htmldemo.themessoft.com/crocus/version2/quick_view.html">Quick View</a>
                                                    </li>
                                                    <li><a class="link-wishlist" href="http://htmldemo.themessoft.com/crocus/version2/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare" href="http://htmldemo.themessoft.com/crocus/version2/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="Smart Watch A9" href="product_detail.html"> Smart Watch A9 </a> </div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:80%" class="rating"></div>
                                                        </div>
                                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"> <span class="regular-price"> <span class="price">$525.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Item -->
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="Touch Notebook 500GB HD" src="http://htmldemo.themessoft.com/crocus/version2/products-images/product6.jpg"> </a>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview" href="http://htmldemo.themessoft.com/crocus/version2/quick_view.html">Quick View</a>
                                                    </li>
                                                    <li><a class="link-wishlist" href="http://htmldemo.themessoft.com/crocus/version2/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare" href="http://htmldemo.themessoft.com/crocus/version2/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="Touch Notebook 500GB HD" href="product_detail.html"> Touch Notebook 500GB HD </a> </div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:80%" class="rating"></div>
                                                        </div>
                                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"> <span class="regular-price"> <span class="price">$225.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Item -->
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a class="product-image" title="Canon Zoom Camera" href="product_detail.html"> <img alt="Canon Zoom Camera" src="http://htmldemo.themessoft.com/crocus/version2/products-images/product7.jpg"> </a>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview" href="http://htmldemo.themessoft.com/crocus/version2/quick_view.html">Quick View</a>
                                                    </li>
                                                    <li><a class="link-wishlist" href="http://htmldemo.themessoft.com/crocus/version2/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare" href="http://htmldemo.themessoft.com/crocus/version2/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="Canon Zoom Camera" href="product_detail.html"> Canon Zoom Camera </a> </div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:80%" class="rating"></div>
                                                        </div>
                                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"> <span class="regular-price"> <span class="price">$185.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Item -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End related products Slider -->




    </div>
    <!-- Related Products Slider End -->

    <!-- Upsell Product Slider -->

    <div class="container">
        <!-- upsell Slider -->
        <div class="upsell-pro">
            <div class="slider-items-products">
                <div class="upsell-block">
                    <div id="upsell-products-slider" class="product-flexslider hidden-buttons">
                        <div class="home-block-inner">
                            <div class="block-title">
                                <h2>Upsell Product</h2>
                            </div>
                            <img alt="banner" src="http://htmldemo.themessoft.com/crocus/version2/images/banner-img1.jpg">
                        </div>
                        <div class="slider-items slider-width-col4 products-grid block-content">
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="iPhone 6 Plus" src="http://htmldemo.themessoft.com/crocus/version2/products-images/product10.jpg"> </a>
                                            <div class="new-label new-top-right">new</div>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview" href="http://htmldemo.themessoft.com/crocus/version2/quick_view.html">Quick View</a>
                                                    </li>
                                                    <li><a class="link-wishlist" href="http://htmldemo.themessoft.com/crocus/version2/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare" href="http://htmldemo.themessoft.com/crocus/version2/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="iPhone 6 Plus" href="product_detail.html"> iPhone 6 Plus </a> </div>
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
                                                    <div class="price-box"> <span class="regular-price"> <span class="price">$245.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a class="product-image" title="Noise Smart Watch" href="product_detail.html"> <img alt="Noise Smart Watch" src="http://htmldemo.themessoft.com/crocus/version2/products-images/product11.jpg"> </a>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview" href="http://htmldemo.themessoft.com/crocus/version2/quick_view.html">Quick View</a>
                                                    </li>
                                                    <li><a class="link-wishlist" href="http://htmldemo.themessoft.com/crocus/version2/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare" href="http://htmldemo.themessoft.com/crocus/version2/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="Noise Smart Watch" href="product_detail.html"> Noise Smart Watch </a> </div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:80%" class="rating"></div>
                                                        </div>
                                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"> <span class="regular-price"> <span class="price">$155.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Item -->

                            <!-- Item -->
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a class="product-image" title="Morphy Optimo Kettle" href="product_detail.html"> <img alt="Morphy Optimo Kettle" src="http://htmldemo.themessoft.com/crocus/version2/products-images/product12.jpg"> </a>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview" href="http://htmldemo.themessoft.com/crocus/version2/quick_view.html">Quick View</a>
                                                    </li>
                                                    <li><a class="link-wishlist" href="http://htmldemo.themessoft.com/crocus/version2/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare" href="http://htmldemo.themessoft.com/crocus/version2/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="Morphy Optimo Kettle" href="product_detail.html"> Morphy Optimo Kettle </a> </div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:80%" class="rating"></div>
                                                        </div>
                                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"> <span class="regular-price"> <span class="price">$185.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Item -->

                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a class="product-image" title="Omega J8004 Juicer" href="product_detail.html"> <img alt="Omega J8004 Juicer" src="http://htmldemo.themessoft.com/crocus/version2/products-images/product13.jpg"> </a>
                                            <div class="new-label new-top-left">new</div>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview" href="http://htmldemo.themessoft.com/crocus/version2/quick_view.html">Quick View</a>
                                                    </li>
                                                    <li><a class="link-wishlist" href="http://htmldemo.themessoft.com/crocus/version2/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare" href="http://htmldemo.themessoft.com/crocus/version2/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="Omega J8004 Juicer" href="product_detail.html"> Omega J8004 Juicer </a> </div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:80%" class="rating"></div>
                                                        </div>
                                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"> <span class="regular-price"> <span class="price">$235.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a class="product-image" title="HI114 Dry Iron" href="product_detail.html"> <img alt="HI114 Dry Iron" src="http://htmldemo.themessoft.com/crocus/version2/products-images/product14.jpg"> </a>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview" href="http://htmldemo.themessoft.com/crocus/version2/quick_view.html">Quick View</a>
                                                    </li>
                                                    <li><a class="link-wishlist" href="http://htmldemo.themessoft.com/crocus/version2/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare" href="http://htmldemo.themessoft.com/crocus/version2/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="HI114 Dry Iron" href="product_detail.html"> HI114 Dry Iron </a> </div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:80%" class="rating"></div>
                                                        </div>
                                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"> <span class="regular-price"> <span class="price">$225.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Item -->
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a class="product-image" title="Food Processor" href="product_detail.html"> <img alt="Food Processor" src="http://htmldemo.themessoft.com/crocus/version2/products-images/product16.jpg"> </a>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview" href="http://htmldemo.themessoft.com/crocus/version2/quick_view.html">Quick View</a>
                                                    </li>
                                                    <li><a class="link-wishlist" href="http://htmldemo.themessoft.com/crocus/version2/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare" href="http://htmldemo.themessoft.com/crocus/version2/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="Food Processor" href="product_detail.html"> Food Processor </a> </div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:80%" class="rating"></div>
                                                        </div>
                                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"> <span class="regular-price"> <span class="price">$335.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Item -->
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="Retis lapen casen" src="http://htmldemo.themessoft.com/crocus/version2/products-images/product10.jpg"> </a>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview" href="http://htmldemo.themessoft.com/crocus/version2/quick_view.html">Quick View</a>
                                                    </li>
                                                    <li><a class="link-wishlist" href="http://htmldemo.themessoft.com/crocus/version2/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare" href="http://htmldemo.themessoft.com/crocus/version2/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="Retis lapen casen" href="product_detail.html"> Retis lapen casen </a> </div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:80%" class="rating"></div>
                                                        </div>
                                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Item -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Upsell  Slider -->
    </div>

</div>

</div>
</sction>

<!-- End Footer -->




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

