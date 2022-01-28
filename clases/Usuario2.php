<?php  
	require_once "Conexion.php";
	class Usuario2 extends Conectar{
		public function agregarUsu($datos){

			$conexion = Conectar::conexion();
			if (self::buscarUsarioRepetido($datos['UsuarioS'])) {
				return 2;
			} else{
				$sql = "INSERT INTO usuario(
											N_CONTRATO,
					                        FECHA_CONTRATO,
											NOMBRE,
											APP,
											APM,
											TELEFONO,
											Telefono2,
											Telefono3,
											usuarios,
											CORREO,
											pass,
											id_cargo) 
						VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$query = $conexion->prepare($sql);
				$query->bind_param("issssssssssi", 
												$datos['N_CONTRATOS'],
												$datos['FECHA_CONTRATOS'],
												$datos['NombreS'],
												$datos['APPS'],
												$datos['APMS'],
												$datos['TELEFONOS'],
												$datos['telefono2S'],
												$datos['telefono3S'],
												$datos['UsuarioS'],
												$datos['CorreoS'],
												$datos['passwordS'],
												$datos['ID_CARGOS']
											);
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
		public function obtenerID($id){
			$conexion = Conectar::conexion();
			$sql = "SELECT ID FROM usuario 
				WHERE ID = '$id'";
			$result = mysqli_query($conexion,$sql);
			$ads = mysqli_fetch_array($result);
			$datos = array(
							"id" => $ads['ID']
						);
			return $datos;

		}
		public function agregarDom($datos){
			$conexion = Conectar::conexion();
			$sql = "INSERT INTO domicilio(CALLE,
										 N_EXTERIOR,
										 N_INTERIOR,
										 DELEGACIÓN,
										 ID_USUARIO)
					VALUES(?,?,?,?,?)";
			$query = $conexion->prepare($sql);
			$query->bind_param("ssssi", $datos['calle'],
										$datos['manzana'],
										$datos['lote'],
										$datos['del'],
										$datos['Id_u']);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;

		}
		public function obtenerDom($id){
			$conexion = Conectar::conexion();
			$sql = "SELECT CALLE,N_EXTERIOR,N_INTERIOR,DELEGACIÓN,ID_USUARIO
					FROM domicilio 
					WHERE ID_USUARIO = '$id'";
			$result = mysqli_query($conexion,$sql);
			$ads = mysqli_fetch_array($result);
			$datos = array(
							"C" => $ads['CALLE'],
							"NE" => $ads['N_EXTERIOR'],
							"NI" => $ads['N_INTERIOR'],
							"DEL" => $ads['DELEGACIÓN'],
							"ID_US" => $ads['ID_USUARIO'],
						);
			return $datos;

		}
		public function actualizaDom($datos){
			$conexion = Conectar::conexion();
			$sql = "UPDATE domicilio 
					SET CALLE = ?,
						N_EXTERIOR = ?,
						N_INTERIOR = ?,
						DELEGACIÓN = ?
					WHERE ID_USUARIO = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param("ssssi", 
									 $datos['calle'],
									 $datos['manzana'],
									 $datos['lote'],
									 $datos['del'],
									 $datos['Id_u']
								);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}
		
		public function obtenerUS($idContrato){
			$conexion = Conectar::conexion();
			$sql = "SELECT ID,N_CONTRATO,FECHA_CONTRATO,NOMBRE,APP,APM,TELEFONO,Telefono2,Telefono3,usuarios,CORREO,pass
				FROM usuario 
				WHERE N_CONTRATO= '$idContrato'";
			$result = mysqli_query($conexion,$sql);
			$ads = mysqli_fetch_array($result);
			$datos = array(
							"id" => $ads['ID'],
							"idContrato"=> $ads['N_CONTRATO'],
							"FC" => $ads['FECHA_CONTRATO'],
							"nombre" => $ads['NOMBRE'],
							"APP" => $ads['APP'],
							"APM" => $ads['APM'],
							"TEL" => $ads['TELEFONO'],
							"Tel2" => $ads['Telefono2'],
							"Tel3" => $ads['Telefono3'],
							"Us" => $ads['usuarios'],
							"correo" => $ads['CORREO'],
							"pass" => $ads['pass']
						);
			return $datos;

		}
		public function actualizarUS($datos){
			$conexion = Conectar::conexion();
			$sql = "UPDATE usuario 
					SET N_CONTRATO = ?,
						FECHA_CONTRATO = ?,
						NOMBRE = ?,
						APP = ?,
						APM = ?,
						TELEFONO = ?,
						Telefono2 = ?,
						Telefono3 = ?,
						usuarios = ?,
						CORREO = ?,
						pass = ?
					WHERE ID = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param("sssssssssssi", 
									 $datos['Nc'],
									 $datos['Fc'],
									 $datos['N'],
									 $datos['AP'],
									 $datos['AM'],
									 $datos['TEl'],
									 $datos['TEl2'],
									 $datos['TEl3'],
									 $datos['User'],
									 $datos['Email'],
									 $datos['pass'],
									 $datos['idU']
								);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}
		public function eliminarUs($id){
			$conexion = Conectar::conexion();
			$sql = "DELETE FROM usuario 
							WHERE ID =  ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $id);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta; 
		}

	}
?>