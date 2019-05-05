<?php
/* @var $this AdSpecialController */
/* @var $model AdSpecial */

$this->breadcrumbs=array(
	'Ad Specials'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AdSpecial', 'url'=>array('index')),
	array('label'=>'Create AdSpecial', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ad-special-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ad Specials</h1>

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
	'id'=>'ad-special-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name'=>'user_id',
			'value'=>'Generic::getUserNameFromUserId($data->user_id)',
			'type' => 'raw',
			'filter' => false,
		),
		'title',
		'description',
		array(
			'name'=>'banner_image',
			'value'=>'Generic::showImageFromS3("ad-dwit-a", $data->banner_image)',
			'type' => 'raw',
			'filter' => false,
		),
		'banner_position',

		'banner_url',
		'page_alias_ad_special',
		'create_date',
		'update_date',

		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
