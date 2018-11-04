<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mainadmin.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Register', 'url'=>array('admin/register/admin'), 'visible'=>!Yii::app()->user->isGuest),
				array(
					'label'=>'Ads',
					'url'=>'#',
					'visible'=>!Yii::app()->user->isGuest,
					'items' => array(
						array('label'=>'Inactive Ads', 'url'=>array('admin/ads/admin/status/0'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Active Ads', 'url'=>array('admin/ads/admin/status/1'), 'visible'=>!Yii::app()->user->isGuest),
					)
				),
				array('label'=>'Ads Special', 'url'=>array('admin/adSpecial/admin'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Hot Ads', 'url'=>array('admin/hotAds/admin'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Discount', 'url'=>array('admin/discount/admin'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Category', 'url'=>array('admin/tblCategory/admin'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'ISP Company', 'url'=>array('admin/business_estore/admin/store/0'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Estore', 'url'=>array('admin/business_estore/admin/store/1'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Jobs', 'url'=>array('admin/jobs/admin'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Notify User', 'url'=>array('admin/register/sendNotification'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by <a href="http://bdbroadbanddeals.com">bdbroadbanddeals.com</a><br/>
		All Rights Reserved.
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
