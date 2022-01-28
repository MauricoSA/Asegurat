<?php  
	session_start();
	require_once "../../clases/Conexion.php";
		$c = new Conectar();
		$conexion = $c->conexion();
		$idUsuario = $_SESSION['user'];
		$sql = "SELECT ID,N_CONTRATO,FECHA_CONTRATO,NOMBRE,APP,APM,TELEFONO,CORREO
				FROM usuario 
				WHERE usuario.N_CONTRATO";

		/*$sql = "SELECT ID,N_CONTRATO,FECHA_CONTRATO,NOMBRE,APP,APM,TELEFONO,CORREO,DELEGACIÓN,ID_USUARIO
				FROM domicilio,usuario 
				WHERE domicilio.ID_USUARIO = usuario.ID";*/
		$result = mysqli_query($conexion, $sql);
?>
<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-hover table-striped table-bordered table-dark" id="tablaGDTable">
				<thead>
					<tr style="text-align: justify;">
						<th># Contrato</th>
						<th>Fecha Contrato</th>
						<th>Nombre</th>
						<th>A.P</th>
						<th>A.M</th>
						<th>Telefono</th>
						<th>Correo</th>
						<th>Add-domicilio</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
				<?php  
					while($mostrar = mysqli_fetch_array($result)){
						$idContrato = $mostrar['N_CONTRATO'];
						$id = $mostrar['ID'];
						

				?>
					<tr style="text-align: center;">
						<td><?php echo $mostrar['N_CONTRATO']; ?></td>
						<td><?php echo $mostrar['FECHA_CONTRATO']; ?></td>
						<td><?php echo $mostrar['NOMBRE']; ?></td>
						<td><?php echo $mostrar['APP']; ?></td>
						<td><?php echo $mostrar['APM']; ?></td>
						<td><?php echo $mostrar['TELEFONO']; ?></td>
						<td><?php echo $mostrar['CORREO']; ?></td>
						<td style="text-align: center;">
							<span class="btn btn-info" onclick="obteneridUser('<?php echo $id ?>');" data-toggle="modal" data-target="#ModalAgragarDomicilio">
								<span class="fa fa-home">Agregar domicilio</span>
							</span>
							<span class="btn btn-success" onclick="obteneridDomUser('<?php echo $id ?>');" data-toggle="modal" data-target="#ModalEditDomicilio">
								<span class="fas fa-edit">Actualiza domicilio</span>
							</span>
						</td>
						<!--<td><?php #echo $mostrar['DELEGACIÓN']; ?></td>-->
						<td style="text-align: center;">
							<span class="btn btn-warning btn-sm" 
								onclick="obtenerDatosUsuario('<?php echo $idContrato ?>');"
								data-toggle="modal" data-target="#modalActualizarCategoria">
								<span class="fas fa-edit"></span>
							</span>
						</td>
						<td style="text-align: center;">
							<span class="btn btn-danger btn-sm" 
								onclick="eliminarUs('<?php echo $id ?>');">
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
						<th># Contrato</th>
						<th>Fecha Contrato</th>
						<th>Nombre</th>
						<th>A.P</th>
						<th>A.M</th>
						<th>Telefono</th>
						<th>Correo</th>
						<th>Add-domicilio</th>
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