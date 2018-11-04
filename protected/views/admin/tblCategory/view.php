<?php
/* @var $this TblCategoryController */
/* @var $model TblCategory */

$this->breadcrumbs=array(
	'Tbl Categories'=>array('index'),
	$model->category_id,
);

$this->menu=array(
	array('label'=>'List TblCategory', 'url'=>array('index')),
	array('label'=>'Create TblCategory', 'url'=>array('create')),
	array('label'=>'Update TblCategory', 'url'=>array('update', 'id'=>$model->category_id)),
	array('label'=>'Delete TblCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->category_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblCategory', 'url'=>array('admin')),
);
?>

<h1>View TblCategory #<?php echo $model->category_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'category_id',
		'category_name',
		'category_slug',
		'sub_category_slug',
		'parent_id',
		'category_icon',
		array(
			'name'=>'category_banner_image',
			'value'=>Generic::showImageFromS3("ad-dwit-a", $model->category_banner_image),
			'type' => 'raw',
		),
		'meta_title',
		'meta_description',
	),
)); ?>
