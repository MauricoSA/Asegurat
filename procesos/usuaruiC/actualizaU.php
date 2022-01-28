<?php  
	require_once "../../clases/Usuario2.php";
	require_once "../../clases/Conexion.php";
	$c = new Conectar();
	$conexion = $c->conexion();
	$id = $_POST['IDU'];
	$sql = "SELECT pass FROM usuario WHERE ID ='$id'";
	$result = mysqli_query($conexion, $sql);
	while($ver = mysqli_fetch_array($result)){
			$passDB = $ver['pass'];
		
			$pass = $_POST['password2'];
			if ($pass == $passDB) {
				$password = $_POST['password2'];
			} else {
				$password = sha1($_POST['password2']);
			}
	
	}
	
	$Usuario2 = new Usuario2();

	$datos = array(
					"idU" => $_POST['IDU'],
					"Nc" => $_POST['N_CONTRATO2'],
					"Fc" => $_POST['FECHA_CONTRATO2'],
					"N" => $_POST['Nombre2'],
					"AP" => $_POST['APP2'],
					"AM" => $_POST['APM2'],
					"TEl" => $_POST['TELEFONO2'],
					"TEl2" => $_POST['telefono2_1'],
					"TEl3" => $_POST['telefono3_1'],
					"Email" => $_POST['Mail'],
					"User" => $_POST['us'],
					"pass" => $password
					
				);

	echo $Usuario2->actualizarUS($datos);
?>
	