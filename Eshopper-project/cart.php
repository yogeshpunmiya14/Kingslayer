<?php
	require_once('header.php');
?>
<h2 class="text-center">Cart Data</h2>
<div class="container">
<?php
	// var_dump(isset($_COOKIE['cartProduct']));
	if(isset($_COOKIE['cartProduct'])){
		$data = $_COOKIE['cartProduct'];
		// echo $data;
		$result = $obj->select("product_id,product_name,product_price,product_discount,product_imgpath,product_desc,brand_id,brand_name,category_id,category_name","category,brands,product","brand_id=product_brid and category_id=product_caid and product_id in($data) order by product_id desc");
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
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Delete</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
											<h2>
												<?php echo round($val['product_price']); ?>
											</h2>
											<p>
												<?php echo $val['product_name']; ?>
											</p>
												<a href="#" class="btn btn-default delete-to-cart" for =" <?php echo $val['product_id']; ?>"><i class="fa fa-shopping-cart"></i>
													Delete</a>
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
	}
	else{
		echo "Cart Empty";
	}
?>
</div>
<?php
	require_once('footer.php');
?>