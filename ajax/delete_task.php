<?php 
include('../class/user.php');

$obj_user = new user();

$rest_id = isset($_POST['rest_id']) ? trim(strip_tags($_POST['rest_id'])) : '';

$error 	 = $obj_user->delete_task($rest_id);

echo json_encode($error);
