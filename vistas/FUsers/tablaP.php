<?php  
session_start();
require_once "../../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();
$idUsuario = $_SESSION['user'];
$sql = "SELECT ID,N_CONTRATO,FECHA_CONTRATO,NOMBRE,APP,APM,DELEGACIÓN 
FROM domicilio,usuario 
WHERE domicilio.ID_USUARIO = usuario.ID";
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
						<th>Delegacion</th>
						<th>Ver Pagos</th>
					</tr>
				</thead>
				<tbody>
					<?php  
					while($mostrar = mysqli_fetch_array($result)){
						$idContrato = $mostrar['N_CONTRATO'];

						?>
						<tr style="text-align: center;">
							<td><?php echo $mostrar['N_CONTRATO']; ?></td>
							<td><?php echo $mostrar['FECHA_CONTRATO']; ?></td>
							<td><?php echo $mostrar['NOMBRE']; ?></td>
							<td><?php echo $mostrar['APP']; ?></td>
							<td><?php echo $mostrar['APM']; ?></td>
							<td><?php echo $mostrar['DELEGACIÓN']; ?></td>
							<td style="text-align: center;">
								<span class="btn btn-info btn-sm">
									<form action="PDFs/Pdf.php" method="post">
										<input name="id" type="text" value="<?php echo $mostrar['ID']; ?>" hidden>
										<input name="UserN" type="text" value="<?php echo $mostrar['NOMBRE'];?>" hidden>
										<input name="UserPP" type="text" value="<?php echo $mostrar['APM'];?>" hidden>
										<input name="UserPM" type="text" value="<?php echo $mostrar['APM'];?>" hidden>
										<input type="submit" value="Ver">
									</form>
									<span class="fa fa-book"></span>
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
						<th>Delegacion</th>
						<th>Ver Pagos</th>
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