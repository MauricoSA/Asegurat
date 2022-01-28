<?php 
	require_once "../../clases/Usuario.php";
	$Usuario = new Usuario();
	echo json_encode($Usuario->obtenerUsuario($_POST['idContrato']));

 ?>