<?php
/* @var $this EstoreOrderController */
/* @var $model EstoreOrder */

$this->breadcrumbs=array(
	'Estore Orders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EstoreOrder', 'url'=>array('index')),
	array('label'=>'Manage EstoreOrder', 'url'=>array('admin')),
);
?>

<h1>Create EstoreOrder</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>