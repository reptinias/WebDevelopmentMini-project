<?php
session_start();

$_SESSION['signed_in'] = false;
$_SESSION['Username'] = '';
$_SESSION['ID'] = 0;

if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] === true){
	header("location: FrontPage.php");
	exit;
}
else{
	$_SESSION = array();
	header("location: UserLogin.php");
}

?>