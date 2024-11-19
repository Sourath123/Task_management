<?php

include("../class/user.php");
$user = new user();

$input_array['taskname'] = isset($_POST['name']) ? trim(strip_tags($_POST['name'])) : ''; 

$input_array['startdate'] = isset($_POST['startdate']) ? trim(strip_tags($_POST['startdate'])) : '';

$input_array['enddate'] = isset($_POST['enddate']) ? trim(strip_tags($_POST['enddate'])) : ''; 

$input_array['user'] = isset($_POST['user']) ? trim(strip_tags($_POST['user'])) : '';

$input_array['category'] = isset($_POST['category']) ? trim(strip_tags($_POST['category'])) : '';

$input_array['description'] = isset($_POST['description']) ? trim(strip_tags($_POST['description'])) : '';

$error 	 = $user->register_task($input_array);
$data = array('is_error'=> '0');
echo json_encode($data);
    ?>

