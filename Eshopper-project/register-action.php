<?php
	require_once 'db.php';
	// print_r($_POST);

	$pattern_name = "/^[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/";
	$ans_name = preg_match($pattern_name,$_POST['log_name']);
	if($ans_name==0)
	{
		echo "Invalid Name";
	}
	else if(preg_match("/^[1-9][0-9]{9}$/",$_POST['log_mobile'])==0)
	{
		echo "Invalid Mobile";
	}
	else if(preg_match("/^([a-zA-Z0-9][a-zA-Z0-9_\.]+[a-zA-Z0-9])@([a-zA-Z0-9][a-zA-Z0-9\-]+[a-zA-Z0-9])\.([a-z]{2,4})(\.[a-z]{2,4})?$/",$_POST['log_email'])==0)
	{
		echo "Invalid Emailid";
	}
	else if(preg_match("/^[a-zA-Z0-9]{4,12}$/",$_POST['log_password'])==0)
	{
		echo "Invalid Password";
	}
	else if($_POST['log_password']!=$_POST['log_confirmpass'])
	{
		echo "Invalid Confirm Password";
	}
	else{
		// echo "ok";

		//check email id exist or not
		$email=$_POST['log_email'];
		//select count(*) as cnt from login where login_emailid='$email',

		$result = $obj->select(
			"count(*) as cnt",
			"login",
			"login_emailid='$email'"
			);
		// echo "<pre>";
		// print_r($result);
		// echo "</pre>";
		if($result[0]['cnt'] == 1){
			echo "Emailid already exist";
		}
		else{
			// echo "User Add";
			$name = $_POST['log_name'];
			$mobile = $_POST['log_mobile'];
			$password = sha1($_POST['log_password']);

			//insert into login(login_name,login_mobile,login_emailid,login_password) values ('$name','$mobile','$email','$password');

			$obj->insert(
				"login",
				"login_name,login_mobile,login_emailid,login_password",
				"'$name','$mobile','$email','$password'"
				);

			echo "<pre>";
			print_r($obj);
			echo "</pre>";

			$last_id = $obj->db->insert_id;
	// 		//send email for verify
	// 		/*************************************/
			$to = $email;
            $subject = "Verify Your Eshopper Account";

            $message = "please click here to verify
            <a href='http://localhost/yogesh/project/activationPage.php?status=1&userid=$last_id'> Activation Link </a>
            ";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <vishal@php-training.in>' . "\r\n";
            // $headers .= 'Cc: myboss@example.com' . "\r\n";

            $result_mail = mail($to,$subject,$message,$headers);
            var_dump($result_mail);
			/*************************************/
			// echo "User Added";
		}
	}
?>