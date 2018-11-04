<?php
/* @var $this EstoreController */
/* @var $model Estore */

$this->breadcrumbs=array(
	'Estores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Estore', 'url'=>array('index')),
	array('label'=>'Manage Estore', 'url'=>array('admin')),
);
?>

<h1>Create Estore</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>