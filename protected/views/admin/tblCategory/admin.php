<?php
/* @var $this TblCategoryController */
/* @var $model TblCategory */

$this->breadcrumbs=array(
	'Tbl Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TblCategory', 'url'=>array('index')),
	array('label'=>'Create TblCategory', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbl-category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tbl Categories</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'category_id',
		'category_name',
		'category_slug',
		'sub_category_slug',
		'parent_id',
		//'category_icon',
		array(
			'name'=>'category_banner_image',
			'value'=>'Generic::showImage("ad-dwit-a", $data->category_banner_image)',
			'type' => 'raw',
			'filter' => false,
		),
		'meta_title',
		'meta_description',

		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
