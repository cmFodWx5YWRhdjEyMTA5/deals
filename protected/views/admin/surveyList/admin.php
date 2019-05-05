<?php
/* @var $this SurveyListController */
/* @var $model SurveyList */

$this->breadcrumbs=array(
	'Survey Lists'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SurveyList', 'url'=>array('index')),
	array('label'=>'Create SurveyList', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#survey-list-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Survey Lists</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<a href="/survey/backend/" target="_blank">Survey Admin Panel</a>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'survey-list-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'survey_name',
		'survey_details',
		'survey_link',
		'status',
		'create_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
