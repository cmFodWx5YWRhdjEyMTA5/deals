<?php
$uri = Yii::app()->request->requestUri;
$base_url = Yii::app()->request->getBaseUrl(true);
$session =  Yii::app()->session['user_token'];
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

$uri = Yii::app()->request->requestUri;
$base_url = Yii::app()->request->getBaseUrl(true);
$current_url = $base_url.$uri;
$link = $current_url;
$baseUrl = Yii::app()->request->getBaseUrl(true);
$image_path = $baseUrl. "/images/bdads24_FB_ProfilePic.jpg";
$image_path = (isset($store_details->logo) && !empty($store_details->logo))? $store_details->logo : $image_path ;

$og_image = $image_path;

$meta_desc="";
$og_title =  'Home | '.$user_details->enterprise_name;
$og_desc =  $store_details->about_us;

Yii::app()->clientScript->registerMetaTag($og_title,null,null,array('property'=>'og:title'));
Yii::app()->clientScript->registerMetaTag($og_desc,null,null,array('property'=>'og:description'));
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
<div class="wrap">
	<div id="header">
		<div class="header6">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="contact-top">
							<p><span><i class="fa fa-phone-square"></i></span> Call Center Support 24/7: <span><?=$user_details->phone_number?></span>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<?php if($session == $user_details->user_token){?>
						<span style="color: #fff;margin-left: 293px;">You are logged in as a store owner</span>
						<img class="img-circle" src="<?=$user_details->image?>" alt="User Image" style="width:40px;height:40px; float: right";>
						<?php } ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-3 col-xs-12">
						<div class="logo6">
							<a href="<?=$current_url?>"><img alt="" src="<?=ImageHelper::cloudinary($store_details->logo,$opt)?>"></a>
						</div>
					</div>
					<div class="col-md-6 col-sm-9 col-xs-12">
						<div class="smart-search smart-search6">
							<div class="select-category">
								<a class="category-toggle-link" href="#"><span>All Categories</span></a>
								<ul class="list-category-toggle sub-menu-top">
									<?php
									foreach($category_name as $individual_name){
										$name = $individual_name->category_name; 

										?>
										<li><a href="#"><?=$name?></a></li>

									<?php  }?>
								</ul>
							</div>
							<form class="smart-search-form">
								<input type="text" onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue) this.value = ''" value="I am looking for...">
								<input type="submit" value="">
							</form>
						</div>
					</div>
<!--					<div class="col-md-2">
						<div class="estore_badge"><img src="/images/verified_member.png" alt="" /> </div>
					</div>-->
				</div>
			</div>
		</div>
		<div class="header-nav6">
			<div class="container">
				<div class="row">
					<div class="col-md-11 col-sm-12 col-xs-6">
						<nav class="main-nav main-nav6">
							<ul>
								<li><a href="<?=$base_url.'/e-store/'.$store_details->url_alias?>">Home</a></li>
                                <li><a href="<?=$base_url.'/e-store/'.$store_details->url_alias?>/all-products">Packages</a></li>
                                <li><a href="<?=$base_url.'/e-store/'.$store_details->url_alias?>/contact-us">Contact-us</a></li>
							<!--	<li><a href="<?/*=$current_url*/?>/contact-us">Contact Us</a></li>
								<li><a href="<?/*=$current_url*/?>/about-us">About Us</a></li>-->
							</ul>
							<a href="#" class="toggle-mobile-menu"><span>Menu</span></a>
						</nav>
						<!-- End Main Nav --></div>

				</div>
			</div>
		</div>
	</div>
	<!-- End Header -->
	<div id="content">
		<div class="container">
			<div class="content-top6">
				<div class="row">
					<div class="col-md-8 col-sm-8 col-xs-12">
						<div class="rev-slider">
							<ul>
								<?php
								$image_array = json_decode($store_details->banner);
								if(isset($image_array)){
								foreach($image_array as $banner){
									$opt = array(
										'w' =>'850',
										'h' =>'430',
										'g'=>'center',
										'r' => '0'
									);

									?>
									<li class="slide" data-transition="random">
										<img src="<?=ImageHelper::cloudinary($banner,$opt)?>" alt="" />
									</li>
								<?php 
									}
								}

								?>
								</ul>
							</div>

					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
							<?php
							$sub_banner_image_array = json_decode($store_details->sub_banner);
							if(isset($sub_banner_image_array)){
							foreach($sub_banner_image_array as $banner){
								$opt = array(
									'w' =>'370',
									'h' =>'190',
									'g'=>'center',
									'r' => '0'
								);?>

						<div class="item-adv-simple adv-home6">
							<a href="#"><img src="<?=ImageHelper::cloudinary($banner,$opt)?>" alt=""></a>
						</div>
						<?php 
							}
						}
