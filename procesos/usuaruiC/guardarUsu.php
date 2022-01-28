<?php  
	session_start();
	require_once "../../clases/Usuario2.php";
	$password = sha1($_POST['password']);
	$Usuario2 = new Usuario2();

	$datos = array(
					"N_CONTRATOS"=>$_POST['N_CONTRATO'],
					"FECHA_CONTRATOS"=>$_POST['FECHA_CONTRATO'],
					"NombreS"=>$_POST['Nombre'],
					"APPS"=>$_POST['APP'],
					"APMS"=>$_POST['APM'],
					"TELEFONOS"=>$_POST['TELEFONO'],
					"telefono2S"=>$_POST['telefono2'],
					"telefono3S"=>$_POST['telefono3'],
					"CorreoS"=>$_POST['Correo'],
					"UsuarioS"=>$_POST['Usuario'],
					"passwordS"=>$password,
					"ID_CARGOS"=>$_POST['ID_CARGO']
			);
	
	echo $Usuario2->agregarUsu($datos);


?>