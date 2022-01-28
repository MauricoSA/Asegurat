<?php 
	session_start();
	require_once "../../clases/Usuario.php";
	$Usuario = new Usuario();
	echo $Usuario->eliminarAds($_POST['idA']);

 ?>