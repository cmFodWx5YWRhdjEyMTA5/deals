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


			<!-- End List Adv -->
			<div class="new-product-filter">
				<div class="header-product-filter">
					<h2 class="isp-gradient">
						<span class="isp-bg">all packages</span>

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
								<li class="<?=$active_class?>"><a href="#<?=$slug?>" data-toggle="tab" class="isp"><?=$name?></a></li>
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
																<a class="product-thumb-link" href="<?=$base_url.'/isp/'.$store_details->url_alias?>/product-details/<?=$individual_product['id']?>">
																	<img alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_top) ?>" class="first-thumb">
																	<img alt="" src="<?php echo ImageHelper::cloudinary($images[0],$opt_top) ?>" class="second-thumb">
																</a>
																<div class="product-info-cart">

																	<a class="addcart-link" href="<?=$base_url.'/isp/'.$store_details->url_alias?>/product-details/<?=$individual_product['id']?>"><i class="fa fa-eye"></i>  View Details</a>

																</div>
															</div>
														</div>
														<div class="product-info6">
															<h3 class="title-product"><a href="<?=$base_url.'/isp/'.$store_details->url_alias?>/product-details/<?=$individual_product['id']?>"><?=$individual_product['title']?></a></h3>
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
	<script>
		$('.banner-thumb,.item-adv-simple').bind('contextmenu', function(e) {
			return false;
		});
	</script>
