<?php
/* @var $this EstoreController */
/* @var $model Estore */

$this->breadcrumbs=array(
	'Estores'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Estore', 'url'=>array('index')),
	//array('label'=>'Create Estore', 'url'=>array('create')),
	array('label'=>'View Estore', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Estore', 'url'=>array('admin')),
);
?>

<h1>Update Estore <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>