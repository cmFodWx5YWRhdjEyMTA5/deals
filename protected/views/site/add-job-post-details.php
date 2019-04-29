<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php
//Generic::_setTrace($all_job_list);

?>
	<!-- main -->
	<section id="main" class="clearfix ad-details-page">
		<div class="container">
		
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="/">Home</a></li>
					<li>Ad Post</li>
				</ol><!-- breadcrumb -->						

			</div><!-- banner -->

			<div class="adpost-details">
				<div class="row">	
					<div class="col-md-8">
						<?php
						$form=$this->beginWidget('CActiveForm', array(
							'id'=>'job-form',
							'enableAjaxValidation'=>false,
							'action'=>'javascript:void(0)',
							'enableClientValidation'=>false,

						));
						?>
							<fieldset>
								<div class="section postdetails">
									<h4>Sell an item or service <span class="pull-right">* Mandatory Fields</span></h4>
									<div class="form-group selected-product">
										<ul class="select-category list-inline">
											<li>
												<a href="javascript:void(0);">
													<span class="select">
														<img src="images/icon/<?=$category_slug?>.png" alt="Images" class="img-responsive">
													</span>
													<?=$category_name['category_name']?>
												</a>
											</li>

												<a href="javascript:void(0);"><?=$sub_category_name['category_name']?></a>


										</ul>
									</div>

									<div class="row form-group add-title" id='title' title="Keep it short but catchy and no pirce or phone number, Example: iPhone 6 Plus 64GB Black Unlocked">
										<label class="col-sm-3 label-title">Job Title <span class="required">*</span></label>
										<div class="col-sm-9" >
											<input type="text" name="ads_title" id="ads_title" class="form-control"  placeholder="Your Job Title">


										</div>
										<div id="message"></div>
									</div>
									<div class="row form-group add-title" id='title' title="Keep it short but catchy and no pirce or phone number, Example: iPhone 6 Plus 64GB Black Unlocked">
										<label class="col-sm-3 label-title">Job Category <span class="required">*</span></label>
										<div class="col-sm-9" >
										<select class="form-control" name="business_category" id="business_category">
											<?php
											foreach($all_job_list as $job){?>
												<option value="<?= $job ?>"><?=$job?></option>
											<?php }?>


										</select>
											</div>
									</div>
									<div class="row form-group add-image">
										<label class="col-sm-3 label-title">Upload Images <span class="required">*</span></label>
										<div class="col-sm-9">
											<h5><i class="fa fa-upload" aria-hidden="true"></i>Select Files to Upload.<span>You can add multiple images (Maximum Five).</span></h5>
											<div class="upload-section">
												<input type="file" name="files[]" id="filer_input2" multiple="multiple">
												<input type="hidden" name="image_file" value="" id="image_file" >
                                            </div>
										</div>
									</div>
									<div class="row form-group item-description" id="description" title="Keep it friendly, but have your buyers in mind, i.e. what they're looking for and what questions they may have, when writing your description. It's also important to highlight the benefits of whatever you're offering.">
										<label class="col-sm-3 label-title">Job Description<span class="required">*</span></label>
										<div class="col-sm-9">
											<textarea class="form-control" name="ads_description" id="ads_description" placeholder="Write few lines about your Job" rows="8"></textarea>
										</div>
									</div>

									<div class="row form-group select-price"  title="Don't know what price to put? Balance out how much you want for what you're offering with how much you think users are willing to pay.">
										<label class="col-sm-3 label-title">Salary<span class="required">*</span></label>
										<div class="col-sm-9">
											<div class="col-sm-12">
											<span class="col-sm-2">BDT</span>
											<input type="text" name="salary_start" placeholder="Salary" class="form-control col-sm-4" id="salary_start" style="width:34%">
											<input type="text" name="salary_end" placeholder="Salary End Range" class="form-control col-sm-4" id="salary_end" style="width: 34%; display: none">
											</div>

											<br>
											<br>
											<input type="radio" name="salary_type" value="1" id="fixed" class="salary_type" checked>
											<label for="fixed">Fixed </label>
											<input type="radio" name="salary_type" value="2" id="range" class="salary_type">
											<label for="range">Range </label>
											<input type="radio" name="salary_type" value="3" id="negotiable" class="salary_type">
											<label for="negotiable">Negotiable </label>
										</div>
									</div>
									<div class="row form-group" title="Last date for applying to this job">
										<label class="col-sm-3 label-title">Deadline<span class="required">*</span></label>
										<div class="col-sm-9" >
											<input type="text" name="application_deadline" id="application_deadline" class="form-control"  placeholder="">
										</div>
									</div>

									<div class="row form-group" title="Job type">
										<label class="col-sm-3 label-title">Type</label>
										<div class="col-sm-9" >
											<select name="job_type" id="job_type" class="form-control">
											<?php foreach ($job_types as $job_type) { ?>
												<option value="<?php echo $job_type ?>"><?php echo $job_type ?></option>
											<?php } ?>
											</select>
										</div>
									</div>

									<div class="row form-group" title="Additional Requirement">
										<label class="col-sm-3 label-title">Additional</label>
										<div class="col-sm-9" >
											<textarea id="additional" name="additional" class="form-control" placeholder="Additional job description if any"></textarea>
										</div>
									</div>

									<div class="row form-group" title="Job Location">
										<label class="col-sm-3 label-title">Location</label>
										<div class="col-sm-9" >
											<select name="job_location" id="job_location" class="form-control">
												<?php foreach ($all_district as $district) { ?>
													<option value="<?php echo $district ?>"><?php echo $district ?></option>
												<?php } ?>
											</select>
										</div>
									</div>

									<input type="hidden" name="category_id" value="<?= $category_id ?>" />
								</div><!-- section -->
								
								<div class="section seller-info">
									<h4>Company Information</h4>
									<div class="row form-group">
										<div class="col-sm-9">
										<span><?=$company_name?> </span><br>
										<span>Address : <?=$address?></span><br>
										<span>Email : <?=$email?></span><br>

									</div>
									</div>

								</div><!-- section -->
								

								
								<div class="checkbox section agreement">
									<label for="send">
										<input type="checkbox" name="send" id="send">
										Send me bdads24.com Email/SMS Alerts for people looking to buy mobile handsets in www By clicking "Post", you agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and acknowledge that you are the rightful owner of this item and using Trade to find a genuine buyer.
									</label>
									<br clear="all"><br clear="all">
									<div align="left" id="ad_status"></div>
									<br clear="all"><br clear="all">
									<button type="submit" id="job_submit" class="btn btn-primary">Post Your Ad</button>
								</div><!-- section -->
								
							</fieldset>
						<?php $this->endWidget();?>
						<!-- form -->
					</div>
				

					<!-- quick-rules -->	
					<div class="col-md-4">
						<div class="section quick-rules">
							<h4>Quick rules</h4>
							<p class="lead">Posting an ad on <a href="#">bdads24.com</a> is free! However, all ads must follow our rules:</p>

							<ul>
								<li>Make sure you post in the correct category.</li>
								<li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
								<li>Do not upload pictures with watermarks.</li>
								<li>Do not post ads containing multiple items unless it's a package deal.</li>
								<li>Do not put your email or phone numbers in the title or description.</li>
								<li>Make sure you post in the correct category.</li>
								<li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
								<li>Do not upload pictures with watermarks.</li>
								<li>Do not post ads containing multiple items unless it's a package deal.</li>
							</ul>
						</div>
					</div><!-- quick-rules -->	
				</div><!-- photos-ad -->				
			</div>	
		</div><!-- container -->
	</section><!-- main -->

	<style>

		.info { border: 1px solid #999; padding:12px 20px 12px 20px; font: bold 12px verdana;-moz-box-shadow: 0 0 5px #888; -webkit-box-shadow: 0 0 5px#888;box-shadow: 0 0 5px #888;text-shadow: 2px 2px 2px #ccc;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;font-family:Verdana, Geneva, sans-serif; font-size:11px; line-height:20px;font-weight:normal;color: black;background: #BDE5F8;}
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

	</style>
	<script type="text/javascript">
		$(document).ready(function() {

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

			if(window.File && window.FileList && window.FileReader) {
				$("#upload-image-one").on("change",function(e) {
					var files = e.target.files ,
						filesLength = files.length ;

					for (var i = 0; i < filesLength ; i++) {
						var f = files[i]
						var fileReader = new FileReader();
						fileReader.onload = (function(e) {
							var file = e.target;
							$("<img></img>",{
								class : "imageThumb",
								src : e.target.result,
								title : file.name
							}).insertAfter("#upload-image-one");
						});
						fileReader.readAsDataURL(f);
					}
				});
			}
			else {
				alert("Your browser doesn't support to File API")
			}


		});
	</script>
<script src="<?php echo Yii::app()->baseUrl ?>js/jquery-ui.js"></script>
<script>
	$( function() {
		$( "#application_deadline" ).datepicker();
	} );
</script>

