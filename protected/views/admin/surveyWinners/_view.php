<?php
/* @var $this SurveyWinnersController */
/* @var $data SurveyWinners */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('competition_name')); ?>:</b>
	<?php echo CHtml::encode($data->competition_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('winner_name')); ?>:</b>
	<?php echo CHtml::encode($data->winner_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('winner_phone')); ?>:</b>
	<?php echo CHtml::encode($data->winner_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('winner_email')); ?>:</b>
	<?php echo CHtml::encode($data->winner_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('winning_position')); ?>:</b>
	<?php echo CHtml::encode($data->winning_position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('winner_photo')); ?>:</b>
	<?php echo CHtml::encode($data->winner_photo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('winner_address')); ?>:</b>
	<?php echo CHtml::encode($data->winner_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('month')); ?>:</b>
	<?php echo CHtml::encode($data->month); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('week')); ?>:</b>
	<?php echo CHtml::encode($data->week); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prize')); ?>:</b>
	<?php echo CHtml::encode($data->prize); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	*/ ?>

</div>