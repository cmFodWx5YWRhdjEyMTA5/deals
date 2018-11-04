<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */
$baseUrl = Yii::app()->request->getbaseUrl(true);
$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>
	<section id="main" class="clearfix contact-us">
	<div class="container">

	<!-- breadcrumb -->
	<!--<ol class="breadcrumb">
		<li><a href="<?/*=$baseUrl*/?>">Home</a></li>
		<li>Contact</li>
	</ol>--><!-- breadcrumb -->
	<h2 class="title">Contact Us</h2>


	<div class="corporate-info">
	<div class="row">
	<!-- contact-info -->
	<div class="col-sm-4">
		<div class="contact-info">

			<h2>Corporate Info</h2>
			<address>
				<p><i  class="fa fa-home"></i>944 Upper Jashore Road (1st Floor),<br> Joragate Moor, Khulna-9000</p>
				<p><i  class="fa fa-mobile"></i><a href="#">+88-09639114455</a></p>
				<p><i  class="fa fa-envelope"></i><a href="#">support@bdbroadbanddeals.com</a></p>
			</address>

			<ul class="social">
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
			</ul>
		</div>

		<!-- gmap -->
		<div class="map" style="margin-top: 30px">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4373.051807724947!2d89.54925761242524!3d22.828995228934303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff9aa084ca2b89%3A0xb71095284a1bff8b!2sJora+Gate+Mor!5e0!3m2!1sen!2sbd!4v1540128427726" width="359" height="272" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>


	</div><!-- contact-info -->

	<!-- feedback -->
	<div class="col-sm-8">
	<div class="feedback">
	<h2>Send Us Your Feedback</h2>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('contact'); ?>
	</div>

<?php else: ?>

	<p>
		If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
	</p>

	<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'contact-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); 
		?>




		<div class="row">
			<div class="col-sm-5">
				<div class="form-group">
					<?php echo $form->textField($model,'name', array('placeholder'=>'Name')); ?>
					<?php echo $form->error($model,'name'); ?>
				</div>
			</div>


			<div class="col-sm-5">
				<div class="form-group">
					<?php echo $form->textField($model,'email', array('placeholder'=>'Email')); ?>
					<?php echo $form->error($model,'email'); ?>
				</div>
			</div>


			<div class="col-sm-10">
				<div class="form-group">
					<?php echo $form->textField($model,'subject',array('size'=>60,'placeholder'=>'Subject','maxlength'=>128)); ?>
					<?php echo $form->error($model,'subject'); ?>
				</div>
			</div>


			<div class="col-sm-10">
				<div class="form-group">
					<?php echo $form->textArea($model,'body',array('placeholder'=>'Message','rows'=>6, 'cols'=>50)); ?>
					<?php echo $form->error($model,'body'); ?>
				</div>
			</div>

			<?php if(CCaptcha::checkRequirements()): ?>

			<div class="col-sm-5">
				<div class="form-group">
					<?php echo $form->labelEx($model,'verifyCode'); ?>
					<?php $this->widget('CCaptcha'); ?>
				</div>
			</div>

			<div>
				<div class="col-sm-5">
					<div class="form-group">
						<?php echo $form->textField($model,'verifyCode'); ?>
					</div>
					<div class="hint">Please enter the letters as they are shown in the image above.
						<br/>Letters are not case-sensitive.</div>
					<?php echo $form->error($model,'verifyCode'); ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	

		<div class="row buttons" style="margin-left: 4px">
			<?php echo CHtml::submitButton('Submit',array('class'=>'btn-theme')); ?>
		</div>

		<?php $this->endWidget(); ?>

	</div><!-- form -->

<?php endif; ?>
</div>
	</div><!-- feedback -->
			</div><!-- row -->
		</div>
	</div>
</section>

<style>

	.errorMessage{
		color: red;
	}
</style>
