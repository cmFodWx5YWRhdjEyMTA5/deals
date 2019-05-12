<?php
/* @var $this SurveyWinnersController */
/* @var $model SurveyWinners */

$this->breadcrumbs=array(
	'Survey Winners'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SurveyWinners', 'url'=>array('index')),
	array('label'=>'Create SurveyWinners', 'url'=>array('create')),
	array('label'=>'Update SurveyWinners', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SurveyWinners', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SurveyWinners', 'url'=>array('admin')),
);
?>

<h1>View SurveyWinners #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'competition_name',
		'winner_name',
		'winner_phone',
		'winner_email',
		'winning_position',
		'winner_photo',
		'winner_address',
		'status',
		'year',
		'month',
		'week',
		'prize',
		'create_date',
	),
)); ?>
