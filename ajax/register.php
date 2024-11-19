<?php

include("../class/user.php");

$user = new user();
isset($_POST['email'])? trim(strip_tags($_POST['email'])):'';

	$input_array['f_username']	= isset($_POST['first_name'])?trim(strip_tags($_POST['first_name'])):'';; 

	$input_array['password'] = isset($_POST['password'])?trim(strip_tags($_POST['password'])):'';

	$input_array['email'] = isset($_POST['email'])?trim(strip_tags($_POST['email'])):''; 
	$email = $input_array['email'];
	$input_array['last_name'] = isset($_POST['last_name'])?trim(strip_tags($_POST['last_name'])):'';
	
	$error 	 = $user->check_existing_email($email);
	
if($error['count'] != '0'){
	$data = array('err'=>'1' ,'msg' => 'already exist');

}else{
	$error 	 = $user->register_user($input_array);
	$data = array('err'=>'0' ,'msg' => 'Successfully Updated');

}
	echo json_encode($data);
    ?>