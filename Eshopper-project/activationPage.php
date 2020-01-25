<?php
	require_once 'db.php';
	// print_r($_GET);
	$id = $_GET['userid'];
	$status = $_GET['status'];

	//update login set login_status='$status' where login_id='$id'

	$obj->update(
		"login",
		"login_status='$status'",
		"login_id='$id'"
		);
	header("location:login.php");
?>