?>
					</div>
				</div>
			</div>


			<!-- End List Service -->
			<div class="list-tab-product">
				<div class="">
					<div class="row">
						<div class="col-md-3 col-sm-4 col-xs-12">
							<div class="title-tab-product">
								<h2 style="font-size: 20px;">popular products</h2>
								<ul>
									<li class="active"><a href="#" data-id="featured">Featured Products</a></li>
									<li><a href="#" data-id="premium">Premium Products</a></li>
									<li><a href="#" data-id="top">Top Products</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-9 col-sm-8 col-xs-12">
							<div class="content-tab-product">
								<div id="featured" class="tab-pane active">
									<div class="product-tab-slider">
										<div class="wrap-item">
											<?php

											if(isset($featured_products) && !empty($featured_products)){
											foreach($featured_products as $products){
											$images = json_decode($products['image_url']);
											$opt_featured = array(
												'w' => '265',
												'h' => '316',
												'g' => 'center',
												'r' => '0'
											);

											?>
												<div class="item">
												<div class="item-product">
													<div class="product-thumb">
														<a class="product-thumb-link" href="<?=$base_url.'/e-store/'.$store_details->url_alias?>/product-details/<?=$products['id']?>">
															<img class="first-thumb" alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_featured) ?>">
															<img class="second-thumb" alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_featured) ?>">
														</a>
														<div class="product-info-cart">

															<a href="<?=$base_url.'/e-store/'.$store_details->url_alias?>/product-details/<?=$products['id']?>" class="addcart-link"><i class="fa fa-eye"></i> View Details</a>
														</div>


													</div>

												</div>
													<div class="product-info6" style="padding: 0px 0 20px;">
														<h3 class="title-product"><a href="<?=$base_url.'/e-store/'.$store_details->url_alias?>/product-details/<?=$products['id']?>"><?=$products['title']?></a></h3>
														<?php if($products['show_price']) { ?>
														<div class="info-price">
															<span>&#2547; <?=$products['price']?></span>
														</div>
														<?php } ?>
													</div>
											</div>

											<?php	}}?>

										</div>
									</div>
								</div>
								<div id="premium" class="tab-pane">
									<div class="product-tab-slider">
										<div class="wrap-item">
											<?php
											if(isset($premium_products) && !empty($premium_products)){
											foreach($premium_products as $products){
											$images = json_decode($products['image_url']);
											$opt_premium = array(
												'w' => '265',
												'h' => '316',
												'g' => 'center',
												'r' => '0'
											);

											?>

											<div class="item">
												<div class="item-product">
													<div class="product-thumb">
														<a class="product-thumb-link" href="<?=$base_url.'/e-store/'.$store_details->url_alias?>/product-details/<?=$products['id']?>">
															<img class="first-thumb" alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_premium)?>">
															<img class="second-thumb" alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_premium)?>">
														</a>
														<div class="product-info-cart">

															<a href="<?=$base_url.'/e-store/'.$store_details->url_alias?>/product-details/<?=$products['id']?>" class="addcart-link"><i class="fa fa-eye"></i> View Details</a>
														</div>
													</div>
												</div>
												<div class="product-info6" style="padding: 0px 0 20px;">
													<h3 class="title-product"><a href="<?=$base_url.'/e-store/'.$store_details->url_alias?>/product-details/<?=$products['id']?>"><?=$products['title']?></a></h3>
													<?php if($products['show_price']) { ?>
													<div class="info-price">
														<span>&#2547; <?=$products['price']?></span>
													</div>
													<?php } ?>
												</div>
											</div>
											<?php	}}?>

										</div>
									</div>
								</div>
								<div id="top" class="tab-pane">
									<div class="product-tab-slider">
										<div class="wrap-item">
											<?php
											if(isset($top_products) && !empty($top_products)){
											foreach($top_products as $products){
											$images = json_decode($products['image_url']);
											$opt_top= array(
												'w' => '265',
												'h' => '316',
												'g' => 'center',
												'r' => '0'
											);

											?>

											<div class="item">
												<div class="item-product">
													<div class="product-thumb">
														<a class="product-thumb-link" href="<?=$base_url.'/e-store/'.$store_details->url_alias?>/product-details/<?=$products['id']?>">
															<img class="first-thumb" alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_top)?>">
															<img class="second-thumb" alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_top)?>">
														</a>
														<div class="product-info-cart">

															<a href="<?=$base_url.'/e-store/'.$store_details->url_alias?>/product-details/<?=$products['id']?>" class="addcart-link"><i class="fa fa-eye"></i> View Details</a>
														</div>
													</div>
												</div>
												<div class="product-info6" style="padding: 0px 0 20px;">
													<h3 class="title-product"><a href="<?=$base_url.'/e-store/'.$store_details->url_alias?>/product-details/<?=$products['id']?>"><?=$products['title']?></a></h3>
													<?php if($products['show_price']) { ?>
													<div class="info-price">
														<span>&#2547; <?=$products['price']?></span>
													</div>
													<?php } ?>
												</div>
											</div>

											<?php	}}?>

										</div>
									</div>
								</div>

							</div>
							<!-- End Content Tab -->
						</div>
					</div>
				</div>
			</div>



			<!-- End List Adv -->
			<div class="new-product-filter">
				<div class="header-product-filter">
					<h2>
						<span>all products</span>

					</h2>

				</div>
				<div class="category-tab-filter">
					<div class="category-filter-title">
						<ul>
							<?php
							$counter = 0;
							if(count($category_name) > 6){
								$category_name = array_slice($category_name,0,6);
							}

							foreach($category_name as $individual_name){
								$name = $individual_name->category_name;
								$slug = $individual_name->sub_category_slug;
								$active_class = '';
								if($counter == 0){
									$active_class = 'active';
								}?>
								<li class="<?=$active_class?>"><a href="#<?=$slug?>" data-toggle="tab"><?=$name?></a></li>
							<?php $counter++; }?>
						</ul>
					</div>
					<div class="category-filter-content">
						<div class="tab-content">
							<?php
							$counter = 0;
							foreach($category_name as $individual_name){
								$slug = $individual_name->sub_category_slug;
								$category_id = $individual_name->category_id;
								$products  = Generic::getProductsFromCategoryId($category_id,$user_id) ;

									$active_class = '';
									if($counter == 0){
										$active_class = 'active';
									}
									?>

									<div role="tabpanel" class="tab-pane fade in <?=$active_class?>" id="<?=$slug?>">
										<div class="row">
											<?php
								if(isset($products) && !empty($products)){
											foreach($products as $individual_product){
												$images = json_decode($individual_product['image_url']);
												$opt_top= array(
													'w' => '300',
													'h' => '365',
													'g' => 'center',
													'r' => '0'
												);?>
												<div class="col-md-3 col-sm-4 col-xs-12">
													<div class="item-product-filter">
														<div class="product-thumb product-thumb6">
															<div class="inner-product-thumb">
																<a class="product-thumb-link" href="<?=$base_url.'/e-store/'.$store_details->url_alias?>/product-details/<?=$individual_product['id']?>">
																	<img alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_top) ?>" class="first-thumb">
																	<img alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_top) ?>" class="second-thumb">
																</a>
																<div class="product-info-cart">

																	<a class="addcart-link" href="<?=$base_url.'/e-store/'.$store_details->url_alias?>/product-details/<?=$individual_product['id']?>"><i class="fa fa-eye"></i>  View Details</a>

																</div>
															</div>
														</div>
														<div class="product-info6">
															<h3 class="title-product"><a href="<?=$base_url.'/e-store/'.$store_details->url_alias?>/product-details/<?=$individual_product['id']?>"><?=$individual_product['title']?></a></h3>
															<?php if($individual_product['show_price']) { ?>
															<div class="info-price">
																<span>&#2547; <?=$individual_product['price']?></span>
															</div>
															<?php } ?>
														</div>
													</div>
												</div>

											<?php  }}?>
										</div>
									</div>

							<?php $counter++; }?>
					</div>
				</div>
				<!-- End Category Filter -->
			</div>
			<!-- End New Product Filter -->

			<!-- End From Blog 6 -->
		</div>
	</div>
	<!-- End Content -->
	<div id="footer">
		<div class="newsletter6">
			<div class="container">
				<div class="newsletter-form">

				</div>
			</div>
		</div>
		<div class="footer6">
			<div class="container">
				<div class="list-footer-box6">
					<div class="row">
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="footer-box6 first-item">
								<h2>ABOUT US</h2>
							    <p><?=$store_details->about_us?></p>
							</div>
						</div>
						<!-- <div class="col-md-4 col-sm-6 col-xs-12">
							<div class="footer-box6">
								<h2>WHY BUY FROM US</h2>
								<ul class="footer-menu-box">

									<li><a href="#">Secure Shopping</a></li>
									<li><a href="#">Group Sales</a></li>
									<li><a href="#">Orders and Returns</a></li>
								</ul>
							</div>
						</div> -->

						<div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="footer-box6 footer-contact6">
                                <h2>Contact Us</h2>
                                <ul class="footer-box-contact">
                                    <li><i class="fa fa-home"></i> Our business address is <?=$user_details->address?></li>
                                    <li><i class="fa fa-mobile"></i><?=$user_details->phone_number?></li>
                                    <li><i class="fa fa-envelope"></i> <a href="mailto:<?=$user_details->email?>"><?=$user_details->email?></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="footer-box6">
                                <div class="social-footer social-network">
                                    <ul>
                                        <li><a target="_blank" href="<?=$facebook_link?>"><img alt="facebook" src="<?=$base_url?>/images/home1/s1.png"></a></li>
                                        <li><a target="_blank" href="<?=$twitter_link?>"><img alt="twitter" src="<?=$base_url?>/images/home1/s2.png"></a></li>
                                        <li><a target="_blank" href="<?=$linkedin_link?>"><img alt="LinkedIn" src="<?=$base_url?>/images/home1/s3.png"></a></li>
                                        <li><a target="_blank" href="<?=$google_plus_link?>"><img alt="Google Plus" src="<?=$base_url?>/images/home1/s4.png"></a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<p class="footer_powered_by">Powered by <a href="http://www.bdbroadbanddeals.com.com" target="_blank">BD Broadband Deals</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- End Footer -->
</div>
	<script>
		$('.banner-thumb,.item-adv-simple').bind('contextmenu', function(e) {
			return false;
		});
	</script>
