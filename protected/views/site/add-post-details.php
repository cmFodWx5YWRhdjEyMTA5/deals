<?php
$baseUrl = Yii::app()->request->baseUrl;
$price_config = Yii::app()->params['priceSettings'];
$featured_price = $price_config['featured']['amount'];
$premium_price = $price_config['premium']['amount'];
$top_price = $price_config['top']['amount'];
$category_list = Generic::getAllCategory();
?>
<script language="javascript" type="text/javascript" src="<?php Yii::app()->getBaseUrl(true)?>/js/tinymce/tinymce.js"></script>
<script language="javascript" type="text/javascript">
	tinyMCE.init({
		theme : "modern",
		mode: "exact",
		elements : "ad_description",
		theme_advanced_toolbar_location : "top",
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,"
		+ "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
		+ "bullist,numlist,outdent,indent",
		theme_advanced_buttons2 : "link,unlink,anchor,image,separator,"
		+"undo,redo,cleanup,code,separator,sub,sup,charmap",
		theme_advanced_buttons3 : "",
		height:"350px",
		width:"auto"
	});
</script>

<!-- main -->
<section id="main" class="clearfix ad-details-page">
	<div class="container">

		<div class="breadcrumb-section">
			<!-- breadcrumb -->
			<ol class="breadcrumb">
				<li><a href="<?=$baseUrl?>">Home</a></li>
				<li>Ad Post</li>
			</ol><!-- breadcrumb -->

		</div><!-- banner -->

		<div class="adpost-details">
			<div class="row">
				<div class="col-md-8">

					<?php
					$form=$this->beginWidget('CActiveForm', array(
						'id'=>'ad-form',
						'enableAjaxValidation'=>false,
						'action'=>'javascript:void(0)',
						'enableClientValidation'=>false,

					));
					?>
					<fieldset>
						<div class="section postdetails">
							<h4>Sale an item or service <span class="pull-right">* Mandatory Fields</span></h4>
							<!--<div class="form-group selected-product">
										<ul class="select-category list-inline">
											<li>
												<a href="javascript:void(0);">
													<span class="select">
														<img src="images/icon/<?/*=$category_slug*/?>.png" alt="Images" class="img-responsive">
													</span>
													<?/*=$category_name['category_name']*/?>
												</a>
											</li>
											<a href="javascript:void(0);"><?/*=$sub_category_name['category_name']*/?></a>


										</ul>
									</div>-->

							<div class="row form-group add-title" id='select_category'>
								<label class="col-sm-3 label-title">Select Category<span class="required">*</span></label>
								<div class="col-sm-9" >
									<select onchange="getCategoryId()" class="form-control" id="select_category_id">
										<option  value="Select Category">Select Category</option>
										<?php
										$category_name = "";
										$id = 0;
										foreach($category_list as $value){
											if($value['parent_id'] == $id){
												$category_name = $value['category_name'];
												$category_Id = $value['category_id'];
												$category_slug = $value['category_slug'];
												$category_icon = $value['category_icon'];

											}?>

											<option  value="<?=$category_Id?>"><?=$category_name?></option>

										<?php }?>
									</select>
								</div>
							</div>

							<div class="row form-group add-title" id='select_sub_category'>
							</div>

							<div id="error_ad_post"></div>
							<div class="row form-group add-title" id='title'>
								<label class="col-sm-3 label-title">Title for your Ad<span class="required">*</span></label>
								<div class="col-sm-9" >
									<input type="text" name="ads_title" id="ad_title" class="form-control" data-container="body" data-toggle="popover" data-trigger="focus" data-content="Type your ad title here. Example: Sony xperia dual sim brand new">


								</div>
								<div id="message"></div>
							</div>
							<div class="row form-group add-image">
								<label class="col-sm-3 label-title">Photos for your ad <span>(This will be your cover photo )</span> </label>
								<div class="col-sm-9">
									<h5><i class="fa fa-upload" aria-hidden="true"></i>Select Files to Upload.<span>You can add multiple images (Maximum Five).<p>(Preferred size: 960x720 px)</p></span></h5>
									<div class="upload-section">
										<input type="file" name="files[]" id="filer_input2" multiple="multiple">
										<input type="hidden" name="image_file" value="" id="image_file" >
										<!--<input type="file" id="upload-image-one" name="ads_image[]" multiple>-->
									</div>
								</div>
							</div>
							<div class="row form-group item-description" id="description">
								<label class="col-sm-3 label-title">Description<span class="required">*</span></label>
								<div class="col-sm-9">
									<textarea class="form-control" name="ads_description" id="ad_description" placeholder="Write few lines about your ad" rows="8" cols="4" data-container="body" data-toggle="popover" data-trigger="focus" data-content="Type few lines about your ad here. It's important to highlight your ad."></textarea>
								</div>
							</div>
							<div class="row form-group select-condition">
								<label class="col-sm-3">Condition<span class="required">*</span></label>
								<div class="col-sm-9">
									<input type="radio" name="ads_condition" value="1" id="new" class="ad_condition" >
									<label for="new">New</label>
									<input type="radio" name="ads_condition" value="0" id="used" class="ad_condition">
									<label for="used">Used</label>
								</div>
							</div>
							<div class="row form-group select-price">
								<label class="col-sm-3 label-title">Price<span class="required">*</span></label>
								<div class="col-sm-9">
										<input type="radio" onclick="javascript:yesnoCheck();" name="price_type" value="1" id="fixed">
										<label for="fixed">Fixed </label>
										<input type="radio" onclick="javascript:yesnoCheck();" name="price_type" value="0" id="negotiable">
										<label for="negotiable">Negotiable </label>
										<input type="radio" onclick="javascript:yesnoCheck();" name="price_type" value="2" id="range">
										<label for="range">Range </label><br><br>
										<h5 class="col-sm-2" style="margin-top: 10px;"><?=$currency_sign?></h5>
										<input type="text" id="ad_price" name="ads_price" class="form-control col-sm-4" id="text1" data-container="body" data-toggle="popover" data-trigger="focus" data-content="Type your ad price here. Estimate your price for what you're offering. Example: 100." style="margin-left: -9px">
										<div id="ifYes" style="display:none;margin-left: -14px;">
											<input type='text' class="number_input form-control" id='discount' name='discount' value="" placeholder="Set discount (Optional)" data-container="body" data-toggle="popover" data-trigger="focus" data-content="How much % you want to offer? Just type the number. Example: 20" style="width: 34%">
										</div>
										<div id="ifRange" style="display:none;margin-left: -14px;">
											<input type="text" id="ad_price_end" name="ads_price_end" class="form-control col-sm-4" id="text1" placeholder="Type higher limit" data-container="body" data-toggle="popover" data-trigger="focus" data-content="Type higher limit of your ad price here. Applicable only for range of price. Example: 100" style="width: 34%">
										</div>
									<br>
								</div>
							</div>
							<div class="row form-group show-price">
								<label class="col-sm-3 label-title">Show Price</label>
								<div class="col-sm-3">
									<p><input type="checkbox" name="price_show_box" checked="checked" /></p>
									<input type="hidden" id="show_price_option" name="show_price_option" value="1">
								</div>
								
							</div>

							<div id="meta_html"></div>
						</div>
						<!-- section -->

						<!-- section -->

						<!--<div class="section payment_option">
							<h4>Make your Ad Premium </h4>
							<div class="row form-group col-sm-7">
								<div class="row col-sm-12">
									<label class="col-sm-3 label-title">Paid:</label>
									<div class="col-sm-9">
										<label class="switch">
											<input class="cboxes_paid switch-input" rel="<?/*=$featured_price*/?>"  id="cbox2" type="checkbox" name="paid" />
											<input type="hidden" id="is_paid" name="is_paid" value="">
											<span class="switch-label" onmouseover="showFeaturedAdsImage()" data-on="On" data-off="Off"></span>
											<span class="switch-handle"></span>
											<div class="tinybox" style="">
												<img src="<?/*=$baseUrl*/?>/images/featured/featured.png" alt="tinypic2" id="tinypic2" style="display:none;">
											</div>
										</label>
									</div>
								</div>
									<div class="row col-sm-12">
									<label class="col-sm-3 label-title">Premium:</label>
										<div class="col-sm-9">
											<label class="switch">
												<input class="cboxes_premium switch-input" rel="<?/*=$premium_price*/?>" type="checkbox" name="premium" />
												<input type="hidden" id="is_premium" name="is_premium" value="">
												<span class="switch-label" onmouseover="showPremiumAdsImage()" data-on="On" data-off="Off"></span>
												<span class="switch-handle"></span>
												<div class="tinybox" style="">
													<img src="<?/*=$baseUrl*/?>/images/featured/premium.png" alt="tinypic2" id="tinypic2" style="display:none;">
												</div>
											</label>
										</div>
										</div>
										<div class="row col-sm-12">
										<label class="col-sm-3 label-title">Top:</label>
										<div class="col-sm-9">
											<label class="switch">
												<input class="cboxes_top switch-input" rel="<?/*=$top_price*/?>" type="checkbox" name="top" />
												<input type="hidden" id="is_top" name="is_top" value="">
												<input type="hidden" id="show_price_option" name="show_price_option" value="1">
												<span class="switch-label" onmouseover="showTopAdsImage()"  data-on="On" data-off="Off"></span>
												<span class="switch-handle"></span>
												<div class="tinybox" style="">
													<img src="<?/*=$baseUrl*/?>/images/featured/top.png" alt="tinypic2" id="tinypic2" style="display:none;">
												</div>
											</label>
										</div>
									</div>
							</div>
							<div class="image-container col-sm-5"></div>
							<div class="price-container"></div>
							<div style="clear:both"></div>

						</div>--><!-- section -->

						<div class="section seller-info">
							<h4>Saler Information</h4>
							<div class="row form-group">
								<div class="col-sm-9">
									<span><?=$user_name?> </span><br>
									<span>Address : <?=$address?></span><br>
									<span>Phone Number : <?=$phone_number?></span><br>
									<span>Email : <?=$email?></span><br>

								</div>
							</div>

						</div>

						<div class="checkbox section agreement">
							<!--<label for="send">
                                <input type="checkbox" name="send" id="send">
                                Send me bdads24.com Email/SMS Alerts for people looking to buy mobile handsets in www By clicking "Post", you agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and acknowledge that you are the rightful owner of this item and using Trade to find a genuine buyer.
                            </label>-->
							<!--	<br clear="all"><br clear="all">-->
							<div align="left" id="ad_status"></div>
							<!--	<br clear="all"><br clear="all">-->
							<button id="ad_submit" type="button" class="btn btn-theme" style="width: 100%">Post Your Ad</button>
							<div class="modal fade" id="myModal_for_ad_post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" style="width: 400px">
									<div class="modal-content" style="position: relative;">
										<div class="modal-header">
											<div class="row" style="text-align: center">
												<span><b>Do you want to make your ad premium?</b></span>
											</div>
										</div>
										<div class="modal-body" style="text-align: center">
											
											<p><span>If you make your ad premium it will be charged <b>300</b> Tk. Otherwise, it will be post as a free ad.</span></p>
											<input type="button" value="Yes" id="yes" class="btn btn-success" style="border-radius: 0">
											<input type="submit" value="No" id="ad_submit" class="btn btn-danger">
										</div><!-- slider -->
									</div>
								</div>
							</div>
						</div><!-- section -->



					</fieldset>
					<?php $this->endWidget();?>
					<!-- form -->
				</div>

				<div class="modal fade" id="myModal_for_payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width: 400px">
						<div class="modal-content" style="position: relative;">
							<div class="modal-header">
								<h5>Please choose a payment method</h5>
							</div>
							<div class="modal-body" style="text-align: center">
								<div class="inner" style="text-align: left">
									<form action="<?=$baseUrl?>/my-profile/transaction-status" id="payment-confirmation-form" method="post" enctype="multipart/form-data">
										<input type="hidden" id="user_id" class="form-control" name="user_id" value="<?=$user_id?>">
										<div class="payment-row">
											<input type="radio" name="payment" id="credit_card" value="1">
											<label for="credit_card">By Visa/MasterCard</label>
										</div>
										<div class="payment-row" >
											<input name="payment" id="bank_deposit" value="2" type="radio">
											<label for="bank_deposit">By Bank Deposit</label>
