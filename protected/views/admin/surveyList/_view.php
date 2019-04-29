<?php
/* @var $this SurveyListController */
/* @var $data SurveyList */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('survey_name')); ?>:</b>
	<?php echo CHtml::encode($data->survey_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('survey_details')); ?>:</b>
	<?php echo CHtml::encode($data->survey_details); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('survey_link')); ?>:</b>
	<?php echo CHtml::encode($data->survey_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />


</div>