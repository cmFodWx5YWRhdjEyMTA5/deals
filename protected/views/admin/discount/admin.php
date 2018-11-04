<?php
/* @var $this DiscountController */
/* @var $model Discount */

$this->breadcrumbs=array(
	'Discounts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Discount', 'url'=>array('index')),
	array('label'=>'Create Discount', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#discount-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Discounts</h1>

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
	'id'=>'discount-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		array(
			'name'=>'images',
			'value'=>'Generic::showImageFromS3("ad-dwit-a", $data->images)',
			'type' => 'raw',
			'filter' => false,
		),
		/*'secondary_images',*/
		'description',
		'create_date',
		'expire_date',
		'page_alias',
		//'page_content',
		/*
		'estore_link',
		'external_link',
		'discount',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
