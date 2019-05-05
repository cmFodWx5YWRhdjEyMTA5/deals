<?php
/* @var $this RegisterController */
/* @var $model Register */

$this->breadcrumbs=array(
	'Registers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Register', 'url'=>array('index')),
	array('label'=>'Create Register', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#register-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Registers</h1>

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
	'id'=>'register-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'register_type',
		'user_name',
		'email',
		'enterprise_name',
		'password',
		'phone_number',
		array(
			'name' => 'country',
			'value' => 'Generic::getCountryFromCountryId($data->country)["name"]',
		),
		array(
			'name' => 'otp_time',
			'value' => 'Generic::getFormattedTime($data->otp_time)'
		),
		'register_type',
		array(
            'header'=>'Status',
            'class'=>'CButtonColumn',
            'template'=>'{deactivate}  {activate}',
            'buttons'=>array(
                'deactivate'=>array(
                    'label'=>'Deactivate',
                    'visible'=>'$data->user_status==1',
                    'url'=>'Yii::app()->createUrl("site/ChangeUserStatus?id=$data->id&active=0")',
                    'options'=>array('confirm'=>'Are you sure want to Deactivate this user?'),
                ),
                'activate' =>array(
                    'label' =>'Activate',
                    'visible'=>'$data->user_status==0',
                    'url'=>'Yii::app()->createUrl("site/ChangeUserStatus?id=$data->id&active=1")',
                    'options'=>array('confirm'=>'Are you sure want to Activate this user?'),
                ),
            ),
        ),
        array(
			'class'=>'CButtonColumn',
		),
        array(
            'header'=>'Force Delete',
            'class'=>'CButtonColumn',
            'template'=>'{forcedelete}',
            'buttons'=>array(
                'forcedelete'=>array(
                    'label'=>'Delete this User',
                    'visible'=>'$data->user_status==1',
                    'url'=>'Yii::app()->createUrl("site/CustomizedRegisterDelete?id=$data->id")',
                    'options'=>array('confirm'=>'Are you sure want to Force Delete this user?'),
                )
            ),
        ),
		/*
		'user_token',
		'image',
		'enterprise_name',
		'division',
		'district',
		'address',
		'create_date',
		'update_date',
		*/
		
	),

)); ?>
