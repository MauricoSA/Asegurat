<?php  
	require_once "Conexion.php";
	class Usuario extends Conectar{
		public function login($user,$pass){
			$conexion = Conectar::conexion();
			$sql = "SELECT count(*) as existeUser
					FROM usuario
					WHERE usuarios = '$user'
					AND pass = '$pass'";
			$result = mysqli_query($conexion, $sql);
			$respuesta = mysqli_fetch_array($result)['existeUser'];
			if ($respuesta > 0) { 
				$_SESSION['user'] = $user;
				$sql = "SELECT id_cargo
						FROM usuario
						WHERE usuarios = '$user'
						AND pass = '$pass'";
			$result = mysqli_query($conexion, $sql);
			$id_cargo = mysqli_fetch_array($result)[0];
			$_SESSION['id_cargo'] = $id_cargo;
			$c = $_SESSION['id_cargo'];

			return $c;
			} else{
				return 0;
			}

		}

		public function agregarAdm($datos){

			$conexion = Conectar::conexion();
			if (self::buscarUsarioRepetido($datos['Usuario'])) {
				return 2;
			} else{
				$sql = "INSERT INTO usuario(
											NOMBRE,
											APP,
											APM,
											TELEFONO,
											usuarios,
											CORREO,
											pass,
											id_cargo) 
						VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
				$query = $conexion->prepare($sql);
				$query->bind_param("sssssssi", $datos['Nombre'],
												$datos['APP'],
												$datos['APM'],
												$datos['TELEFONO'],
												$datos['Usuario'],
												$datos['Correo'],
												$datos['password'],
												$datos['ID_CARGO']);
				$respuesta = $query->execute();
				$query->close();
				return $respuesta;
			}
		}

		public function buscarUsarioRepetido($user) {
			$conexion = Conectar::conexion();

			$sql = "SELECT usuarios
					FROM usuario 
					WHERE usuarios = '$user'";
			$result = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);

			if(isset($datos['usuarios']) != '' || isset($datos['usuarios']) == $user) {
				return 1;
			} 
		}

		public function obtenerUsuario($idContrato){
			$conexion = Conectar::conexion();
			$sql = "SELECT N_CONTRATO, FECHA_CONTRATO 
						FROM usuario
						WHERE N_CONTRATO = '$idContrato'";
			$result = mysqli_query($conexion,$sql);
			$users = mysqli_fetch_array($result);
			$datos = array(
							"idContrato"=> $users['N_CONTRATO'],
							"fechaContrato"=> $users['FECHA_CONTRATO']
						);
			return $datos;

		}
		public function obtenerAds($idA){
			$conexion = Conectar::conexion();
			$sql = "SELECT ID,NOMBRE,APP,APM,TELEFONO,usuarios,CORREO, pass
				FROM usuario 
				WHERE ID= '$idA'";
			$result = mysqli_query($conexion,$sql);
			$ads = mysqli_fetch_array($result);
			$datos = array(
							"idA"=> $ads['ID'],
							"nombre" => $ads['NOMBRE'],
							"app" => $ads['APP'],
							"apm" => $ads['APM'],
							"tel" => $ads['TELEFONO'],
							"user" => $ads['usuarios'],
							"email" => $ads['CORREO'],
							"Pass" => $ads['pass']
						);
			return $datos;

		}
		public function actualizarAds($datos){
			$conexion = Conectar::conexion();
			$sql = "UPDATE usuario 
					SET NOMBRE = ?,
						APP = ?,
						APM = ?,
						TELEFONO = ?,
						usuarios = ?,
						CORREO = ?,
						pass = ?
					WHERE ID = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param("sssssssi", 
									 $datos['NOMBRE'],
									 $datos['APP'],
									 $datos['APM'],
									 $datos['TELEFONO'],
									 $datos['Usuarios'],
									 $datos['CORREO'],
									 $datos['contra'],
									 $datos['idA']
								);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}
		public function eliminarAds($idA){
			$conexion = Conectar::conexion();
			$sql = "DELETE FROM usuario 
							WHERE ID =  ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idA);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta; 
		}
	}
?>