<style>
	.error { color: red; }
	.success { color: green; }
</style>
<h1>Send Notification</h1>
<h4><?php echo $message ?></h4>
<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'notification-form',
		'enableAjaxValidation'=>false,
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<label for="user_select"><span class="required">*</span>Select Location</label>
		<?php
			echo CHtml::activeDropDownList($model_register, 'district', $location);
		?>
	</div>

	<div class="row">
		<label for="select_ad">Select User</label>
		<select id="Register_select_user" name="Register[select_user][]" multiple></select>
	</div>
	<a href="javascript:void(0)" class="select_all">Select All</a> | <a href="javascript:void(0)" class="deselect_all">Deselect All</a>

	<div class="row">
		<label for="notification_details">Message Title</label>
		<textarea name="Register[notification_short_desc]" id="Register_notification_short_desc"></textarea>
	</div>

	<div class="row">
		<label for="notification_details">Full Message</label>
		<textarea name="Register[notification_details]" id="Register_notification_details"></textarea>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Send'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
	function baseUrl(){var href=window.location.href.split('/');return href[0]+'//'+href[2]+'/';}
	var SITE_URL=baseUrl();
</script>
<script src="<?php Yii::app()->request->getBaseUrl(true)?>/js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php Yii::app()->getBaseUrl(true)?>/js/tinymce/tinymce.js"></script>
<script language="javascript" type="text/javascript">
	tinyMCE.init({
		theme : "modern",
		mode: "exact",
		elements : "Register[notification_details]",
		theme_advanced_toolbar_location : "top",
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,"
		+ "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
		+ "bullist,numlist,outdent,indent",
		theme_advanced_buttons2 : "link,unlink,anchor,image,separator,"
		+"undo,redo,cleanup,code,separator,sub,sup,charmap",
		theme_advanced_buttons3 : "",
		height:"350px",
		width:"600px"
	});
</script>

<script>
	$(document).ready(function(){
		$('#Register_district').on('change',function(){
			var selected_location = $('#Register_district').val();
			$.ajax({
				type: "GET",
				url: SITE_URL + "admin/register/GetUsersOfLocation",
				data: {location_id:selected_location},
				cache: false,
				dataType:"json",
				success: function(data) {
					$('#Register_select_user').html(data.ad_block);
				}
			});
		});
	});
	$('.select_all').on('click',function(){
		$('#Register_select_user option').prop('selected', true);
	});
	$('.deselect_all').on('click',function(){
		$('#Register_select_user option').prop('selected', false);
	});
</script>

