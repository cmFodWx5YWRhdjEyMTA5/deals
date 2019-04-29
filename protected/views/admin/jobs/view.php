<?php
/* @var $this JobsController */
/* @var $model Jobs */

$this->breadcrumbs=array(
	'Jobs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Jobs', 'url'=>array('index')),
	array('label'=>'Create Jobs', 'url'=>array('create')),
	array('label'=>'Update Jobs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Jobs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Jobs', 'url'=>array('admin')),
);
?>

<h1>View Jobs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'vacancy',
		'job_category',
		'description',
		'educational_req',
		'experiment_req',
		'salary',
		'deadline',
		'job_type',
		'additional',
		'job_req',
		'job_location',
		'create_date',
		'update_date',
		'active',
	),
)); ?>
