<?php  
	session_start();
	require_once "../../clases/Usuario.php";
	$password = sha1($_POST['password']);
	$Usuario = new Usuario();

	$datos = array(
					"Nombre"=>$_POST['Nombre'],
					"APP"=>$_POST['APP'],
					"APM"=>$_POST['APM'],
					"TELEFONO"=>$_POST['TELEFONO'],
					"Usuario"=>$_POST['Usuario'],
					"Correo"=>$_POST['Correo'],
					"password"=>$password,
					"ID_CARGO"=>$_POST['ID_CARGO']
			);
	
	echo $Usuario->agregarAdm($datos);


?>