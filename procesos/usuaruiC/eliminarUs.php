<?php 
	session_start();
	require_once "../../clases/Usuario2.php";
	$Usuario2 = new Usuario2();
	echo $Usuario2->eliminarUs($_POST['id']);

 ?>