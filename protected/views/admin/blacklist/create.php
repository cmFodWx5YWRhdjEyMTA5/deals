<?php
/* @var $this BlacklistController */
/* @var $model Blacklist */

$this->breadcrumbs=array(
	'Blacklists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Blacklist', 'url'=>array('index')),
	array('label'=>'Manage Blacklist', 'url'=>array('admin')),
);
?>

<h1>Create Blacklist</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>