<!--											<div class="form-group" id="bank_details_block" style="display: none;border: 1px solid #fe9c00;border-radius: 5px;padding-left: 10px;background: #eeeeee;margin-top: 20px">
												<br>
												<div>
													<label>A/C Name:</label>
													<span>DEWY IT LTD</span>
												</div>
												<div>
													<label>A/C Number:</label>
													<span>2001070143053</span>
												</div>
												<div>
													<label>Bank Name:</label>
													<span>Eastern Bank Ltd, Khulna Br.</span>
												</div>
												                                            <div class="row">
												                                                <label>Bank Routing Number:</label>
												                                                <span>DEWY IT LTD</span>
												                                            </div>
												<div>
													<label>Swift Code:</label>
													<span>EBLDBDDH</span>
												</div>

												<div>
													<br>
													<label style="font-weight: 600;font-size: 15px">Upload your Bank Deposit Copy</label>
													<p><input type="file" name="bank_receipt" id="bank_receipt" /></p>
												</div>
											</div>-->
										</div>
										<div class="payment-row">
											<input type="radio" name="payment" id="marketing_representative" value="3">
											<label for="marketing_representative">By Direct Payment</label>
											<div class="form-group" id="direct_payment_block" style="display: none">
												<br>
												<div class="">
													<input class="form-input" type="text" id="seller_id" name="seller_id" placeholder="Type your saler Id" style="border-radius: 5px;border-color: #FE9C00">
												</div>
												<br>
												<div class="">
													<input class="form-input number_input" type="text" id="advanced_payment" name="advanced_payment" placeholder="Enter deposit amount" style="border-radius: 5px;border-color: #FE9C00">
												</div>
											</div>

										</div><br>
										<input type="checkbox" id="agreeIndividual" name="agree" required checked/> <label for="agreeIndividual" style="font-size: 15px;padding: 15px 0">I agree all the <a href="<?php echo Yii::app()->createUrl('/terms-&-conditions');?>" target="_blank" a>Terms & Conditions</a></label>
										<input type="hidden" name="individual_ad_information" id="individual_ad_information" />
										<div align="left" id="update_name_status"></div>
										<button type="submit" id="individual_ad_confirm"  class="btn btn-small btn-green">Confirm</button>

									</form>


								</div>
							</div><!-- slider -->
						</div>
					</div>
				</div>

				<!-- quick-rules -->
				<div class="col-md-4">
					<div class="section quick-rules">
						<h4>Quick rules</h4>
						<p class="lead">Posting an ad is free! However, all ads must follow our rules:</p>

						<ul>
							<li>Make sure you post in the correct category.</li>
							<li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
							<li>Do not upload pictures with watermarks.</li>
							<li>Do not post ads containing multiple items unless it's a package deal.</li>
							<li>Do not put your email or phone numbers in the title or description.</li>
						</ul>
					</div>
				</div><!-- quick-rules -->
			</div><!-- photos-ad -->
		</div>
	</div><!-- container -->
