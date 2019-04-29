<?php $baseUrl = Yii::app()->request->baseUrl;?>
<input id="view_type" type="hidden" name="view_type" value="list">


<div id="content" style="margin-bottom: 30px;">
	<div class="content-shop left-sidebar">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-8 col-xs-12 main-content">
					<div class="main-content-shop">
						<div class="banner-shop-slider">
							<div class="wrap-item">

								<?php
								if(isset($profile_page_slider_ads) && !empty($profile_page_slider_ads)){
								$profile_page_slider_ads_opt = array(
									'w' => '870',
									'h' => '270',
									'g' => 'center',
									'r' => '0'
								);
								foreach($profile_page_slider_ads as $profile_page_slider){
								$image_name = $profile_page_slider['banner_image'];
								?>




								<div class="item">
									<div class="item-shop-slider">
										<div class="shop-slider-thumb">
											<a href="#"><img src="<?php echo ImageHelper::cloudinary($image_name,$profile_page_slider_ads_opt)?>" alt="" /></a>
										</div>

									</div>
								</div>
								<!-- End Item -->
								<?php  }}

								?>
								<!-- End Item -->
							</div>
						</div>
						<!-- End Banner Slider -->

						<!-- End List Shop Cat -->
						<div class="shop-tab-product">
							<div class="shop-tab-title">

								<div class="radio"></div>
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
											<a href="#"><img src="images/grid/sl1.jpg" alt="" /></a>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="item-widget-adv">
										<div class="adv-widget-thumb">
											<a href="#"><img src="images/grid/sl2.jpg" alt="" /></a>
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

					<div class="right-sidebar fav-right-sidebar">
						<div class="favorites-list-holder">
							<div class="shade-top-bg"></div>
							<div class="fav-middle-bg">
								<br>
								<h3 style="text-align: justify">
									Send me My Favorites
								</h3>
								<div class="favorites-content no_border">
									<div class="favorite-list-bottom">
										<form class="form-vertical" id="favorite_form" action="javascript:void(0);" method="post">                    <fieldset>
												<div class="flipkey-label-box">
													<label></label>
													<div class="flipkey-input input-holder">
														<input value="" placeholder="Full Name" class="favorite-email" id="favorite_user_name" type="text" required="required">
													</div>
												</div>

												<div class="flipkey-label-box">
													<label> <span class="star-red"></span></label>
													<div class="flipkey-input input-holder">
														<input value="" placeholder="Email Address" class="favorite-email" id="favorite_user_email" required="required" type="email">
													</div>
												</div>

												<div class="flipkey-label-box">
													<label class="flip-message"></label>
													<div class="flipkey-input-textarea">
														<textarea rows="5" cols="30" id="favorite_massage" placeholder="Message" class="flipkey-textarea message-textarea"></textarea>
														<div class="count_msg"></div>
														<div class="exceeded_msg"></div>
													</div>
												</div>

												<div class="js_favorite_massage favorite-massage alert-warning"></div>
												<div class="favorite-send-controller">
                                        <span style="display: none; padding-left: 10px; width: 50px; float: left;" id="favorite-send-loading">
                                            <img alt="Loading..." src="/images/loader.gif">
                                        </span>
												</div>
												<br>
												<div class="success_message"></div>
												<input class="favorite-send fav_button-style" id="favorite-send" value="Send" type="button">


											</fieldset>
										</form>                </div>

								</div>
							</div>
							<div class="shade-bottom-bg"></div>
						</div>
					</div>
					<!-- End Sidebar Shop -->
				</div>
			</div>
		</div>
	</div>
</div>



<?php /*echo $this->renderPartial('../elements/_search_form'); */?>

<!--<input id="view_type" type="hidden" name="view_type" value="list">
<div class="row">
	<div class="col-sm-9 col-sm-push-3">
		<div class="category-description std">
			<div class="slider-items-products">
				<div id="category-desc-slider" class="product-flexslider hidden-buttons">
					<div class="slider-items slider-width-col1 owl-carousel owl-theme">
						<?php
