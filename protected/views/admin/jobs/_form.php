<?php
/* @var $this JobsController */
/* @var $model Jobs */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jobs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textArea($model,'title',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vacancy'); ?>
		<?php echo $form->textField($model,'vacancy'); ?>
		<?php echo $form->error($model,'vacancy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'job_category'); ?>
		<?php echo $form->textArea($model,'job_category',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'job_category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'educational_req'); ?>
		<?php echo $form->textArea($model,'educational_req',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'educational_req'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'experiment_req'); ?>
		<?php echo $form->textArea($model,'experiment_req',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'experiment_req'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salary'); ?>
		<?php echo $form->textField($model,'salary',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'salary'); ?>
	</div>

	<?php
	echo $form->labelEx($model,'deadline');
	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'model'=>$model,
		'attribute'=>'deadline',
		'value'=>$model->deadline,
		//additional javascript options for the date picker plugin
		'options'=>array(
			'dateFormat'=>'yy-mm-dd',
			'showAnim'=>'fold',
			'debug'=>true,
			'datepickerOptions'=>array('changeMonth'=>true, 'changeYear'=>true),
		),
		'htmlOptions'=>array('style'=>'height:20px;'),
	));

	echo $form->error($model,'deadline');
	?>

	<div class="row">
		<?php echo $form->labelEx($model,'job_type'); ?>
		<?php echo $form->textField($model,'job_type',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'job_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'additional'); ?>
		<?php echo $form->textArea($model,'additional',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'additional'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'job_req'); ?>
		<?php echo $form->textArea($model,'job_req',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'job_req'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'job_location'); ?>
		<?php echo $form->textField($model,'job_location',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'job_location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_date'); ?>
		<?php echo $form->textField($model,'update_date'); ?>
		<?php echo $form->error($model,'update_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script language="javascript" type="text/javascript" src="<?php Yii::app()->getBaseUrl(true)?>/js/tinymce/tinymce.js"></script>
<script language="javascript" type="text/javascript">
	tinyMCE.init({
		theme : "modern",
		mode: "exact",
		elements : "Jobs[description], Jobs[educational_req], Jobs[additional], Jobs[job_req]",
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