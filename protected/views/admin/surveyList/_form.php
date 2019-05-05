<?php
/* @var $this SurveyListController */
/* @var $model SurveyList */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'survey-list-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'survey_name'); ?>
		<?php echo $form->textField($model,'survey_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'survey_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'survey_details'); ?>
		<?php echo $form->textArea($model,'survey_details',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'survey_details'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'survey_link'); ?>
		<?php echo $form->textField($model,'survey_link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'survey_link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->