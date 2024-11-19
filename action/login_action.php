<?php
ob_start();

ini_set('session.gc_maxlifetime', 3600);

session_start(); 

include("../class/user.php");

$user = new user();

$error ="";



$email 	 	 = isset($_POST['email'])? trim(strip_tags($_POST['email'])):'';

$password 	 = isset($_POST['password'])?trim(strip_tags($_POST['password'])):'';

//$error 	 = $user->validatelogin($email,$password);



	

		$user_check = $user->checkUser($email,$password);

		//print_r($user_check);die;

		if($user_check['status']=="success"){

		$_SESSION['login'] = true;  

		$_SESSION['uid'] 	= $user_details['result']->id;             

		$_SESSION['email']  = $user_details['result']->email;

		$_SESSION['username']  = $user_details['result']->username;

		$_SESSION['login_user_type'] ='user';

		header("location:../list_tasks.php");exit;

	

		}

		






?>

