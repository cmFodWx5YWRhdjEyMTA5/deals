<?php


$user_token = Yii::app()->request->cookies['user_token'];
$all_category = Generic::getAllCategory();
//Generic::_setTrace($all_category);
$cs = Yii::app()->getClientScript();
$baseUrl = Yii::app()->request->getBaseUrl(true);
$cs->registerCssFile($baseUrl."/css/jQueryTab.css","screen");
$cs->registerCssFile($baseUrl."/css/animation.css","screen");
?>

	<!-- signup-page -->
	<section id="main" class="clearfix user-page">
		<div class="container">
			<div class="row text-center">
				<!-- user-login -->			
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account">
						<h2>Create a Account</h2>
						<div class="tabs-7">
						<ul class="tabs">
							<li><a href="#tab1">Personal Registration</a></li>
							<li><a href="#tab2">Business Registration</a></li>
						</ul>
							<section class="tab_content_wrapper" style="height: 750px">
								<article class="tab_content" id="tab1">
									<div id="personal" class="">
										<form action="javascript:void(0);" id="register-form-personal" method="post">
											<input type="hidden" name="register_type" value="personal">

											<input type="hidden" id="user_token" value="<?php echo $user_token?>" name="user_token">
											<div class="form-group">
												<input type="text" id="user_name" class="form-control" placeholder="Full Name" name="user_name">
											</div>
											<div class="form-group">
												<input type="email" id="register_user_email" class="form-control" name="email" placeholder="Email Id">
											</div>
											<div class="form-group">
												<input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="Phone Number">
											</div>
											<div class="form-group"  onload="resetSelection()">
												<select class="form-control countrySelectPersonal" id="countrySelect" name="division" size="1" onchange="makeSubmenu(this.value)">
													<option value="Select Your Division">Select Your Division</option>
													<option value="Dhaka">Dhaka</option>
													<option value="Khulna">Khulna</option>
													<option value="Rajshahi">Rajshahi</option>
													<option value="Chittagong">Chittagong</option>
													<option value="Barisal">Barisal</option>
													<option value="Sylhet">Sylhet</option>
													<option value="Rangpur">Rangpur</option>
												</select>
											</div>
											<div id="district" class="form-group citySelectPersonal" style="display: none">
												<select class="form-control " id="citySelect" name="district" size="1">
													<option></option>
												</select>

											</div>
											<div class="form-group">
												<textarea class="form-control" id="address" rows="4" placeholder="Address" name="address"></textarea>
											</div>
											<div class="form-group">
												<input type="password" id="register_user_password" name="password" class="form-control" placeholder="Password">
											</div>

											<div align="left" id="register_status"></div>
											<div class="checkbox">
												<label class="pull-left checked" for="signing"><input type="checkbox" name="signing" id="signing"> By signing up for an account you agree to our Terms and Conditions </label>
											</div><!-- checkbox -->
											<button type="submit" id="register_button" class="btn">Registration</button>
										</form>
									</div>
								</article>
								<article class="tab_content" id="tab2">
									<div id="business" class="">
										<form action="javascript:void(0);" id="register-form-business" method="post">
											<input type="hidden" name="register_type" value="business">

											<input type="hidden" id="user_token" value="<?php echo $user_token?>" name="user_token">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Full Name" id="business_user_name" name="user_name">
											</div>
											<div class="form-group">
												<input type="email" class="form-control" placeholder="Email Id" name="email" id="business_email">
											</div>
											<div class="form-group">
												<input type="radio" class="select_category_type" name="category_type" id="category_type_business" checked value="1" style="height: auto">
												<label for="category_type_business" style="float:none; display: inline">Business</label>
												<input type="radio" class="select_category_type" name="category_type" id="category_type_service" value="2" style="height: auto">
												<label for="category_type_service" style="float:none; display: inline">Service</label>
											</div>
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Enterprise Name" name="enterprise_name" id="enterprise_name">
											</div>
											<div class="form-group">
												<select class="form-control" name="business_category_id" id="business_category">

												</select>
											</div>
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Mobile Number" id="business_phone_number" name="phone_number">
											</div>
											<div class="form-group"  onload="resetSelectionBusiness()">
												<select class="form-control divisionSelectBusiness" id="countrySelectBusiness" name="division" size="1" onchange="makeSubmenuBusiness(this.value)">
													<option value="Select Your Division">Select Your Division</option>
													<option value="Dhaka">Dhaka</option>
													<option value="Khulna">Khulna</option>
													<option value="Rajshahi">Rajshahi</option>
													<option value="Chittagong">Chittagong</option>
													<option value="Barisal">Barisal</option>
													<option value="Sylhet">Sylhet</option>
													<option value="Rangpur">Rangpur</option>
												</select>
											</div>
											<div id="district" class="form-group districtClassBusiness" style="display: none;">
												<select class="form-control" id="citySelectBusiness" name="district" size="1">
													<option></option>
												</select>

											</div>
											<div class="form-group">
												<textarea class="form-control" rows="5" placeholder="Address" id="business_address" name="address"></textarea>
											</div>
											<div class="form-group">
												<input type="password" class="form-control" placeholder="Password" id="register_business_password" name="password">
											</div>
											<div align="left" id="register_status_business"></div>
											<div class="checkbox">
												<label class="pull-left checked" for="signing"><input type="checkbox" name="signing" id="signing"> By signing up for an account you agree to our Terms and Conditions </label>
											</div><!-- checkbox -->
											<button type="submit" id="register_form_business" class="btn">Registration</button>
										</form>
									</div>
								</article>
								<div style="clear: both"></div>
							</section>

						</div>
						<!-- checkbox -->
										
					</div>
				</div><!-- user-login -->			
			</div><!-- row -->	
		</div><!-- container -->
	</section><!-- signup-page -->

	<style>

	section{
			min-width: 100%;
			padding: 1px 0;
			width: auto;
		}


		.info { border: 1px solid #999; padding:0px 60px; font: bold 12px verdana;-moz-box-shadow: 0 0 5px #888; -webkit-box-shadow: 0 0 5px#888;box-shadow: 0 0 5px #888;text-shadow: 2px 2px 2px #ccc;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;font-family:Verdana, Geneva, sans-serif; font-size:11px; line-height:20px;font-weight:normal;color: black;background: #BDE5F8;}
		.info-business { border: 1px solid #999; padding:0px 60px; font: bold 12px verdana;-moz-box-shadow: 0 0 5px #888; -webkit-box-shadow: 0 0 5px#888;box-shadow: 0 0 5px #888;text-shadow: 2px 2px 2px #ccc;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;font-family:Verdana, Geneva, sans-serif; font-size:11px; line-height:20px;font-weight:normal;color: black;background: #BDE5F8;} { border: 1px solid #999; padding:12px 20px 12px 20px; font: bold 12px verdana;-moz-box-shadow: 0 0 5px #888; -webkit-box-shadow: 0 0 5px#888;box-shadow: 0 0 5px #888;text-shadow: 2px 2px 2px #ccc;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;font-family:Verdana, Geneva, sans-serif; font-size:11px; line-height:20px;font-weight:normal;color: black;background: #BDE5F8;}
		fieldset {
			overflow: hidden
		}

		.some-class {
			float: right;
			clear: none;
		}

		label {
			float: right;
			clear: none;
			display: block;

		}


		.none {
			display:none;
		}


	</style>

	<script type="text/javascript">

		$(function() {
			$('.divisionSelectBusiness').change(function(){
				$('.districtClassBusiness').show();

			});
		});

		$(function() {
			$('.countrySelectPersonal').change(function(){
				$('.citySelectPersonal').show();

			});
		});

		var citiesByState = {
			Dhaka: ["Dhaka","Faridpur","Gazipur","Gopalganj","Jamalpur","Kishoreganj","Madaripur",
				"Manikganj","Munshiganj","Mymensingh","Narayanganj","Narsingdi","Netrakona","Rajbari",
				"Shariatpur","Sherpur","Tangail"],
			Khulna: ["Bagerhat","Chuadanga","Jessore","Jhenaidah","Khulna","Kushtia","Magura","Meherpur",
				"Narail","Satkhira"],
			Rajshahi: ["Bogra","Joypurhat","Naogaon","Natore","Nawabganj","Pabna","Rajshahi",
				"Sirajganj"],
			Chittagong: ["Bandarban","Brahmanbaria","Chandpur","Chittagong","Comilla","Cox's Bazar","Feni"
				,"Khagrachhari","Lakshmipur","Noakhali","Rangamati"],
			Barisal: ["Barguna","Barisal","Bhola","Jhalokati","Patuakhali","Pirojpur"],
			Sylhet: ["Habiganj","Moulvibazar","Sunamganj","Sylhet"],
			Rangpur: ["Dinajpur","Gaibandha","Kurigram","Lalmonirhat","Nilphamari","Panchagarh","Rangpur",
				"Thakurgaon"]
		}
		function makeSubmenu(value) {
			if(value.length==0) document.getElementById("citySelect").innerHTML = "<option></option>";
			else {
				var citiesOptions = "";
				for(cityId in citiesByState[value]) {
					citiesOptions+="<option>"+citiesByState[value][cityId]+"</option>";
					var div = document.getElementById("district");
					div.style.visibility='block';
				}

				document.getElementById("citySelect").innerHTML = citiesOptions;
			}
			elem_height  = $('.tab_content').outerHeight();
			$('.tab_content_wrapper').outerHeight(elem_height + 80);
		}
		function makeSubmenuBusiness(value) {
			if(value.length==0) document.getElementById("citySelectBusiness").innerHTML = "<option></option>";
			else {
				var citiesOptions = "";
				for(cityId in citiesByState[value]) {
					citiesOptions+="<option>"+citiesByState[value][cityId]+"</option>";
					var div = document.getElementById("district");
					div.style.visibility='block';
				}

				document.getElementById("citySelectBusiness").innerHTML = citiesOptions;
			}
			elem_height  = $('.tab_content').outerHeight();
			$('.tab_content_wrapper').outerHeight(elem_height + 350);
		}
		function displaySelected() {
			var country = document.getElementById("countrySelect").value;
			var city = document.getElementById("citySelect").value;
			alert(country+"\n"+city);
		}
		function displaySelectedBusiness() {
			var country = document.getElementById("countrySelectBusiness").value;
			var city = document.getElementById("citySelectBusiness").value;
			alert(country+"\n"+city);
		}
		function resetSelection() {
			document.getElementById("countrySelect").selectedIndex = 1;
			document.getElementById("citySelect").selectedIndex = 1;
		}
		function resetSelectionBusiness() {
			document.getElementById("countrySelectBusiness").selectedIndex = 0;
			document.getElementById("citySelectBusiness").selectedIndex = 0;
		}
	</script>
<script type="text/javascript">
	// initializing jQueryTab plugin
	$('.tabs-1').jQueryTab({
		initialTab:2,				// tab to open initially; start count at 1 not 0
		tabInTransition: 'fadeIn',
		tabOutTransition: 'scaleUpOut',
		cookieName: 'active-tab-1',
		tabPosition : 'bottom'
	});
	$('.tabs-2').jQueryTab({
		initialTab: 3,
		openOnhover: true,
		tabInTransition: 'flipIn',
		tabOutTransition: 'flipOut',
		cookieName: 'active-tab-2'

	});
	$('.tabs-3').jQueryTab({
		responsive:false,
		useCookie: false,
		initialTab: 1,
		tabInTransition: 'rotateIn',
		tabOutTransition: 'rotateOut',
		before: function(){ console.log('Hello from before!'); },			// function to call before tab is opened
		after: function(){ console.log('Hello from after!') }				// function to call after tab is opened

	});
	$('.tabs-4').jQueryTab({
		openOnhover: true,
		collapsible:false,
		initialTab: 4,
		tabInTransition: 'slideUpIn',
		tabOutTransition: 'slideUpOut',
		cookieName: 'active-tab-4'

	});
	$('.tabs-5').jQueryTab({
		initialTab: 3,
		tabInTransition: 'slideRightIn',
		tabOutTransition: 'slideRightOut',
		cookieName: 'active-tab-5'

	});
	$('.tabs-6').jQueryTab({
		initialTab: 4,
		tabInTransition: 'scaleDownIn',
		tabOutTransition: 'scaleDownOut',
		cookieName: 'active-tab-6'

	});
	$('.tabs-7').jQueryTab({
		initialTab: 1,
		tabInTransition: 'flipIn',
		tabOutTransition: 'flipOut',
		cookieName: 'active-tab-7'

	});


</script>

<script>
	$(document).ready(function(){
		var category_type_value = $('input[name="category_type"]:checked').val();
		getCategoryListings(category_type_value);
	});
	$('.select_category_type').on('change',function(){
		var category_type_value = $(this).val();
		getCategoryListings(category_type_value);
	});

	function getCategoryListings(category_type_value){
		$.ajax({
			type : 'POST',
			url  : SITE_URL+"site/getCategory",
			data : {category_type:category_type_value},
			cache: false,
			dataType:"json",
			success : function(response){
				if(response.status=="success"){
					$('#business_category').html(response.result);
				}
			}
		});
	}
</script>

