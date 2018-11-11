<?php
/* @var $this EstoreOrderController */
/* @var $model EstoreOrder */

$this->breadcrumbs=array(
	'Estore Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EstoreOrder', 'url'=>array('index')),
	array('label'=>'Create EstoreOrder', 'url'=>array('create')),
	array('label'=>'View EstoreOrder', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EstoreOrder', 'url'=>array('admin')),
);
?>

<h1>Update EstoreOrder <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>