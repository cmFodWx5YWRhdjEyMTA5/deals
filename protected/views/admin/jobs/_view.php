<?php
/* @var $this JobsController */
/* @var $data Jobs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vacancy')); ?>:</b>
	<?php echo CHtml::encode($data->vacancy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('job_category')); ?>:</b>
	<?php echo CHtml::encode($data->job_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('educational_req')); ?>:</b>
	<?php echo CHtml::encode($data->educational_req); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('experiment_req')); ?>:</b>
	<?php echo CHtml::encode($data->experiment_req); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('salary')); ?>:</b>
	<?php echo CHtml::encode($data->salary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deadline')); ?>:</b>
	<?php echo CHtml::encode($data->deadline); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('job_type')); ?>:</b>
	<?php echo CHtml::encode($data->job_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('additional')); ?>:</b>
	<?php echo CHtml::encode($data->additional); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('job_req')); ?>:</b>
	<?php echo CHtml::encode($data->job_req); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('job_location')); ?>:</b>
	<?php echo CHtml::encode($data->job_location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	*/ ?>

</div>