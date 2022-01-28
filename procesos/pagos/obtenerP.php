<?php 
	require_once "../../clases/Pagos.php";
	$Pagos = new Pagos();
	echo json_encode($Pagos->obtenerP($_POST['IDP']));

 ?>