/*						if(isset($profile_page_slider_ads) && !empty($profile_page_slider_ads)){
							$profile_page_slider_ads_opt = array(
								'w' => '870',
								'h' => '270',
								'g' => 'center',
								'r' => '0'
							);
							foreach($profile_page_slider_ads as $profile_page_slider){
								$image_name = $profile_page_slider['banner_image'];
								*/?>

								<div class="item"> <a href="javascript:void(0);"><img alt="" src="<?php /*echo ImageHelper::cloudinary($image_name,$profile_page_slider_ads_opt)*/?>"></a></div>

							<?php /* }}

						*/?>

					</div>
				</div>
			</div>
		</div>
		<article class="col-main">
			<h2 class="page-heading">
				<span class="page-heading-title">
					<?php /*echo CHtml::encode('Recently Viewed Ad') */?>
				</span>
			</h2>
			<div class="display-product-option">

				<div class="sorter">
					<div class="view-mode">
						<span title="Grid" class="button-grid">&nbsp;</span>
						<span title="List" class="button-active button-list">&nbsp;</span>
					</div>
				</div>
			</div>

			<div class="loader"></div>
			<div class="category-products">


			</div>

		</article>
	</div>
	<div class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">

			<div class="right-sidebar fav-right-sidebar">
				<div class="favorites-list-holder">
					<div class="shade-top-bg"></div>
					<div class="fav-middle-bg">
						<br>
						<h3 style="text-align: justify">
							Send me My Favorites
						</h3>
						<div class="favorites-content no_border">
							<div class="favorite-list-bottom">
								<form class="form-vertical" id="favorite_form" action="javascript:void(0);" method="post">                    <fieldset>
										<div class="flipkey-label-box">
											<label>Name</label>
											<div class="flipkey-input input-holder">
												<input value="" placeholder="Full Name" class="favorite-email" id="favorite_user_name" type="text" required="required">
											</div>
										</div>

										<div class="flipkey-label-box">
											<label>Email <span class="star-red">*</span></label>
											<div class="flipkey-input input-holder">
												<input value="" placeholder="Email Address" class="favorite-email" id="favorite_user_email" required="required" type="email">
											</div>
										</div>

										<div class="flipkey-label-box">
											<label class="flip-message">Your Message</label>
											<div class="flipkey-input-textarea">
												<textarea rows="5" cols="30" id="favorite_massage" placeholder="Message" class="flipkey-textarea message-textarea"></textarea>
												<div class="count_msg"></div>
												<div class="exceeded_msg"></div>
											</div>
										</div>

										<div class="js_favorite_massage favorite-massage alert-warning"></div>
										<div class="favorite-send-controller">
                                        <span style="display: none; padding-left: 10px; width: 50px; float: left;" id="favorite-send-loading">
                                            <img alt="Loading..." src="/images/loader.gif">
                                        </span>
										</div>
										<br>
										<div class="success_message"></div>
										<input class="favorite-send fav_button-style" id="favorite-send" value="Send" type="button">


									</fieldset>
								</form>                </div>

						</div>
					</div>
					<div class="shade-bottom-bg"></div>
				</div>
			</div>
	</div>
</div>
</div>

