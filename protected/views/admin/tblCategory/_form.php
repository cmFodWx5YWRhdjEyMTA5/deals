<?php
/* @var $this TblCategoryController */
/* @var $model TblCategory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-category-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'enctype' => 'multipart/form-data',
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'category_name'); ?>
		<?php echo $form->textField($model,'category_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'category_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_slug'); ?>
		<?php echo $form->textField($model,'category_slug',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'category_slug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sub_category_slug'); ?>
		<?php echo $form->textField($model,'sub_category_slug',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sub_category_slug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_icon'); ?>
		<?php echo $form->textField($model,'category_icon',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'category_icon'); ?>
	</div>

	<div class="row">
		<?php
		if(!$model->isNewRecord){
			$category_banner = json_decode($model->category_banner_image);
			echo Generic::showImageFromS3("ad-dwit-a", $category_banner[0]);
		}
		?>
		<?php echo $form->labelEx($model,'category_banner_image'); ?>
		<?php
		$this->widget('CMultiFileUpload', array(
			'name' => 'category_banner_image',
			'model'=> $model,
			'id'=>'imagepath',
			'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
			'duplicate' => 'Duplicate file!', // useful, i think
			'denied' => 'Invalid file type', // useful, i think
		));?>
		<?php echo $form->error($model,'category_banner_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_title'); ?>
		<?php echo $form->textField($model,'meta_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'meta_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_description'); ?>
		<?php echo $form->textField($model,'meta_description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'meta_description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->