<?php 
require_once "../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();

if (isset($_POST['btnActualizaPago'])) 
{
	$edit_id = $_POST['Id2'];
	$edit_f = $_POST['Folio2'];
	$edit_c = $_POST['concepto2'];
	$edit_n = $_POST['Nserie2'];
	$edit_fe = $_POST['fecha2'];
	$edit_H = $_POST['Hora2'];
	$edit_I = $_FILES['archivos2']['name'];

	$sql = "UPDATE pagos 
	SET FOLIO = '$edit_f',
	CONCEPTO = '$edit_c',
	NUMERO_SERIE = '$edit_n',
	FECHA = '$edit_fe',
	HORA = '$edit_H',
	IMG = '$edit_I'
	WHERE ID_PAGOS = ?"; 	
}

?>