<?php
$uri = Yii::app()->request->requestUri;
$base_url = Yii::app()->request->getBaseUrl(true);
$current_url = $base_url.$uri;
$category_id = $store_details->categories;
$individual_category_id = explode(',',$category_id);
foreach($individual_category_id as $id){
$category_name[] = Category::model()->findByPk($id);
}


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
		<div class="container">
			<div class="content-top6">
				<div class="row">
					<div class="col-md-8 col-sm-8 col-xs-12">
						<div class="slider-banner6 simple-owl-slider">
							<div class="wrap-item">

								<?php
								$image_array = json_decode($store_details->banner);
								foreach($image_array as $banner){
									$opt = array(
										'w' =>'848',
										'h' =>'430',
										'g'=>'center',
										'r' => '0'
									);

									?>
									<div class="item-banner6">
										<div class="banner-thumb">
											<a href="#"><img src="<?=ImageHelper::cloudinary($banner,$opt)?>" alt="" /></a>
										</div>
									</div>
								<?php }
								?>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
							<?php
							$sub_banner_image_array = json_decode($store_details->sub_banner);
							foreach($sub_banner_image_array as $banner){
								$opt = array(
									'w' =>'370',
									'h' =>'192',
									'g'=>'center',
									'r' => '0'
								);?>

						<div class="item-adv-simple adv-home6">
							<a href="#"><img src="<?=ImageHelper::cloudinary($banner,$opt)?>" alt=""></a>
						</div>
						<?php }
