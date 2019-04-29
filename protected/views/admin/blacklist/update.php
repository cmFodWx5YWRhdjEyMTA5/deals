<?php
/* @var $this BlacklistController */
/* @var $model Blacklist */

$this->breadcrumbs=array(
	'Blacklists'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Blacklist', 'url'=>array('index')),
	array('label'=>'Create Blacklist', 'url'=>array('create')),
	array('label'=>'View Blacklist', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Blacklist', 'url'=>array('admin')),
);
?>

<h1>Update Blacklist <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>