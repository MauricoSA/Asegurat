<?php  
	require_once "../../clases/Usuario.php";
	require_once "../../clases/Conexion.php";
	$c = new Conectar();
	$conexion = $c->conexion();
	$id = $_POST['idA'];
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
	$Usuario = new Usuario();
	$datos = array(
					"idA" => $_POST['idA'],
					"NOMBRE" => $_POST['Nombre2'],
					"APP" => $_POST['APP2'],
					"APM" => $_POST['APM2'],
					"TELEFONO" => $_POST['TELEFONO2'],
					"Usuarios" => $_POST['Usuario2'],
					"CORREO" => $_POST['Correo2'],
					"contra" => $password
				 );
	echo $Usuario->actualizarAds($datos);
?>