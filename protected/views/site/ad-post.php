<?php
/**
 * Created by PhpStorm.
 * User: KHASHRUL
 * Date: 10/10/2016
 * Time: 1:01 PM
 */

$baseUrl = Yii::app()->request->baseUrl;
$category_list = Generic::getAllCategory();
$all_category_list = Generic::getAllCategoryData();



?>

<input type="hidden" name="mouseover_cell_id" id="mouseover_cell_id" value="">
<input type="hidden" name="mouseover_cell_id_sub" id="mouseover_cell_id_sub" value="">
<input type="hidden" name="mouseover_cell_id_type" id="mouseover_cell_id_type" value="">
	<!-- post-page -->


<section id="main" class="clearfix ad-post-page">
	<div class="container">
		<div class="ome4">
			<div class="main-area">
				<div class="slider-area">
					<div class="container">
						<div class="row">
							<div class="slider-and-sidebar row">
								<div class="col-sm-3">
									<div class="slider-sidebar-menu">
										<div class="sidebar-menu-title">
											<h2><i class="fa fa-align-justify"></i>Select Categories</h2>
										</div>
										<div class="sidebar-menu">
											<ul>
												<?php
													$category_name = "";
													$id = 0;
													$icon = 0;
													$cat = 0;

													foreach($category_list as $value){
													$subcategories = Generic::getSubcategories($value['category_id']);
													//Generic::_setTrace($subcategories);
													if($value['parent_id'] == $id){
														$category_name = $value['category_name'];
														$category_Id = $value['category_id'];
														$category_slug = $value['category_slug'];
														$category_icon = $value['category_icon'];
														$icon ++;
														$cat ++;
													}?>
													<li><a href="javascript:void(0)"><i class="<?=$category_icon?>"></i>&nbsp;&nbsp;<?=$category_name?></a>
													<div class="megamenudown-sub" style="padding: 30px;">
														<?php foreach($subcategories as $subcategory) { ?>
															<div class="mega-top">
																<div class="mega-item-menu">
																	<a href="<?php echo Yii::app()->request->getBaseUrl(true).'/add-post-details?category='.$category_slug.'&sub-category='.$subcategory['sub_category_slug'] ?>" style="text-align:justify"><span><?php echo $subcategory['category_name'] ?></span></a>
																</div>
															</div>
														<?php } ?>
													</div>
													</li>
											      <?php }?>
											</ul>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- End main area -->
		</div>

	</div>
</section>

<script>

	function set_mouseover_cat(id) {
		var cat = jQuery('#mouseover_cell_id').val(id);
	}
	function set_mouseover_subcat(id) {
		var subcategory = jQuery('#mouseover_cell_id_sub').val(id);
	}
	function set_mouseover_type(id) {
		var type = jQuery('#mouseover_cell_id_type').val(id);
	}

	function redirectUrl(){
		var category = $("#mouseover_cell_id").val();
		var subcategory = $("#mouseover_cell_id_sub").val();
		window.location = SITE_URL+'add-post-details?category='+category+'&sub-category='+subcategory;
	}
	function showSubcategory(category_id){
		$.ajax({
			type: 'POST',
			async: false,
			url: SITE_URL + "site/GetSubCategory",
			data: {category_id: category_id},
			cache: false,
			dataType: "json",
			success: function (response){
				if(response.status === "true"){
					$(".megamenudown-sub").html(response.html);

			    }
				else if(response.status === "false"){
					console.log('Ajax Error');
				}
			}

		});

	}

</script>