?>
					</div>
				</div>
			</div>
			<!-- End Content Top -->
			<div class="supper-deal6">
				<div class="row">
					<div class="col-md-3 col-sm-4 col-xs-12">
						<div class="supperdeal-sidebar">
							<div class="supperdeal-header">
								
							</div>
							<div class="supperdeal-tab">
								<ul>
									<li class="active"><a href="#featured" data-toggle="tab">Featured Products</a></li>
									<li><a href="#premium" data-toggle="tab">Premium Products</a></li>
									<li><a href="#top" data-toggle="tab">Top Products</a></li>
								</ul>
							</div>

						</div>
					</div>
					<div class="col-md-9 col-sm-8 col-xs-12">
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="featured">
								<div class="">
									<div class="wrap-item">
										<div class="item">
											<?php
											if(isset($featured_products)){
												foreach($featured_products as $products){
													$images = json_decode($products['image_url']);
													$opt_featured = array(
														'w' => '174',
														'h' => '170',
														'g' => 'center',
														'r' => '0'
													);

													?>

													<div class="item-supperdeal">
														<div class="product-thumb product-thumb6">
															<a class="product-thumb-link" href="#">
																<img alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_featured) ?>" class="first-thumb">
																<img alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_featured) ?>" class="second-thumb">
															</a>
															<div class="product-info-cart">
																<a class="addcart-link" href="#"><i class="fa fa-eye"></i>  View Details</a>
															</div>
														</div>
														<div class="product-info6">
															<h3 class="title-product"><a href="#"><?=$products['title']?></a></h3>
															<div class="info-price">
																<span>BDT <?=$products['price']?></span>

															</div>
														</div>
													</div>
													<?php	}}?>
										</div>
										<!-- End Item -->


										<!-- End Item -->
									</div>
								</div>
							</div>
							<!-- End Week -->
							<div role="tabpanel" class="tab-pane fade" id="premium">
								<div class="">
									<div class="wrap-item">
										<div class="item">
											<?php
											if(isset($premium_products)){
											foreach($premium_products as $products){
											$images = json_decode($products['image_url']);
											$opt_premium = array(
												'w' => '174',
												'h' => '170',
												'g' => 'center',
												'r' => '0'
											);

											?>
												<div class="item-supperdeal">
												<div class="product-thumb product-thumb6">
													<a class="product-thumb-link" href="#">
														<img alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_premium) ?>" class="first-thumb">
														<img alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_premium) ?>" class="second-thumb">
													</a>
													<div class="product-info-cart">
														<a class="addcart-link" href="#"><i class="fa fa-eye"></i>  View Details</a>
													</div>
												</div>
												<div class="product-info6">
													<h3 class="title-product"><a href="#"><?=$products['title']?></a></h3>
													<div class="info-price">
														<span>BDT <?=$products['price']?></span>
													</div>
												</div>
											</div>
											<?php	}}?>

										</div>

										<!-- End Item -->
									</div>
								</div>
							</div>
							<!-- End Month -->
							<div role="tabpanel" class="tab-pane fade" id="top">
								<div class="">
									<div class="wrap-item">
										<div class="item">
											<?php
											if(isset($top_products)){
											foreach($top_products as $products){
											$images = json_decode($products['image_url']);
											$opt_top= array(
												'w' => '174',
												'h' => '170',
												'g' => 'center',
												'r' => '0'
											);

											?>
												<div class="item-supperdeal">
												<div class="product-thumb product-thumb6">
													<a class="product-thumb-link" href="#">
														<img alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_top) ?>" class="first-thumb">
														<img alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_top) ?>" class="second-thumb">
													</a>
													<div class="product-info-cart">
														<a class="addcart-link" href="#"><i class="fa fa-eye"></i>  View Details</a>
													</div>
												</div>
												<div class="product-info6">
													<h3 class="title-product"><a href="#"><?=$products['title']?></a></h3>
													<div class="info-price">
														<span>BDT <?=$products['price']?></span>

													</div>
												</div>
											</div>

											<?php	}}?>

										</div>

									</div>
								</div>
							</div>
							<!-- End Year -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Supper Deal -->

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
																<a class="product-thumb-link" href="#">
																	<img alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_top) ?>" class="first-thumb">
																	<img alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_top) ?>" class="second-thumb">
																</a>
																<div class="product-info-cart">

																	<a class="addcart-link" href="#"><i class="fa fa-eye"></i>  View Details</a>

																</div>
															</div>
														</div>
														<div class="product-info6">
															<h3 class="title-product"><a href="#"><?=$individual_product['title']?></a></h3>
															<div class="info-price">
																<span>BDT <?=$individual_product['price']?></span>
															</div>
														</div>
													</div>
												</div>

											<?php  }}?>
										</div>
									</div>

							<?php $counter++; }?>
							<!-- End Mobile -->
							<div role="tabpanel" class="tab-pane fade" id="fashion">
								<div class="row">
									<div class="col-md-3 col-sm-4 col-xs-12">
										<div class="item-product-filter">
											<div class="product-thumb product-thumb6">
												<div class="inner-product-thumb">
													<a class="product-thumb-link" href="#">
														<img alt="" src="images/photos/beauty/3.jpg" class="first-thumb">
														<img alt="" src="images/photos/beauty/1.jpg" class="second-thumb">
													</a>
													<div class="product-info-cart">
														<div class="product-extra-link">
															<a class="wishlist-link" href="#"><i class="fa fa-heart-o"></i></a>
															<a class="compare-link" href="#"><i class="fa fa-toggle-on"></i></a>
															<a class="quickview-link" href="#"><i class="fa fa-search"></i></a>
														</div>
														<a class="addcart-link" href="#"><i class="fa fa-shopping-basket"></i>  Add to Cart</a>
													</div>
												</div>
											</div>
											<div class="product-info6">
												<h3 class="title-product"><a href="#">Sneakers for Men </a></h3>
												<div class="info-price">
													<span>$300.00</span>
													<del>$350.00</del>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
							<!-- End Fashion -->
							<div role="tabpanel" class="tab-pane fade" id="beauty">
								<div class="row">
									<div class="col-md-3 col-sm-4 col-xs-12">
										<div class="item-product-filter">
											<div class="product-thumb product-thumb6">
												<div class="inner-product-thumb">
													<a class="product-thumb-link" href="#">
														<img alt="" src="images/photos/jewelry/1.jpg" class="first-thumb">
														<img alt="" src="images/photos/jewelry/13.jpg" class="second-thumb">
													</a>
													<div class="product-info-cart">
														<div class="product-extra-link">
															<a class="wishlist-link" href="#"><i class="fa fa-heart-o"></i></a>
															<a class="compare-link" href="#"><i class="fa fa-toggle-on"></i></a>
															<a class="quickview-link" href="#"><i class="fa fa-search"></i></a>
														</div>
														<a class="addcart-link" href="#"><i class="fa fa-shopping-basket"></i>  Add to Cart</a>
													</div>
												</div>
											</div>
											<div class="product-info6">
												<h3 class="title-product"><a href="#">Sneakers for Men </a></h3>
												<div class="info-price">
													<span>$300.00</span>
													<del>$350.00</del>
												</div>
											</div>
										</div>
									</div>

								</div>
							<!-- End Fashion -->
						</div>
					</div>
				</div>
				<!-- End Category Filter -->
			</div>
			<!-- End New Product Filter -->

			<!-- End From Blog 6 -->
		</div>
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
