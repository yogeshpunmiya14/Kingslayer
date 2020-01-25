<?php
	session_start();
	if(!isset($_SESSION['project_name'])){
		// echo "Yes";exit;
		header("location:logout.php");
	}
	if($_SESSION['project_status']!=2){
		header("location:index.php");
	}
	require_once 'header.php';
?>
<div class="container">
	<h1 class="text-center">Add Brand Page</h1>
	<section id="form"><!--form-->
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-1">
							<div class="login-form"><!--Category form-->
								<h2>brand Form</h2>
								<form id="brand_form">
									<input name="brand_name" placeholder="Enter brand" type="text">
									<button type="button" class="btn btn-default btn-brand">Add brand</button>
								</form>
								<div class="err_brand"></div>
							</div><!--/brand form-->
						</div>
					</div>
				</div>
		</section>
<?php
	require_once 'footer.php';
?>