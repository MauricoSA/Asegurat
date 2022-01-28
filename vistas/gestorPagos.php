<?php  
session_start();
require_once "../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();
$idUsuario = $_SESSION['user'];
$sql = "SELECT ID,id_cargo from usuario WHERE usuarios = '$idUsuario'";
$result = mysqli_query($conexion, $sql);
while($mostrar = mysqli_fetch_array($result)){
	$id_cargo = $mostrar['id_cargo'];
	if (isset($_SESSION['user']) && $id_cargo == 2) {
		include "headerU.php";
	?>

	<!--jumbotron contenedor-->
	
	<div class="jumbotron jumbotron-fluid">
		<div class="card">
			<div class="container">
				<font face="Times">
					<center><h1 class="display-4">Gestor De Pagos</h1></center>
				</font>
				<div class="row">
					<div class="col-sm-4">
						<span class="btn btn-primary" data-toggle="modal" data-target="#ModalAgregarPago">
							<span class="fa fa-check-circle"></span> Agregar Pago <span class="fa fa-university "></span>
						</span>
					</div>
				</div>
				<hr>
				<hr>
				<div id="tablaG"></div>
			</div>
		</div>
	</div>
	
	<!-- Modal Agregar pago-->
	<div class="modal fade" id="ModalAgregarPago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Agregar Pago</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!--propiedad para mover archivos del front al back enctype="multipart/form-data"-->
				<div class="modal-body">
					<form id="frmPago" method="POST">

						<!--para validar campos de manera sencilla ocupa required="" dentro del inpuit-->
						<center><h3>Datos del pago</h3></center>
						<p>
							
						</p>
					
						<div class="col-auto">
							<input type="hidden" class="form-control" name="Id" id="Id" value="<?php echo $mostrar['ID']; ?>" />
						</div>
						
						<div class="col-auto">
							<label for="Folio" class="form-label"> Folio de pago: </label>
							<input type="text" class="form-control" name= "Folio" id="Folio" placeholder="Folio" required="required">
						</div>
						<div class="col-auto">
							<label for="concepto" class="form-label">Concepto: </label>
							<input type="text" class="form-control" name= "concepto" id="concepto" placeholder="Concepto" required="required">
						</div>
						<div class="col-auto">
							<label for="Nserie" class="form-label"> Numero de serie: </label>
							<input type="text" class="form-control" name= "Nserie" id="Nserie" placeholder="Numero de serie" required="required">
						</div>  
						<div class="col-auto">
							<label for="fecha" class="form-label"> Fecha: </label>
							<input type="date" class="form-control" name= "fecha" id="fecha" placeholder="Fecha" required="required">
						</div>
						<div class="col-auto">
							<label for="Hora" class="form-label"> Hora: </label>
							<input type="time" class="form-control" name= "Hora" id="Hora" placeholder="Hora" required="required">
						</div>
						
						<br>
						<label>Selecciona Imagen de pago</label>
						<input type="file" name="archivos[]" id="archivos[]" class="form-control" multiple="" required="required">
						<br>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" id="btnAgregarPa">Guardar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal editar -->

	<div class="modal fade" id="modalActualizarP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog " role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Editar Pago</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmPagoEdit">

						<!--para validar campos de manera sencilla ocupa required="" dentro del inpuit-->
						<center><h3>Datos del pago</h3></center>
						<p>
							
						</p>
						<div class="col-auto">
							<input type="text" class="form-control" name="Id2" id="Id2" hidden>
						</div>
						<div class="col-auto">
							<label for="Folio" class="form-label"> Folio de pago: </label>
							<input type="text" class="form-control" name= "Folio2" id="Folio2" placeholder="Folio" required=""/>
						</div>
						<div class="col-auto">
							<label for="concepto" class="form-label">Concepto: </label>
							<input type="text" class="form-control" name= "concepto2" id="concepto2" placeholder="Concepto" required/>
						</div>
						<div class="col-auto">
							<label for="Nserie" class="form-label"> Numero de serie: </label>
							<input type="text" class="form-control" name= "Nserie2" id="Nserie2" placeholder="Numero de serie" required/>
						</div>  
						<div class="col-auto">
							<label for="fecha" class="form-label"> Fecha: </label>
							<input type="date" class="form-control" name= "fecha2" id="fecha2" placeholder="Fecha" required/>
						</div>
						<div class="col-auto">
							<label for="Hora" class="form-label"> Hora: </label>
							<input type="time" class="form-control" name= "Hora2" id="Hora2" placeholder="Hora" required/>
						</div>
						
						
						<label>Selecciona Imagen de pago</label>
						<input type="file" name="archivos[]" id="archivos[]" class="form-control" multiple="">
						
					</form>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" 
					id="btnCerrarUpadateCategoria">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizaPago">Actualizar</button>
				</div>
			</div>
		</div>
	</div>

	<?php 
	include "footer.php";
	?>
	<!--Todas las dependencias de funciones de las Categorias-->
	<script src="../js/pagos.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaG').load("FUsers/tablaG.php");
			$('#btnAgregarPa').click(function(){
				agregarPa();
			});
		});
		$('#btnActualizaPago').click(function(){
			actualizaPago();
		});
		
	</script>
	<?php 
	} else {
		header("location:../index.php");
	}
}
?>