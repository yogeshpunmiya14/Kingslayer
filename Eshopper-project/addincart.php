<?php
	// print_r($_POST);
	$id = $_POST['productid'];
	// echo $id;

	// check cookie data exist or not

	// var_dump ( isset($_COOKIE['cartProduct']) );
	if(!isset($_COOKIE['cartProduct'])){
		setcookie("cartProduct",$id,time() + 3600,"/");
		echo "Product Added to Cart";
	}
	else{
		$cookiedata = $_COOKIE['cartProduct'];
		// echo $cookiedata;
		$newdata = $cookiedata.",".$id;
		// echo $newdata;
		setcookie("cartProduct",$newdata,time() + 3600,"/");
		echo "Product Updated in Cart";
	}
?>