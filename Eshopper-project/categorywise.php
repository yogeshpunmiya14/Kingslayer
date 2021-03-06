<?php
	// require_once 'db.php';
	require_once('header.php');
	require_once('slider.php');
?>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php
						require_once 'sidebar.php';
					?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
<?php
	$id = $_GET['categoryid'];
	// echo $id;
	$result = $obj->select("product_id,product_name,product_price,product_discount,product_imgpath,product_desc,brand_id,brand_name,category_id,category_name","category,brands,product","brand_id=product_brid and category_id=product_caid and category_id='$id' order by product_id desc");
	// echo "<pre>";
	// print_r($result);
	// echo "</pre>";
	if(is_array($result)):
		foreach($result as $val):
?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="products/<?php echo $val['product_imgpath']; ?>" height="400px" />
											<h2>
												<?php echo round($val['product_price']); ?>
											</h2>
											<p>
												<?php echo $val['product_name']; ?>
											</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
											<h2>
												<?php echo round($val['product_price']); ?>
											</h2>
											<p>
												<?php echo $val['product_name']; ?>
											</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
<?php
		endforeach;
	endif;
?>
						
					</div><!--features_items-->
					
				</div>
			</div>
		</div>
	</section>
	
<?php
	require_once('footer.php');
?>	