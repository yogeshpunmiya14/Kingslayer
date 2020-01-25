<?php
	session_start();
	if(!isset($_SESSION['project_name'])){
		echo "Yes";exit;
		header("location:logout.php");
	}
	require_once 'header.php';
?>
<section id="form"><!--form-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-1">
						<div class="login-form"><!--password form-->
							<h2>Update account</h2>
							<form id="password_form">
								<input name="cpassword" placeholder="Current Password" type="password">
								<input name="npassword" placeholder="New Password" type="password">
								<input name="cnpassword" placeholder="New Confirm Password" type="password">
								<button type="button" class="btn btn-default btn-password">Submit</button>
							</form>
							<div class="err_password"></div>
						</div><!--/password form-->
					</div>
				</div>
			</div>
	</section>
<?php
	require_once 'footer.php';
?>