</section><!-- main -->



<style>
	.info { border: 1px solid #999; padding:12px 20px 12px 20px; font: bold 12px verdana;-moz-box-shadow: 0 0 5px #888; -webkit-box-shadow: 0 0 5px#888;box-shadow: 0 0 5px #888;text-shadow: 2px 2px 2px #ccc;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;font-family:Verdana, Geneva, sans-serif; font-size:11px; line-height:20px;font-weight:normal;color: black;background: #BDE5F8;}
	.jFiler {
		font-family: inherit;
	}
	input[type="file"] {

		display:block;
	}
	.imageThumb {
		max-height: 75px;
		border: 2px solid;
		margin: 10px 10px 0 0;
		padding: 1px;
		display: inline;
	}
	.switch {
		position: relative;
		display: block;
		vertical-align: top;
		width: 100px;
		height: 30px;
		padding: 3px;
		margin: 0 10px 10px 0;
		background: linear-gradient(to bottom, #eeeeee, #FFFFFF 25px);
		background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF 25px);
		border-radius: 18px;
		box-shadow: inset 0 -1px white, inset 0 1px 1px rgba(0, 0, 0, 0.05);
		cursor: pointer;
	}
	.switch-input {
		position: absolute;
		top: 0;
		left: 0;
		opacity: 0;
	}
	.switch-label {
		position: relative;
		display: block;
		height: inherit;
		font-size: 10px;
		text-transform: uppercase;
		background: #eceeef;
		border-radius: inherit;
		box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
	}
	.switch-label:before, .switch-label:after {
		position: absolute;
		top: 50%;
		margin-top: -.5em;
		line-height: 1;
		-webkit-transition: inherit;
		-moz-transition: inherit;
		-o-transition: inherit;
		transition: inherit;
	}
	.switch-label:before {
		content: attr(data-off);
		right: 11px;
		color: #aaaaaa;
		text-shadow: 0 1px rgba(255, 255, 255, 0.5);
	}
	.switch-label:after {
		content: attr(data-on);
		left: 11px;
		color: #FFFFFF;
		text-shadow: 0 1px rgba(0, 0, 0, 0.2);
		opacity: 0;
	}
	.switch-input:checked ~ .switch-label {
		background: #15831b;
		box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
	}
	.switch-input:checked ~ .switch-label:before {
		opacity: 0;
	}
	.switch-input:checked ~ .switch-label:after {
		opacity: 1;
	}
	.switch-handle {
		position: absolute;
		top: 4px;
		left: 4px;
		width: 28px;
		height: 28px;
		background: linear-gradient(to bottom, #FFFFFF 40%, #f0f0f0);
		background-image: -webkit-linear-gradient(top, #FFFFFF 40%, #f0f0f0);
		border-radius: 100%;
		box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
	}
	.switch-handle:before {
		content: "";
		position: absolute;
		top: 50%;
		left: 50%;
		margin: -6px 0 0 -6px;
		width: 12px;
		height: 12px;
		background: linear-gradient(to bottom, #eeeeee, #FFFFFF);
		background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF);
		border-radius: 6px;
		box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
	}
	.switch-input:checked ~ .switch-handle {
		left: 74px;
		box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
	}

	/* Transition
    ========================== */
	.switch-label, .switch-handle {
		transition: All 0.3s ease;
		-webkit-transition: All 0.3s ease;
		-moz-transition: All 0.3s ease;
		-o-transition: All 0.3s ease;
	}
	.payment-row{
		padding-top: 10px;
	}

</style>

<script type="text/javascript">

	function showFeaturedAdsImage(){
		$('.image-container').html('<img src="<?=$baseUrl?>/images/featured/individual.jpg" alt="tinypic2" id="tinypic2" style="display:block;">');
	}


	$(document).ready(function() {
		function recalculate() {
			var sum = 0;

			$(".payment_option input[type=checkbox]:checked").each(function() {
				sum += parseInt($(this).attr("rel"));
			});

			$(".price-container").html('<h3>Cost of this ad: Tk.' +sum+'</h3>');
		}

		$(".payment_option input[type=checkbox]").change(function() {
			recalculate();
		});

		$('.cboxes_paid').change(function() {
			var image = $(this).siblings(".tinybox").find("img");
			if ($(this).prop('checked')) {
				$('#is_paid').val('1');
			}
			else {

				$('#is_paid').val('0');
			}
		});


		customCheckbox("price_show_box");
		customCheckbox("special_offer_show_box");
		$('input[name="price_show_box"]').on('change',function(){
			if($(this).is(':checked')){
				$('#show_price_option').val('1');
			} else {
				$('#show_price_option').val('0');
			}
		});

		$('input[name="special_offer_show_box"]').on('change',function(){
			if($(this).is(':checked')){
				$('#special_offer').val('1');
			} else {
				$('#special_offer').val('0');
			}
		});

		$('#individual_ad_confirm').on('click',function(){
			if($('input[name="payment"]:checked').val()){
				return true;
			} else {
				alert('Please select a payment method');
				return false;
			}
		});
	});

	function customCheckbox(checkboxName){
		var checkBox = $('input[name="'+ checkboxName +'"]');
		$(checkBox).each(function(){
			$(this).wrap( "<span class='custom-checkbox'></span>" );
			if($(this).is(':checked')){
				$(this).parent().addClass("selected");
			}
		});
		$(checkBox).click(function(){
			$(this).parent().toggleClass("selected");
		});
	}

</script>


<script type="text/javascript">

	$('input[id="special_offer_checkbox"]').on('change',function(){
		if($(this).is(':checked')){
			$('#ifRange').hide('slow');
			$('#ifYes').show('slow');
			$("#discount").select();
		} else {
			$('#ifYes').hide('slow');
		}
	});

	function yesnoCheck() {
		if (document.getElementById('fixed').checked || document.getElementById('special_offer_checkbox').checked) {
			document.getElementById('ifYes').style.display = 'block';
			document.getElementById('ifRange').style.display = 'none';
		}
		else {
			document.getElementById('ifYes').style.display = 'none';
			if(document.getElementById('range').checked){
				document.getElementById('ifRange').style.display = 'block';
			}
			else {
				document.getElementById('ifYes').style.display = 'none';
			}
		}


	}

	$(function () {
		$('[data-toggle="popover"]').popover()
	})

	$('.popover-dismiss').popover({
		trigger: 'focus'
	})

	function showHideInputField(){
		var value = $('#sub_category_id').val();

		$.ajax({
			type : 'POST',
			url  : SITE_URL+"site/ShowHideInputField",
			data : {category_id:value},
			cache: false,
			dataType:"json",
			success : function(response){
				if(response.status=="success"){

					$("#meta_html").html(response.html);

				}
			}


		});
	}

	function getCategoryId(){
		var value = $('#select_category_id').val();

		$.ajax({
			type : 'POST',
			url  : SITE_URL+"site/getCategoryIdFromSelect",
			data : {category_id:value},
			cache: false,
			dataType:"json",
			success : function(response){
				if(response.status=="success"){
					$("#select_sub_category").html(response.html);
				}
			}


		});
	}

	$('#ad_submit').on('click', function () {
		//$('#myModal_for_ad_post').modal('show');
		$('#ad-form').submit();
	});

	$('#yes').on('click', function () {
		tinyMCE.triggerSave();
		$('#myModal_for_ad_post').modal('hide');

		var custom_column_number = $('input[name="custom_column_number"]').val();

		var custom_fields = {};
		for(i=1;i<=custom_column_number;i++){
			custom_field_name = 'custom_field_' + i;
			field_name = $('input[name = "'+custom_field_name+'"]').val();
			field_value = $('#'+field_name+'').val();
			custom_fields[i] = { field_name:field_name,field_value:field_value };
		}

		//alert(JSON.stringify(custom_fields));
		var ad_info = {
			ad_title: $("#ad_title").val(),
			ad_description: $("#ad_description").val(),
			ad_condition : $(".ad_condition").val(),
			ad_price : $("#ad_price").val(),
			price_end : $("#ad_price_end").val(),
			price_type : $('input[name="price_type"]').val(),
			discount : $('#discount').val(),
			special_offer : $('#special_offer').val(),
			is_paid : 1, //is paid is 1 as we already in payment page
			category_id : $("#sub_category_id").val(),
			user_id : $("#user_id").val(),
			image_url : $("#image_file").val(),
			show_price_option : $("#show_price_option").val(),
			custom_fields_array : custom_fields
		};
		$('#individual_ad_information').val(JSON.stringify(ad_info));
		$('#myModal_for_payment').modal('show');
	});

	$('#bank_deposit').on('click',function(){
		$('#bank_receipt').attr('required', 'required');
		$('#seller_id').removeAttr('required');
		$('#bank_details_block').show('slow');
		$('#direct_payment_block').hide('slow');
		$('#payment-confirmation-form').prop('action', '/my-profile/transaction-status');
	});
	$('#credit_card').on('click',function(){
		$('#bank_receipt').removeAttr('required');
		$('#seller_id').removeAttr('required');
		$('#bank_details_block').hide('slow');
		$('#direct_payment_block').hide('slow');
		$('#payment-confirmation-form').prop('action', '/my-profile/payment-processor');
	});
	$('#marketing_representative').on('click',function(){
		$('#bank_receipt').removeAttr('required');
		$('#seller_id').attr('required', 'required');
		$('#bank_details_block').hide('slow');
		$('#direct_payment_block').show('slow');
		$('#payment-confirmation-form').prop('action', '/my-profile/transaction-status');
	});

</script>