</section>-->
<!--<div class="loader"></div>-->
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

	.right-sidebar .favorites-content .form-vertical .favorite-send {
		background-color: #fe9c00;
		border: medium none;
		box-shadow: none;
		color: #fff;
		float: right;
		line-height: 36px;
		width: 150px;
	}
	.right-sidebar .favorites-content .form-vertical .favorite-send:hover {
		color: #8d8d8d;
		background-color: #fff;
	}
	.right-sidebar .favorites-list-holder {
		margin-bottom: 6%;
	}
	.right-sidebar .fav-middle-bg {
		background-color: #f9bc02;
		box-shadow: 0 0 5px #d1d1d1;
		color: #0e1110;
		margin-top: 0;
	}
	.right-sidebar .favorites-content {
		border: 0 solid #b7b2b2;
		border-radius: 1px;
		margin: 3%;
	}
	.right-sidebar .fav-middle-bg h3 {
		background-color: #fe9c00;
		color: #fff;
		padding: 8px 0 8px 3%;
	}
	/****************************************************/

	table {
		*border-collapse: collapse; /* IE7 and lower */
		border-spacing: 0;
		width: 100%;
	}

	.bordered {
		border: solid #ccc 1px;
		-webkit-box-shadow: 0 1px 1px #ccc;
		-moz-box-shadow: 0 1px 1px #ccc;
		box-shadow: 0 1px 1px #ccc;
	}

	.bordered td, .bordered th {
		padding: 10px;
		border-bottom: 1px solid #f2f2f2;
	}

	.bordered th {
		background-color: #eee;
		border-top: none;
	}

	.bordered tbody tr:nth-child(even) {
		background: #f5f5f5;
		border:1px solid #000;

	}

	.bordered tbody tr:hover td {
		background: #d0dafd;
		color: #339;
	}







	.linksss{border:1px solid #000; padding:5px; text-decoration:none;color:#000;}
	.linksss:hover{text-decoration:underline;color:#fff; background:#6D37B0;}
	.selecteddd{border:1px solid #000; padding:5px; text-decoration:none;color:#fff; background:#6D37B0;}
	/****************************************************/

	.favorite-active {
		color: red !important;
	}
	.favorite {
		color: white;
	}

	/**************************************************************************/



	ul.favorite_filter li{
		color: #0079CA;
		display: block;
		position: relative;
		float: left;
		height: 100px;
	}

	ul.favorite_filter li input[type=radio]{
		position: absolute;
		visibility: hidden;
	}

	ul.favorite_filter li label{
		display: block;
		position: relative;
		font-weight: 300;
		font-size: 1.35em;
		line-height: 12px;
		padding: 25px 25px 25px 80px;
		margin: 10px auto;
		height: 30px;
		z-index: 9;
		cursor: pointer;
		-webkit-transition: all 0.25s linear;
	}

	ul.favorite_filter li:hover label{
		color: #FF0000;
	}

	ul.favorite_filter li .check{
		display: block;
		position: absolute;
		border: 5px solid #0079CA;
		border-radius: 100%;
		height: 25px;
		width: 25px;
		top: 30px;
		left: 20px;
		z-index: 5;
		transition: border .25s linear;
		-webkit-transition: border .25s linear;
	}

	ul.favorite_filter li:hover .check {
		border: 5px solid #E25B60;
	}

	ul.favorite_filter li .check::before {
		display: block;
		position: absolute;
		content: '';
		border-radius: 100%;
		height: 13px;
		width: 13px;
		top: 1px;
		left: 1px;
		margin: auto;
		transition: background 0.25s linear;
		-webkit-transition: background 0.25s linear;
	}

	.favorite_filter input[type=radio]:checked ~ .check {
		border: 5px solid #E25B60;
	}

	.favorite_filter input[type=radio]:checked ~ .check::before{
		background: #E25B60;
	}

	.favorite_filter input[type=radio]:checked ~ label{
		color: #E25B60;
	}

	.signature {
		position: fixed;
		margin: auto;
		bottom: 0;
		top: auto;
		width: 100%;
	}

	.signature p{
		text-align: center;
		font-family: Helvetica, Arial, Sans-Serif;
		font-size: 0.85em;
		color: #AAAAAA;
	}

	.signature .much-heart{
		display: inline-block;
		position: relative;
		margin: 0 4px;
		height: 10px;
		width: 10px;
		background: #0079CA;
		border-radius: 4px;
		-ms-transform: rotate(45deg);
		-webkit-transform: rotate(45deg);
		transform: rotate(45deg);
	}

	.signature .much-heart::before,
	.signature .much-heart::after {
		display: block;
		content: '';
		position: absolute;
		margin: auto;
		height: 10px;
		width: 10px;
		border-radius: 5px;
		background: #0079CA;
		top: -4px;
	}

	.signature .much-heart::after {
		bottom: 0;
		top: auto;
		left: -4px;
	}

	.signature a {
		color: #AAAAAA;
		text-decoration: none;
		font-weight: bold;
	}
	/* Pagination style */
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
		color: rgb(89, 141, 235);
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

</style>




<script>

	$(document).on('click','#favorite-send',function(){

		var userName,sendToEmail,massage = '',newsletter = 0,emailReg;
		userName = $("#favorite_user_name").val();
		sendToEmail = $.trim($("#favorite_user_email").val());
		massage = $("#favorite_massage").val();

		emailReg = /[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/;
		if(sendToEmail == '') {
			$(".js_favorite_massage").html('Email address can not be left blank.');
			$(".js_favorite_massage").show();
		}
		else if(!emailReg.test(sendToEmail)) {
			$(".js_favorite_massage").html('Please enter valid email address.');
			$(".js_favorite_massage").show();
		}
		else{
			$(".js_favorite_massage").html('');
			$(".js_favorite_massage").hide();
			$('#favorite-send-loading').show();
			$.ajax({
				type:"POST"
				,url:SITE_URL+"site/SendFavoriteToEmail"
				,data:{name:userName,email_to:sendToEmail,massage:massage}
				,dataType: "json"
				,success:function(data){
					if(data.status == 'success'){
						$( '#favorite_form').each(function(){
							this.reset();
						});
						$('#favorite-send-loading').hide();
						$(".js_favorite_massage").html('<p class="alert-success">&nbsp;Email sent successfully.</p>');
						$(".js_favorite_massage").show();
					}
					else if(data.status == 'false'){
						$('#favorite-send-loading').hide();
						$(".js_favorite_massage").html('<p class="alert-success">&nbsp;Please make a favorites list.</p>');
						$(".js_favorite_massage").show();

					}
				}
			});
		}
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
				,beforeSend: function() {
					$('.loader').html('<img src="'+SITE_URL+'images/ajax-loader.gif" alt="" width="24" height="24" style="padding-left: 400px; margin-top:10px;" >');
				}
				, success: function (data) {
					if (data.status == 'favorite') {
						find.addClass(search_class);
						find.attr('title', "Remove from favorite");
						status = 'Like';
						$(root_node).find('.product-stock .favourite').html(data.favourite);


					} else if((data.status == 'un_favorite')) {
						find.removeClass(search_class);
						find.attr('title', "Add as favorite");
						var viewType = $('#view_type').val();
						var numRecords = $('#show').val();
						$(root_node).find('.product-stock .favourite').html(data.favourite);
						displayRecords(numRecords,1,viewType);
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

	function changePage(numRecords,pageNum){
		var viewType = $('#view_type').val();
		displayRecords(numRecords,pageNum,viewType);

	}

	function displayRecords(numRecords,pageNum,viewType,filter_value = 3) {
		var category_slug = getParameterByName('category_slug'); // "lorem"
		var sub_category_slug = getParameterByName('sub_category_slug'); // "lorem"
		if(typeof numRecords == 'undefined') {
			numRecords = 12;
		}
		$.ajax({
			type: "GET",
			url: SITE_URL + "category/ListFavoriteAdUsingAjax",
			data: {show:numRecords,pagenum:pageNum,view:viewType,filter_value:filter_value},
			cache: false,
			dataType:"json",
			beforeSend: function() {
				$(".loader").fadeIn("slow");
			},
			success: function(data) {
				$(".product-list").html(data.list);
				$(".product-grid").html(data.grid);
				$(".sort-pagi").html(data.html);
				$('.result_display').html(data.ad_result_block);
				$('.radio').html(data.filter_block);

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


	function changeDisplayRowCount(numRecords,filter_value = 3) {
		var viewType = $('#view_type').val();
		displayRecords(numRecords,1,viewType,filter_value);
	}

	function changeFilterValue(filter_value) {
		var numRecords = $('#show').val();
		changeDisplayRowCount(numRecords,filter_value);
	}

	$(document).ready(function() {
		var viewType = 'list';
		displayRecords(12, 1,viewType);
	});


	$('.childDiv').click(function() {
		$(this).parent().find('.level0_415').toggle();

	});

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
		window.location = SITE_URL+'ad?ad_id='+encodeURIComponent(btoa(id))+'&ad_type='+encodeURIComponent(btoa(ad_type));
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
					$(".products-grid").html(response.html);
					$(".products-list").html(response.html2);

				}
				else if(response.status === "false"){
					console.log('Ajax Error');
				}

				$("#loader").hide();
			}

		});

	}

</script>
