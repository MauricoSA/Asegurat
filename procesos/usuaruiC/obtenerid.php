<?php 
	require_once "../../clases/Usuario2.php";
	$Usuario2 = new Usuario2();
	echo json_encode($Usuario2->obtenerID($_POST['id']));

 ?>