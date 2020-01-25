<?php
	session_start();
	if(!isset($_SESSION['project_name'])){
		// echo "Yes";exit;
		header("location:logout.php");
	}
	if($_SESSION['project_status']!=2){
		header("location:index.php");
	}
	require_once 'db.php';
	// print_r($_POST);

	if(preg_match("/[a-zA-Z0-9][a-zA-Z0-9 ]{1,}[a-zA-Z0-9]$/",$_POST['brand_name'])==0){
		echo "Brand Name Invalid";
	}
	else{
		$name = $_POST['brand_name'];
		// echo $name;
		$result = $obj->select(
			"count(*) as cnt",
			"brands",
			"brand_name='$name'"
			);
		// echo "<pre>";
		// print_r($result);
		// echo "</pre>";
		if($result[0]['cnt'] == 1){
			echo "Brand already exist";
		}
		else{
			$obj->insert(
				"brands",
				"brand_name",
				"'$name'"
				);
			echo $name." added";
		}
	}
?>