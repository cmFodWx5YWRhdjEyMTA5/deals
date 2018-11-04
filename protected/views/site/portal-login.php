<div id="portal-login">
    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Portal Login</h2><hr />
        <div class="error">
        	<?php
			if(strcmp($msg,''))
			{
				echo $msg;
			}
			?>
        </div>
        <input type="email" class="input-block-level" placeholder="Email address" name="user_email" required />
		  <input type="password" class="input-block-level" placeholder="Password" name="password" required />
     	<hr />
        <button class="btn btn-primary" type="submit" name="btn-submit" value="submit">Login</button>
      </form>

    </div>
	</div><!-- /container -->

<style>
	#portal-login {
		padding-top: 60px;
		padding-bottom: 40px;
	}

	#portal-login .form-signin {
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
	#portal-login .form-signin .form-signin-heading,
	#portal-login .form-signin .checkbox {
		margin-bottom: 10px;
	}
	#portal-login .form-signin input[type="text"],
	#portal-login .form-signin input[type="password"],
	#portal-login .form-signin input[type="email"] {
		font-size: 16px;
		height: auto;
		margin-bottom: 15px;
		padding: 7px 9px;
	}

	.error{
		color: red;
		padding: 3px 0;
	}

</style>