<?php
/* @var $this EstoreController */
/* @var $model Estore */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'estore-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo CHtml::textField('Estore[user_id]',Generic::getUserNameFromUserId($model->user_id),array('disabled' => true,'id' => 'Estore_user_id' )) ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'slogan'); ?>
		<?php echo $form->textField($model,'slogan',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'slogan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logo'); ?>
		<?php echo $form->textField($model,'logo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'logo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'banner'); ?>
		<?php echo $form->textField($model,'banner',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'banner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sub_banner'); ?>
		<?php echo $form->textField($model,'sub_banner',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sub_banner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'categories'); ?>
		<?php echo CHtml::textField('Estore[categories]',Generic::getCategoriesName($model->categories),array('disabled' => true,'id' => 'Estore_categories','size'=>60,'maxlength'=>255 )) ?>
		<?php echo $form->error($model,'categories'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'about_us'); ?>
		<?php echo $form->textArea($model,'about_us',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'about_us'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_us'); ?>
		<?php echo $form->textArea($model,'contact_us',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'contact_us'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keyword'); ?>
		<?php echo $form->textArea($model,'keyword',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'keyword'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_description'); ?>
		<?php echo $form->textArea($model,'meta_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'meta_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url_alias'); ?>
		<?php echo $form->textField($model,'url_alias',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url_alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->