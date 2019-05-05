<?php
/* @var $this AdSpecialController */
/* @var $model AdSpecial */

$this->breadcrumbs=array(
	'Ad Specials'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AdSpecial', 'url'=>array('index')),
	array('label'=>'Manage AdSpecial', 'url'=>array('admin')),
);
?>

<h1>Create AdSpecial</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>