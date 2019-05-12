<style>
    .old_winner_photo {
        width: 300px;
        height: auto;
        display: block;
    }
    .old_winner_photo img {
        width: 100%;
    }
</style>
<?php
/* @var $this SurveyWinnersController */
/* @var $model SurveyWinners */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'survey-winners-form',
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
		<?php echo $form->labelEx($model,'competition_name'); ?>
		<?php echo $form->textField($model,'competition_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'competition_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'winner_name'); ?>
		<?php echo $form->textField($model,'winner_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'winner_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'winner_phone'); ?>
		<?php echo $form->textField($model,'winner_phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'winner_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'winner_email'); ?>
		<?php echo $form->textField($model,'winner_email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'winner_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'winning_position'); ?>
		<?php echo $form->textField($model,'winning_position',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'winning_position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'winner_photo'); ?>
		<?php echo $form->fileField($model,'winner_photo'); ?>
        <?php echo $form->error($model,'winner_photo'); ?>
	</div>

    <?php if(!empty($model->winner_photo)){ ?>
        <span class="old_winner_photo">
            <img src="<?php echo $model->winner_photo?>" alt="Current Winner Photo" />
        </span>
    <?php } ?>
	<div class="row">
		<?php echo $form->labelEx($model,'winner_address'); ?>
		<?php echo $form->textArea($model,'winner_address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'winner_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'month'); ?>
		<?php echo $form->textField($model,'month',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'week'); ?>
		<?php echo $form->textField($model,'week',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'week'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prize'); ?>
		<?php echo $form->textArea($model,'prize',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'prize'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model'=>$model,
            'attribute'=>'create_date',
            'value'=>$model->create_date,
            //additional javascript options for the date picker plugin
            'options'=>array(
                'dateFormat'=>'yy-mm-dd',
                'showAnim'=>'fold',
                'debug'=>true,
                'datepickerOptions'=>array('changeMonth'=>true, 'changeYear'=>true),
            ),
            'htmlOptions'=>array('style'=>'height:20px;'),
        ));
        ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->