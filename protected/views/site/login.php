<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<section id="main" class="clearfix contact-us">
	<div class="container">

		<div class="col-sm-8">
			<div class="feedback" style="margin-left: 44%; margin-right: -12%;">

					<h1>Login</h1>

					<p>Please fill out the following form with your login credentials:</p></br>

					<div class="form">
						<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'login-form',
							'enableClientValidation'=>true,
							'clientOptions'=>array(
								'validateOnSubmit'=>true,
							),
						)); ?>


						<div class="row">
							<div class="col-sm-10">
								<div class="form-group">

							<?php echo $form->textField($model,'username',array('placeholder'=>'Username')); ?>
							<?php echo $form->error($model,'username'); ?>
									</div>
								</div>

							<div class="col-sm-10">
								<div class="form-group">

							<?php echo $form->passwordField($model,'password',array('placeholder'=>'Password')); ?>
							<?php echo $form->error($model,'password'); ?>
									</div>
								</div>
						</div>

						<div class="row rememberMe">
							<div class="col-sm-10">
								<div class="form-group">
							<?php echo $form->checkBox($model,'rememberMe'); ?>
							<?php echo $form->label($model,'rememberMe'); ?>
							<?php echo $form->error($model,'rememberMe'); ?>
									</div>
								</div>
						</div>

						<div class="row buttons">
							<div class="col-sm-10">
							<div class="form-group">
							<?php echo CHtml::submitButton('Login'); ?>
								</div>
								</div>
						</div>

						<?php $this->endWidget(); ?>
				</div><!-- form -->
			</div>
		</div>



	</div>
</section>


