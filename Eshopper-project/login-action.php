<?php
	require_once 'db.php';
	// print_r($_POST);

	if(preg_match("/^([a-zA-Z0-9][a-zA-Z0-9_\.]+[a-zA-Z0-9])@([a-zA-Z0-9][a-zA-Z0-9\-]+[a-zA-Z0-9])\.([a-z]{2,4})(\.[a-z]{2,4})?$/",$_POST['log_email'])==0)
	{
		echo "Invalid Emailid";
	}
	else if(preg_match("/^[a-zA-Z0-9]{4,12}$/",$_POST['log_password'])==0)
	{
		echo "Invalid Password";
	}
	else{
		// echo "ok";
		//authentication process
		//check email id exist or not
		//check password exist or not
		$email = $_POST['log_email'];
		$password = sha1($_POST['log_password']);

		//select * from login where login_emailid='$email';
		$res = $obj->select(
			"*",
			"login",
			"login_emailid='$email'"
			);
		// echo"<pre>";
		// print_r($res);
		// echo "</pre>";

		if(is_array($res)){
			$dbpass = $res[0]['login_password'];
			// echo $dbpass;
			if($dbpass != $password){
				echo "Password Mismatch";
			}
			else{
				if($res[0]['login_status']==0){
					echo "Please verify your account";
				}
				else{
					$_SESSION['project_id'] = $res[0]['login_id'];
					$_SESSION['project_name'] = $res[0]['login_name'];
					$_SESSION['project_email'] = $res[0]['login_emailid'];
					$_SESSION['project_mobile'] = $res[0]['login_mobile'];
					$_SESSION['project_status'] = $res[0]['login_status'];
					echo "ok";
				}
			}
		}
		else{
			echo "Emailid does not exist";
		}
	}
?>