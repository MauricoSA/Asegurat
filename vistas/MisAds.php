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
	if (isset($_SESSION['user']) && $id_cargo == 1) {
	include "header.php";
	?>
	<!--jumbotron contenedor-->
	<div class="jumbotron">
		<div class="card">
			<div class="card-body">
				<h1 class="display-4">Gestor De Administradores</h1>
				<div class="row">
					<div class="col-sm-4">
						<span class="btn btn-primary" data-toggle="modal" data-target="#ModalAgragarArchivos">
							<span class="fas fa-plus-circle"></span> Agregar Administrador
						</span>
					</div>
				</div>
				<hr>
				<hr>
				<div id="tablaA"></div>
			</div>
		</div>
	</div>
	
	<!-- Modal Agregar Admin-->
	<div class="modal fade" id="ModalAgragarArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Agregar Administradores</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!--propiedad para mover archivos del front al back enctype="multipart/form-data"-->
				<div class="modal-body">
					<form id="frmRegistro" method="post">

						<!--para validar campos de manera sencilla ocupa required="" dentro del inpuit-->
						<div class="row">
							<div class="col-auto">
								<label>Nombre</label>
								<input type="text" name="Nombre" id="Nombre" class="form-control" required="">
							</div>
							<div class="col-auto">
								<label>Apellido Paterno</label>
								<input type="text" name="APP" id="APP" class="form-control" required="">
							</div>
							<div class="col-auto">
								<label>Apellido Materno</label>
								<input type="text" name="APM" id="APM" class="form-control" required="">
							</div>
							<div class="col-auto">
								<label>Telefono</label>
								<input type="text" name="TELEFONO" id="TELEFONO" class="form-control" required="">
							</div>
							<div class="col-auto">
								<label>Nombre De usuario</label>
								<input type="text" name="Usuario" id="Usuario" class="form-control" required="">
							</div>
							<div class="col-auto">
								<label>Email o Correo</label>
								<input type="email" name="Correo" id="Correo" class="form-control" required="">
							</div>
							<div class="col-auto">
								<label>Password o Contraseña</label>
								<input type="password" name="password" id="password" class="form-control" required="" autocomplete="off">
								<input type="hidden" name="ID_CARGO" id="ID_CARGO" value="1">
							</div>
						</div>
						<br>
						<br>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" id="btnAgregarAD">Guardar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal editar -->

	<div class="modal fade" id="modalActualizarAds" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog " role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Editar Administradores</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmEditarA" >
						<!--para validar campos de manera sencilla ocupa required="" dentro del inpuit-->
						<div class="row">
							<input type="text" name="idA" id="idA" hidden>
							<div class="col-auto">
								<label>Nombre</label>
								<input type="text" name="Nombre2" id="Nombre2" class="form-control">
							</div>
							<div class="col-auto">
								<label>Apellido Paterno</label>
								<input type="text" name="APP2" id="APP2" class="form-control">
							</div>
							<div class="col-auto">
								<label>Apellido Materno</label>
								<input type="text" name="APM2" id="APM2" class="form-control">
							</div>
							<div class="col-auto">
								<label>Telefono</label>
								<input type="text" name="TELEFONO2" id="TELEFONO2" class="form-control">
							</div>
							<div class="col-auto">
								<label>Nombre De usuario</label>
								<input type="text" name="Usuario2" id="Usuario2" class="form-control">
							</div>
							<div class="col-auto">
								<label>Email o Correo</label>
								<input type="email" name="Correo2" id="Correo2" class="form-control">
							</div>
							<div class="col-auto">
								<label>Password o Contraseña ¿Quiere modificarla?</label>
								<input type="password" name="password2" id="password2" class="form-control" autocomplete="off">
							</div>
					</div>
					<br>
					<br>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" 
				id="btnCerrarUpadateCategoria">Cerrar</button>
				<button type="button" class="btn btn-warning" id="btnActualizaUsuario">Actualizar</button>
			</div>
		</div>
	</div>
</div>
<?php 
include "footer.php";
?>
<!--Todas las dependencias de funciones de las Categorias-->
<script src="../js/usuarios.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaA').load("FUsers/tablaA.php");
		$('#btnAgregarAD').click(function(){
			agregarAdm();
		});
	});
	$('#btnActualizaUsuario').click(function(){
			actualizarAds();
		});
</script>
	<?php 
	} else {
		header("location:../index.php");
	}
}	
?>