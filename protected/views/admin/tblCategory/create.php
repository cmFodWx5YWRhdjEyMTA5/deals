<?php
/* @var $this TblCategoryController */
/* @var $model TblCategory */

$this->breadcrumbs=array(
	'Tbl Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblCategory', 'url'=>array('index')),
	array('label'=>'Manage TblCategory', 'url'=>array('admin')),
);
?>

<h1>Create TblCategory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>