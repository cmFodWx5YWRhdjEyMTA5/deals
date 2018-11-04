<?php


$baseUrl = Yii::app()->request->getbaseUrl(true);
$token = Yii::app()->request->getParam('uid');
$profile_data = Generic::getProfileData($token);
$user_name = isset($profile_data['user_name']) ? $profile_data['user_name'] : '';
$email = isset($profile_data['email']) ? $profile_data['email'] : '';
$phone_number = isset($profile_data['phone_number']) ? $profile_data['phone_number'] : '';
$opt = array(
	'w' => '870',
	'h' => '270',
	'g' => 'center',
	'r' => '0'
);
$category_static_image = $baseUrl."/images/inside-images/category-img1.jpg";
$category_image = (isset($category_banner_image[0]['category_banner_image']) && !empty($category_banner_image[0]['category_banner_image'])) ? $category_banner_image[0]['category_banner_image']: $category_static_image;
$image = json_decode($category_image,true);
$ad_url = Generic::getAdUrlFromAdId(136);
//Generic::_setTrace($ad_url);
?>

<input id="view_type" type="hidden" name="view_type" value="list">
<input id="country_code" type="hidden" name="country_code" value="<?php echo $country_code ?>">
<input id="maximum" type="hidden" name="maximum" value="<?=$maximum_price[0]['price']?>">
<input id="minimum" type="hidden" name="minimum" value="<?=$minimum_price[0]['price']?>">
<!-- End Header -->
<div id="content">
	<div class="content-shop left-sidebar">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-8 col-xs-12 main-content">
					<div class="main-content-shop">
						<div class="banner-shop-slider">
							<div class="wrap-item">
								<?php
								if(isset($image) && !empty($image)){
								$opt = array(
									'w' => '870',
									'h' => '290',
									'g' => 'center',
									'r' => '0'
								);
								foreach($image as $images){
								?>
								<div class="item">
									<div class="item-shop-slider">
										<div class="shop-slider-thumb">
											<a href="#"><img src="<?php echo ImageHelper::cloudinary($images,$opt)?>" alt="" /></a>
										</div>

									</div>
								</div>
								<?php  }}?>
							</div>
						</div>
						<input type="hidden" name="business_type" id="business_type" value="">
						<!-- End Banner Slider -->
						<div class="list-shop-cat">
							<ul>
								<li><a  href="javascript:void(0);" onclick="place_value('business'),focusMe(this);">Business <span class="business"></span></a></li>
								<li><a  href="javascript:void(0);" onclick="place_value('personal'),focusMe(this);">Individuals <span class="personal"></span></a></li>
								<li><a  href="javascript:void(0);" onclick="place_value('promotion'),focusMe(this);">Promotional <span class="promotion"></span></a></li>

							</ul>
						</div>
						<!-- End List Shop Cat -->
						<div class="shop-tab-product">
							<div class="shop-tab-title">
								<h2><?php echo CHtml::encode($parent_category->category_name) ?></h2>
								<ul class="shop-tab-select">
									<li><a href="#product-grid" class="grid-tab" data-toggle="tab"></a></li>
									<li class="active"><a href="#product-list" class="list-tab" data-toggle="tab"></a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane fade" id="product-grid">
									<ul class="row product-grid auto-clear">






									</ul>
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="sort-pagi">



											</div>
										</div>
									</div>
									<!-- End Sort Pagibar -->
								</div>
								<div role="tabpanel" class="tab-pane fade in active" id="product-list">
									<ul class="product-list">






									</ul>
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="sort-pagi">


											</div>
										</div>
									</div>
									<!-- End Sort Pagibar -->
								</div>
							</div>
						</div>
						<!-- End Shop Tab -->
					</div>
					<!-- End Main Content Shop -->
				</div>
				<div class="col-md-3 col-sm-4 col-xs-12 sidebar">
					<div class="sidebar-shop sidebar-left">
						<div class="widget widget-filter">
							<div class="box-filter category-filter">
								<h2 class="widget-title">CATEGORY</h2>
								<?php
								if(isset($category_slug) && !empty($category_slug)){?>
								<ul>
									<?php
									$sub_category = Generic::getSubCategoryFromCategoryId($category_id);
									foreach($sub_category as $sb_category){
                                      ?>
										<li>
											<?php if($country_code){ ?>
											<a href="<?=$baseUrl.'/'.$country_code?>/ad-list?sub_category_slug=<?=$sb_category['sub_category_slug']?>" id="<?=$sb_category['sub_category_slug']?>" > <?=$sb_category['category_name']?> </a>
											<?php } else { ?>
												<a href="<?=$baseUrl?>/ad-list?sub_category_slug=<?=$sb_category['sub_category_slug']?>" id="<?=$sb_category['sub_category_slug']?>" > <?=$sb_category['category_name']?> </a>
											<?php } ?>
										</li>
									<?php }?>
								</ul>
								<?php }?>

								<?php
								if(isset($sub_category_slug) && !empty($sub_category_slug)){?>
									<ul>
										<?php
										$sub_category = Generic::getSubCategoryFromParentId($parentId);
										foreach($sub_category as $sb_category){
											$class = "";
											 if($sub_category_slug == $sb_category['sub_category_slug']){
												$class = "active";
											 }
											?>
											<li>
												<a class="<?=$class?>" href="<?=$baseUrl?>/ad-list?sub_category_slug=<?=$sb_category['sub_category_slug']?>" id="<?=$sb_category['sub_category_slug']?>"   style="<?php if($sub_category_slug == $sb_category['sub_category_slug']) echo "color: red"?>" > <?=$sb_category['category_name']?> </a>
											</li>
										<?php }?>
									</ul>
								<?php }?>
							</div>
							<!-- End Category -->
							<!-- <div class="box-filter manufacturer-filter">
								<h2 class="widget-title">Conditions</h2>
								<label for="new"><input type="checkbox" name="condition" id="new" value="1" data-value="new"> New</label>
								<label for="used" style="margin-left: 50px;"><input type="checkbox" value="0" name="condition" data-value="used" id="used"> Used</label>
							</div> -->
							<!-- <div class="box-filter manufacturer-filter">
								<h2 class="widget-title">Location</h2>
								<ul>
									<?php
										$count =0;
										foreach($states as $state){
											if($count<7){ ?>
												<label class="location" for="<?=strtolower($state['name'])?>"><input type="checkbox" id="<?=strtolower($state['name'])?>" name="locations" value="<?=$state['name']?>"> <?=$state['name']?></label>
										<?php
											}
											else{
										?>
											<label class="location location_hidden" for="<?=strtolower($state['name'])?>"><input type="checkbox" id="<?=strtolower($state['name'])?>" name="locations" value="<?=$state['name']?>"> <?=$state['name']?></label>
										<?php
											}
											$count++;
										}
									?>
								
								</ul>
								<button type="button" class="btn btn-warning collapsed" id="expand_states" style="width:100%;">
									<i class="fa fa-plus-square" aria-hidden="true"></i>
									More
								</button>
								<br>
							</div> -->
							<!-- <div class="box-filter price-filter">
								<h2 class="widget-title">price</h2>
								<input type="hidden" name="minimum_price" id="minimum_price" value="">
								<input type="hidden" name="maximum_price" id="maximum_price" value="">
								<div class="inner-price-filter">

									<div class="range-filter">
										<label style="margin: 0 1px 0 0;">&#2547;</label>
										<div id="amount"></div>
										<button class="btn-filter">Filter</button>
										<div id="slider-range"></div>
									</div>
								</div>
							</div> -->
							<!-- End Price -->


							<!-- End Manufacturers -->
						</div>
						<!-- End Filter -->
						<!-- <div class="widget widget-vote">
							<h2 class="widget-title">Sort By</h2>


								<label class="status" for="featured"><input type="checkbox" name="is_featured" value="1" id="new"> Featured</label>
								<label class="status" for="top"><input type="checkbox" name="is_top" value="1" id="used" > Top</label>
								<label class="status" for="premium"><input type="checkbox" name="is_premium" value="1" id="used"> Premium</label>
								<label class="status" for="hot"><input type="checkbox" name="is_hot" value="1" id="used" > Hot</label>



						</div> -->
						<!-- End Vote -->
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
<!--<div class="loader"></div>-->
<!-- End Content -->
<?php
$this->renderPartial("/elements/ad_preview_modal");
?>
<style>

	.loader {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		opacity: 0.9;
		background: url('<?=$baseUrl?>/images/loading1.gif') 50% 50% no-repeat white;
	}



	.button-selected{
		color: red !important;
	}
	.paginations{margin:0;padding:0;}
	.paginations li{
		display: inline;
		padding: 6px 10px 6px 10px;
		border: 1px solid #ddd;
		margin-right: -1px;
		font: 15px/20px Arial, Helvetica, sans-serif;
		background: #FFFFFF;
		box-shadow: inset 1px 1px 5px #F4F4F4;
	}
	.paginations li a{
		text-decoration:none;
		color: #f36d45;

	}
	.paginations li.first {
		border-radius: 5px 0px 0px 5px;
	}
	.paginations li.last {
		border-radius: 0px 5px 5px 0px;
	}
	.paginations li:hover{
		background: #CFF;
	}
	.paginations li.active{
		background: #F0F0F0;
		color: #333;
	}

	.favorite-active {
		color: red !important;
	}

	.favorite {
		color: white;
	}
	.status{
		display: block;
	}
	.location{
		display: block;
	}



