<?php 
	session_start();
	require_once "../../clases/Pagos.php";
	$Pagos = new Pagos();
	echo $Pagos->EliminarP($_POST['IDP']);

 ?>