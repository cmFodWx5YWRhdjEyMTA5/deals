<?php
/* @var $this TblCategoryController */
/* @var $model TblCategory */

$this->breadcrumbs=array(
	'Tbl Categories'=>array('index'),
	$model->category_id=>array('view','id'=>$model->category_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblCategory', 'url'=>array('index')),
	array('label'=>'Create TblCategory', 'url'=>array('create')),
	array('label'=>'View TblCategory', 'url'=>array('view', 'id'=>$model->category_id)),
	array('label'=>'Manage TblCategory', 'url'=>array('admin')),
);
?>

<h1>Update TblCategory <?php echo $model->category_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>