</style>


<script>

	$(document).ready(function() {
		var viewType = 'list';
		displayRecords(12, 1,viewType);
	});

	function showAdPreviewModal(ad_id){
		$.ajax({
			type : 'POST',
			url  : SITE_URL+"profile/getAdDetailsForProfile",
			data : {ad_id : ad_id},
			cache: false,
			dataType:"json",
			success : function(response){
				if(response.status=="success"){
					$('.carousel-inner').html(response.ad_image);
					$('.ad_title').html(response.ad_title);
					$('.ad_price').html(response.ad_price);
					//$('.ad_discount').html(response.ad_discount);
					$('.short-info').html(response.ad_short_details);
					$('.description').html(response.ad_details);
					$("#ad_preview_modal").modal("show");
				}
			}
		});
	}


	$('input[type="checkbox"]').on('change',function(){
		changePage(12,1);
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

		var root_node = $(obj).parent().parent().parent();

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
						$(root_node).find('.product-stock .favourite').html(data.favourite);


					} else if((data.status == 'un_favorite')) {
						find.removeClass(search_class);
						find.attr('title', "Add as favorite");
						$(root_node).find('.product-stock .favourite').html(data.favourite);

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

	function showAdPreviewModal(ad_id){
		$.ajax({
			type : 'POST',
			url  : SITE_URL+"profile/getAdDetailsForProfile",
			data : {ad_id : ad_id},
			cache: false,
			dataType:"json",
			success : function(response){
				if(response.status=="success"){
					$('.carousel-inner').html(response.ad_image);
					$('.ad_title').html(response.ad_title);
					$('.ad_price').html(response.ad_price);
					//$('.ad_discount').html(response.ad_discount);
					$('.short-info').html(response.ad_short_details);
					$('.description').html(response.ad_details);
					$("#ad_preview_modal").modal("show");
				}
			}
		});
	}


	function place_value(business_type){
		 jQuery('#business_type').val(business_type);
		 var viewType = $('#view_type').val();
		 displayRecords(12,1,viewType);

	}


	function changePage(numRecords,pageNum){

		var viewType = $('#view_type').val();
		var body = $("html, body");
		body.stop().animate({scrollTop:0}, '500', 'swing', function() {
		});
		displayRecords(numRecords,pageNum,viewType);

	}

	function displayRecords(numRecords,pageNum,viewType) {
		var condition_value = [];
		$.each($("input[name='condition']:checked"), function(){
			condition_value.push($(this).val());
		});

		var business_type = $("#business_type").val();
		var country_code = $("#country_code").val();
		var location_value = [];
		$.each($("input[name='locations']:checked"), function(){
			location_value.push($(this).val());
		});


		var is_featured  = $('input[name="is_featured"]:checked').val();
		var is_premium  = $('input[name="is_premium"]:checked').val();
		var is_top  = $('input[name="is_top"]:checked').val();
		var is_hot  = $('input[name="is_hot"]:checked').val();



		var category_slug = getParameterByName('category_slug');
		var sub_category_slug = getParameterByName('sub_category_slug');

		var maximum_price = $('#maximum_price').val();
		var minimum_price = $('#minimum_price').val();
		var location = '<?=$location?>';



		$.ajax({
			type: "GET",
			url: SITE_URL + "category/ListAdUsingAjax",
			data: {category_slug:category_slug,sub_category_slug:sub_category_slug,show:numRecords,pagenum:pageNum,view:viewType,condition:condition_value,maximum_price:maximum_price,minimum_price:minimum_price,is_featured:is_featured,is_premium:is_premium,is_top:is_top,is_hot:is_hot,location:location,locations:location_value,business_type:business_type,country_code:country_code},
			cache: false,
			dataType:"json",
			beforeSend: function() {
				$(".loader").fadeIn("slow");

				//$('.loader').html('<img src="'+SITE_URL+'images/ajax-loaders.gif" alt="" width="24" height="24" style="padding-left: 400px; margin-top:10px;" >');
			},
			success: function(data) {
				$(".product-list").html(data.list);
				$(".product-grid").html(data.grid);
				$(".sort-pagi").html(data.html);
				$('.result_display').html(data.ad_result_block);
				$('.personal').html(data.personal);
				$('.business').html(data.business);
				$('.promotion').html(data.promotion);

				//$('.loader').html('');
				setTimeout(function(){
					$(".loader").fadeOut("slow");
				}, 500);
			}
		});
	}

	function getParameterByName(name, url) {
		if (!url) {
			url = window.location.href;
		}
		name = name.replace(/[\[\]]/g, "\\$&");
		var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
			results = regex.exec(url);
		if (!results) return null;
		if (!results[2]) return '';
		return decodeURIComponent(results[2].replace(/\+/g, " "));
	}


	function changeDisplayRowCount(numRecords) {
		var viewType = $('#view_type').val();
		displayRecords(numRecords,1,viewType);
	}



	$('.button-grid').click(function(){
		$('#view_type').val('grid');
		$(this).addClass("button-active");
		$('.button-list').removeClass("button-active");
		$('.products-list').css('display','none');
		$('.products-grid').css('display','block');
	});

	$('.button-list').click(function(){
		$('#view_type').val('list');
		$(this).addClass("button-active");
		$('.button-grid').removeClass("button-active");
		$('.products-list').css('display','block');
		$('.products-grid').css('display','none');
	});

	function redirectToProduct(id,ad_type){
		var country_code = $('#country_code').val();
		if(country_code != ''){
			window.location = SITE_URL+country_code+'/ad?ad_id='+encodeURIComponent(btoa(id))+'&ad_type='+encodeURIComponent(btoa(ad_type));
		} else {
			window.location = SITE_URL+'ad?ad_id='+encodeURIComponent(btoa(id))+'&ad_type='+encodeURIComponent(btoa(ad_type));
		}

	}

	function showSubCategoryAds(sub_category_slug){
		var sub_cat_slug = sub_category_slug;
		$('.level0_415 li a').css({ "color": "#167bcb" });
		var current_element_id = '#' + sub_category_slug;
		$(current_element_id).css({ "color": "#FF0000" });

		loading_html = '<div style="padding:10px 0 20px;" id="content_loading">' +
			'<div id="progress_percent">Loading </div>' +
			'<img src="'+SITE_URL+'images/ajax-loader.gif" alt="loading ... " />' +
			'</div>';

		$('#loader').html(loading_html);

		$.ajax({
			type: 'POST',
			async: false,
			url: SITE_URL + "category/GetSubCategoryAds",
			data: {sub_category_slug: sub_cat_slug},
			cache: false,
			dataType: "json",
			beforeSend: function(){
				$("#loader").html('<div style="padding:10px 0 20px;" id="content_loading">' +
					'<div id="progress_percent">Loading..... </div>' +
					'<img src="'+SITE_URL+'images/ajax-loader.gif" alt="loading ... " />' +
					'</div>');
			},
			success: function (response){
				if(response.status === "true"){
					$(".products-grid").html(response.list);
					$(".products-list").html(response.grid);

				}
				else if(response.status === "false"){
					console.log('Ajax Error');
				}

				$("#loader").hide();
			}

		});

	}


	if($('.range-filter').length > 0){

		var minimum_price = $('#minimum').val();
		var maximum = $('#maximum').val();


		$( ".range-filter #slider-range" ).slider({
			range: true,
			min: parseInt(minimum_price),
			max: parseInt(maximum),
			values: [  parseInt(minimum_price), parseInt(maximum) ],
			slide: function( event, ui ) {
				$( "#amount" ).html( "<span>" + ui.values[ 0 ] + "</span>" + " - " + "<span>" + ui.values[ 1 ] + "</span>" );
			var selected_price_minimum = ui.values[ 0 ];
			var selected_price_maximum = ui.values[ 1 ];
			$( "#minimum_price" ).val(selected_price_minimum);
			$( "#maximum_price" ).val(selected_price_maximum);
			var viewType = $('#view_type').val();
			displayRecords(12,1,viewType);
			}
		});
		$( ".range-filter #amount" ).html( "<span>" + $( "#slider-range" ).slider( "values", 0 )+ "</span>" + " - " + "<span>" + $( "#slider-range" ).slider( "values", 1 ) + "</span>" );
	}

	$("input:checkbox").on('click', function() {
		// in the handler, 'this' refers to the box clicked on
		var $box = $(this);
		if ($box.is(":checked")) {
			// the name of the box is retrieved using the .attr() method
			// as it is assumed and expected to be immutable
			var group = "input:checkbox[name='" + $box.attr("name") + "']";
			// the checked state of the group/box on the other hand will change
			// and the current value is retrieved using .prop() method
			$(group).prop("checked", false);
			$box.prop("checked", true);
		} else {
			$box.prop("checked", false);
		}
	});

</script>




<script type="text/javascript">
	function focusMe(button) {
		var elem = document.getElementsByClassName("button-selected")[0];
		// if element having class `"button-selected"` defined, do stuff
		if (elem) {
			elem.className = "";
		}
		button.className = "button-selected";
	}
</script>

<script>
	$(".location_hidden").hide();
	$(document).ready(function(){
		$("#expand_states").click(function(){
			$(".location_hidden").toggle("slow");
			$(this).toggleClass("btn-danger");
			var $el = $(this), textNode = this.lastChild;
			$el.find(".fa").toggleClass('fa-plus-square fa-minus-square');
			textNode.nodeValue = ($el.hasClass('collapsed') ? ' Less' : ' More');
			$el.toggleClass('collapsed');
		});
	});
</script>


