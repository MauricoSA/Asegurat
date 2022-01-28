<?php 
	session_start();
	require_once "../../../clases/Usuario.php";

	$user = $_POST['login'];
	$pass = sha1($_POST['password']);

	$userObj = new Usuario();
	echo $userObj->login($user,$pass); 

?>