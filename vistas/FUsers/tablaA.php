<?php  
	session_start();
	require_once "../../clases/Conexion.php";
		$c = new Conectar();
		$conexion = $c->conexion();
		$idUsuario = $_SESSION['user'];
		$sql = "SELECT ID,NOMBRE,APP,APM,TELEFONO,usuarios,CORREO,pass
				FROM usuario 
				WHERE usuario.id_cargo = 1";
		$result = mysqli_query($conexion, $sql);
?>
<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-hover table-striped table-bordered table-dark" id="tablaGDTable">
				<thead>
					<tr style="text-align: justify;">
						<th>Id</th>
						<th>Nombre</th>
						<th>A.P</th>
						<th>A.M</th>
						<th>Telefono</th>
						<th>Usuario</th>
						<th>Correo</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
				<?php  
					while($mostrar = mysqli_fetch_array($result)){
						$idA = $mostrar['ID'];

				?>
					<tr style="text-align: center;">
						<td><?php echo $mostrar['ID']; ?></td>
						<td><?php echo $mostrar['NOMBRE']; ?></td>
						<td><?php echo $mostrar['APP']; ?></td>
						<td><?php echo $mostrar['APM']; ?></td>
						<td><?php echo $mostrar['TELEFONO']; ?></td>
						<td><?php echo $mostrar['usuarios']; ?></td>
						<td><?php echo $mostrar['CORREO']; ?></td>
						<td style="text-align: center;">
							<span class="btn btn-warning btn-sm" onclick="obtenerDatosA('<?php echo $idA ?>');" data-toggle="modal" data-target="#modalActualizarAds">
								<span class="fas fa-edit"></span>
							</span>
						</td>
						<td style="text-align: center;">
							<span class="btn btn-danger btn-sm" 
								onclick="eliminarAds('<?php echo $idA ?>');">
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
						<th>Id</th>
						<th>Nombre</th>
						<th>A.P</th>
						<th>A.M</th>
						<th>Telefono</th>
						<th>Usuario</th>
						<th>Correo</th>
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