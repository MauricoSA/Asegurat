<?php  
	session_start();
	require_once "../../clases/Conexion.php";
		$c = new Conectar();
		$conexion = $c->conexion();
		$idUsuario = $_SESSION['user'];
		
		$sql = "SELECT ID_PAGOS,ID_USUARIO,FOLIO,CONCEPTO,NUMERO_SERIE,FECHA,HORA,RUTA
				FROM
				 pagos 
				 INNER JOIN 
				 usuario ON pagos.ID_USUARIO = usuario.ID 
				 AND
				 usuario.usuarios = '$idUsuario'";
		$result = mysqli_query($conexion, $sql);
?>
<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-hover table-striped table-bordered table-dark" id="tablaGDTable">
				<thead>
					<tr style="text-align: justify;">
						<th>Numero de pago</th>
						<th>Folio</th>
						<th>Concepto</th>
						<th>Numero de serie</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Imagen</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
				<?php  
					while($mostrar = mysqli_fetch_array($result)){
						$IDP = $mostrar['ID_PAGOS'];

				?>
					<tr style="text-align: center;">

						<td><?php echo $mostrar['ID_PAGOS']; ?></td>
						<td><?php echo $mostrar['FOLIO']; ?></td>
						<td><?php echo $mostrar['CONCEPTO']; ?></td>
						<td><?php echo $mostrar['NUMERO_SERIE']; ?></td>
						<td><?php echo $mostrar['FECHA']; ?></td>
						<td><?php echo $mostrar['HORA']; ?></td>
						<td><img src="<?php echo substr($mostrar['RUTA'], 3) ?>" alt="" srcset="" width="100px" height="100px"></td>
						<td style="text-align: center;">
							<span class="btn btn-warning btn-sm" onclick="obtenerDatosP('<?php echo $IDP ?>');" data-toggle="modal" data-target="#modalActualizarP">
								<span class="fas fa-edit"></span>
							</span>
						</td>
						<!--
						<td style="text-align: center;">
							<form action="../procesos/pagos/edit.php" method="POST">
								<input type="hidden" name="edit_P" value="<?php echo $IDP?>">
								<button type="submit" name="Editbtn" class="btn btn-warning"><span class="fas fa-edit"></span></button>
							</form>
						</td>-->
						<td style="text-align: center;">
							
							<span class="btn btn-danger btn-sm" 
								onclick="eliminarPs('<?php echo $IDP ?>');">
								<span class="far fa-trash-alt"></span>
							</span>
						</td>
					</tr>
				<?php  
					}
				?>
				</tbody>
				<tfoot>
					<tr style="text-align: justify;">
						<th>Numero de pago</th>
						<th>Folio</th>
						<th>Concepto</th>
						<th>Numero de serie</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Imagen</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaGDTable').DataTable(); 
	});
</script>