<?php
/* @var $this BlacklistController */
/* @var $model Blacklist */

$this->breadcrumbs=array(
	'Blacklists'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Blacklist', 'url'=>array('index')),
	array('label'=>'Create Blacklist', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#blacklist-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Blacklists</h1>

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
	'id'=>'blacklist-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
			'header' => 'National ID',
			'name' => 'nid',
			'value' => '$data->nid',
		),
		'phone',
		'address',
		'reason',
		array(
			'name' => 'reported_by',
			'value' => 'Generic::getISPCompanyName($data->reported_by)',
		),
		array(
			'name' => 'status',
			'value' => 'Generic::getStatus($data->status)',
		),
		'create_date',
		/*'update_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
