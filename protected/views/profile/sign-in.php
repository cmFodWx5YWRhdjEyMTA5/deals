<!-- signin-page -->
<section id="main" class="clearfix user-page">
	<div class="container">
		<div class="row text-center">
			<!-- user-login -->
			<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<div class="user-account">
					<h2>Sign In</h2>

					<div class="tab-content">
						<div id="personal-" class="tab-pane fade in active">
							<form action="javascript:void(0);" id="login-form-personal">
								<div id="error_personal"></div>
								<div class="form-group">
									<input type="text" class="form-control" id="user_email_phone" name="user_email_phone" placeholder="Enter your email or Phone Number" >
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="password_personal" name="password" placeholder="Password" >
								</div>
								<button type="submit" id="login_button" class="btn btn-md btn-green block-element">Login</button>
								<br clear="all"><br clear="all">
								<div align="left" id="signup_status_personal"></div>
							</form><!-- form -->
						</div>

					</div>

					<!-- forgot-password -->
					<div class="user-option">
						<div class="checkbox pull-left">
							<label for="logged"><input type="checkbox" name="logged" id="logged"> Keep me logged in </label>
						</div>
						<div class="pull-right forgot-password">
							<a href="<?php echo Yii::app()->createUrl('/forget-password'); ?>">Forgot password</a>
						</div>
					</div><!-- forgot-password -->
				</div>
				<a href="<?php echo Yii::app()->createUrl('/register'); ?>" class="btn-primary">Create a New Account</a>
			</div><!-- user-login -->
		</div><!-- row -->
	</div><!-- container -->
</section><!-- signin-page -->

<style>
	.info { border: 1px solid #999; padding:12px 20px 12px 20px; font: bold 12px verdana;-moz-box-shadow: 0 0 5px #888; -webkit-box-shadow: 0 0 5px#888;box-shadow: 0 0 5px #888;text-shadow: 2px 2px 2px #ccc;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;font-family:Verdana, Geneva, sans-serif; font-size:11px; line-height:20px;font-weight:normal;color: black;background: #BDE5F8;}
	.info-business { border: 1px solid #999; padding:12px 20px 12px 20px; font: bold 12px verdana;-moz-box-shadow: 0 0 5px #888; -webkit-box-shadow: 0 0 5px#888;box-shadow: 0 0 5px #888;text-shadow: 2px 2px 2px #ccc;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;font-family:Verdana, Geneva, sans-serif; font-size:11px; line-height:20px;font-weight:normal;color: black;background: #BDE5F8;} { border: 1px solid #999; padding:12px 20px 12px 20px; font: bold 12px verdana;-moz-box-shadow: 0 0 5px #888; -webkit-box-shadow: 0 0 5px#888;box-shadow: 0 0 5px #888;text-shadow: 2px 2px 2px #ccc;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;font-family:Verdana, Geneva, sans-serif; font-size:11px; line-height:20px;font-weight:normal;color: black;background: #BDE5F8;}



</style>