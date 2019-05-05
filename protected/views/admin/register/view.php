<?php
/* @var $this RegisterController */
/* @var $model Register */

$this->breadcrumbs=array(
	'Registers'=>array('index'),
	$model->id,
);
$country = Generic::getCountryFromCountryId($model->country);//Generic::_setTrace($country);
$this->menu=array(
	array('label'=>'List Register', 'url'=>array('index')),
	array('label'=>'Create Register', 'url'=>array('create')),
	array('label'=>'Update Register', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Register', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Register', 'url'=>array('admin')),
);
?>

<h1>View Register #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'register_type',
		'user_name',
		'email',
		'password',
		'phone_number',
		'user_token',
		'image',
		'enterprise_name',
		array(
			'name'=>'country',
			'value'=>$country['name'],
			'type' => 'raw',
		),
		array(
			'name'=>'division',
			'value'=>implode(',',$division),
			'type' => 'raw',
		),
		array(
			'name'=>'district',
			'value'=>implode(',',$district),
			'type' => 'raw',
		),
		array(
			'name'=>'thana',
			'value'=>implode(',',$thana),
			'type' => 'raw',
		),
		'address',
		'create_date',
		'update_date',
		'referral_id',
		array(
			'name'=>'isp_type',
			'value'=>Generic::getISPCategoryName($model->isp_type),
			'type' => 'raw',
		)
	),
)); ?>
