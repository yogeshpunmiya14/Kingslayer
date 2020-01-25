<?php
	session_start();
	if(isset($_SESSION['project_name'])){
		// echo "Yes";
		// exit;
		header("location:index.php");
}
	require_once 'header.php';
?>

<h2 class="text-center">Login / Register Page</h2>
<div class="container">
	<section id="form"><!--form-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-1">
						<div class="login-form"><!--login form-->
							<h2>Login to your account</h2>
							<form id="login_form">
								<input name="log_email" placeholder="Email Address" type="email">
								<input name="log_password" placeholder="Password" type="password">
								<button type="button" class="btn btn-default btn-login">Login</button>
							</form>
							<div class="err_login"></div>
						</div><!--/login form-->
					</div>
					<div class="col-sm-1">
						<h2 class="or">OR</h2>
					</div>
					<div class="col-sm-4">
						<div class="signup-form"><!--sign up form-->
							<h2>New User Signup!</h2>
							<form id="register_form">
								<input name="log_name" placeholder="Name" type="text">
								<input name="log_mobile" placeholder="Mobile" type="text">
								<input name="log_email" placeholder="Email Address" type="email">
								<input name="log_password" placeholder="Password" type="password">
								<input name="log_confirmpass" placeholder="Confirm Password" type="password">
								<button type="button" class="btn btn-default btn-register">Signup</button>
							</form>
							<div class="err_register"></div>
						</div><!--/sign up form-->
					</div>
				</div>
			</div>
	</section>
</div>
<?php
	require_once 'footer.php';
?>