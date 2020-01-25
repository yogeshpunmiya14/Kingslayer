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
	<h1 class="text-center">Add Category Page</h1>
	<section id="form"><!--form-->
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-1">
							<div class="login-form"><!--Category form-->
								<h2>Category Form</h2>
								<form id="category_form">
									<input name="cat_name" placeholder="Enter Category" type="text">
									<button type="button" class="btn btn-default btn-category">Add Category</button>
								</form>
								<div class="err_category"></div>
							</div><!--/Category form-->
						</div>
					</div>
				</div>
		</section>
<?php
	require_once 'footer.php';
?>