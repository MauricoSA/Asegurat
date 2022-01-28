<?php  
	require_once"Conexion.php";
	class Pagos extends Conectar{
		public function agregaPago($datos){
			$conexion = Conectar::conexion();
			$sql = "INSERT INTO pagos(ID_USUARIO,
									  FOLIO,
									  CONCEPTO,
									  NUMERO_SERIE,
									  FECHA,
									  HORA,
									  IMG,
									  tipo,
									  ruta)
					VALUES(?,?,?,?,?,?,?,?,?)";
			$query = $conexion->prepare($sql);
			$query->bind_param("issssssss", $datos['U'],
											$datos['Folio'],
											$datos['C'],
											$datos['N'],
											$datos['F'],
											$datos['H'],
											$datos['I'],
											$datos['T'],
											$datos['R']);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}
		public function obtenerP($IDP){
			$conexion = Conectar::conexion();
			$sql = "SELECT *
				FROM pagos 
				WHERE ID_PAGOS= '$IDP'";
			$result = mysqli_query($conexion,$sql);
			$ads = mysqli_fetch_array($result);
			$datos = array(
							"id"=> $ads['ID_PAGOS'],
							"folio" => $ads['FOLIO'],
							"concepto" => $ads['CONCEPTO'],
							"nserie" => $ads['NUMERO_SERIE'],
							"fecha" => $ads['FECHA'],
							"hora" => $ads['HORA'],
							"ruta"=>$ads['ruta']
							
						);
			return $datos;

		}
		public function actualizaPago($datos2){
			$conexion = Conectar::conexion();
			$sql = "UPDATE pagos 
					SET FOLIO = ?,
						CONCEPTO = ?,
						NUMERO_SERIE = ?,
						FECHA = ?,
						HORA = ?,
						IMG = ?,
						tipo = ?,
						ruta=?
					WHERE ID_PAGOS = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param("ssssssssi", 
										$datos2['F'],
										$datos2['C'],
										$datos2['N'],
										$datos2['Fe'],
										$datos2['H'],
										$datos2['I'],
										$datos2['T'],
										$datos2['R'],
										$datos2['Id2']
								);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}
		public function EliminarP($IDP){
			$conexion = Conectar::conexion();
			$sql = "DELETE FROM pagos 
							WHERE ID_PAGOS =  ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $IDP);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta; 
		}
	}
?>