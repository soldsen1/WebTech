﻿<?php 

session_start();
require('database.php');
$database = new Database();

$username = $_POST['login-name'];
$password = $_POST['login-pass'];

$check = $database->loginAutentication($username, $password);
if ($check) {
	$profile = $database->getProfile($username);
	//create session
	$_SESSION["login"] = true;
	$_SESSION["username"] = $profile["username"];
	$_SESSION["fname"] = $profile["fname"];
	$_SESSION["lname"] = $profile["lname"];
	$_SESSION["role"] = $profile["role"];
	if ($profile["path_pic"] != "") {
		$_SESSION["path_pic"] = $profile["path_pic"];
	} else {
		$_SESSION["path_pic"] = "https://www.bodynbrain.com/img/unknownProfile.png";
	}

	$_SESSION["email"] = $profile["email"];

    date_default_timezone_set("Asia/Bangkok");
    $date=date("Y-m-d H:i:s");
    $qrcode_id=$_POST['qr'];
    $status="in time";
    if($date>$database->getEXP($qrcode_id)){
        $status="late";
    }
    
    $database->insertTakeClass($date,$status,$username,$qrcode_id);
	echo $_SESSION["role"];
} else {
	echo "wrong account";
}


?>