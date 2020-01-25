<?php
	session_start();
	if(!isset($_SESSION['project_name'])){
		// echo "Yes";exit;
		header("location:logout.php");	
	}
	require_once 'db.php';

	// print_r($_POST);
	if(preg_match("/^[a-zA-Z0-9]{4,12}$/",$_POST['cpassword'])==0)
	{
		echo "Invalid Current Password";
	}
	else if(preg_match("/^[a-zA-Z0-9]{4,12}$/",$_POST['npassword'])==0)
	{
		echo "Invalid New Password";
	}
	else if($_POST['npassword']!=$_POST['cnpassword'])
	{
		echo "Confirm Password Mismatch";
	}
	else if($_POST['npassword']==$_POST['cpassword'])
	{
		echo "New Password should be diff from current password";
	}
	else{
		$curpass = sha1($_POST['cpassword']);
		// echo $curpass;
		$newpass = sha1($_POST['npassword']);
		// echo $newpass;
		// print_r($_SESSION);
		$email = $_SESSION['project_email'];
		// echo $email;

		//select log_password from login where log_emailid='$email'
		$res = $obj->select(
			"login_password",
			"login",
			"login_emailid='$email'"
			);
		// print_r($res);
		$dbpass = $res[0]['login_password'];
		// echo $dbpass;
		if($dbpass != $curpass){
			echo "Current Password mismatch";
		}
		else{
			// echo "ok";
			//update login set login_password='$newpass' where log_emailid='$email'
			$obj->update(
				"login",
				"login_password='$newpass'",
				"login_emailid='$email'"
				);
			echo "ok";
		}
	}
?>