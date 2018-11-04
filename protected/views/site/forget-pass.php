<?php
session_start();


if(isset($_POST['btn-submit']))
{
	$email = $_POST['user_email'];

	$query="SELECT * FROM `tbl_register` WHERE email='$email'";
	$result = Yii::app()->db->createCommand($query)->queryRow();

	if($result)
	{	$pass  = base64_decode($result['password']);//FETCHING PASS
		$message= " Hello , $email
				   <br /><br />
				   We got requested to  your password,

				  <br /><br />
				   Here is Your Passsword : $pass <br />
				   Thank you.....!!
				   ";
		$subject = "Password Reset";
		
		Generic::sendMail($message,$subject,$email);
		
		$msg = "<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					We've sent an email to $email.
                    Please check that email to get your  Password.
			  	</div>";
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry!</strong>  this email not found. 
			    </div>";
	}
}
?>
<div id="login">
    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Forgot Password?</h2><hr />
        
        	<?php
			if(isset($msg))
			{
				echo $msg;
			}
			else
			{
				?>
              	<div class='alert alert-info'>
				Please enter your email address. You will receive your password via email.!
				</div>  
                <?php
			}
			?>
        
        <input type="email" class="input-block-level" placeholder="Email address" name="user_email" required />
     	<hr />
        <button class="btn btn-danger btn-primary" type="submit" name="btn-submit">Get Your Password</button>
      </form>

    </div>
	</div><!-- /container -->

<style>
	#login {
		padding-top: 60px;
		padding-bottom: 40px;
		background-color: #f5f5f5;
		background:#0ca2d1;
	}
	#login {
		padding-top: 40px;
		padding-bottom: 40px;
	}

	#login .form-signin {
		max-width: 535px;
		padding: 19px 29px 29px;
		margin: 0 auto 20px;
		background-color: #fff;
		border: 1px solid #e5e5e5;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
		-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
		box-shadow: 0 1px 2px rgba(0,0,0,.05);
	}
	#login .form-signin .form-signin-heading,
	#login .form-signin .checkbox {
		margin-bottom: 10px;
	}
	#login .form-signin input[type="text"],
	#login .form-signin input[type="password"],
	#login .form-signin input[type="email"] {
		font-size: 16px;
		height: auto;
		margin-bottom: 15px;
		padding: 7px 9px;
	}





</style>