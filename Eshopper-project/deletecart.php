<?php
	// print_r($_POST);
	$id = $_POST['productid'];
	// echo $id;

	// var_dump(isset($_COOKIE['cartProduct']));
	// echo $_COOKIE['cartProduct'];
	if(isset($_COOKIE['cartProduct']) && !empty($_COOKIE['cartProduct'])){
		$data = $_COOKIE['cartProduct'];
		// echo $data;
		$rec = explode(",",$data);
		// print_r($rec);
		if(is_array($rec)){
			foreach($rec as $key=>$val){
				// echo $val;
				if($id == $val){
					// echo $key;
					unset($rec[$key]);
				}
			}
			// print_r($rec);
			$newpro = implode(",",$rec);
			// echo $newpro;
			setcookie("cartProduct",$newpro,time() + 3600,"/");
			echo "Product Deleted";
		}
	}
?>