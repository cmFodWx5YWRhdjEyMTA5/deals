<?php
/* @var $this AdSpecialController */
/* @var $model AdSpecial */

$this->breadcrumbs=array(
	'Ad Specials'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AdSpecial', 'url'=>array('index')),
	array('label'=>'Create AdSpecial', 'url'=>array('create')),
	array('label'=>'View AdSpecial', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AdSpecial', 'url'=>array('admin')),
);
?>

<h1>Update AdSpecial <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>