<?php  
session_start();
require_once "../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();
$idUsuario = $_SESSION['user'];
$sql = "SELECT ID,id_cargo from usuario WHERE usuarios = '$idUsuario'";
		$result = mysqli_query($conexion, $sql);
while($mos = mysqli_fetch_array($result)){
	$id_cargo = $mos['id_cargo'];
	if (isset($_SESSION['user']) && $id_cargo == 1) {
		include "header.php";
?>
<!--jumbotron contenedor-->
<div class="jumbotron">
	<div class="card">
		<div class="card-body">
			<h1 class="display-4">Gestor De Usuarios</h1>
			<div class="row">
				<div class="col-sm-4">
					<span class="btn btn-primary" data-toggle="modal" data-target="#ModalAgragarArchivos">
						<span class="fas fa-plus-circle"></span> Agregar Usuarios
					</span>
				</div>
			</div>
			<hr>
			<hr>
			<div id="tablaU"></div>
		</div>
	</div>
</div>
	
	<!-- Modal Insert Usuario-->
	<div class="modal fade" id="ModalAgragarArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Agregar Usuarios</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!--propiedad para mover archivos del front al back enctype="multipart/form-data"-->
				<div class="modal-body">
					<form id="frmRegistro2" method="POST">
						<!--para validar campos de manera sencilla ocupa required="" dentro del inpuit-->
						<div class="row">
							<div class="col-auto">
								<label>Número De Contrato</label>
								<input type="text" name="N_CONTRATO" id="N_CONTRATO" class="form-control" required=""	>
							</div>
							<div class="col-auto">
								<label>Fecha De Contrato</label>
								<input type="date" name="FECHA_CONTRATO" id="FECHA_CONTRATO" class="form-control" required=""	>
							</div>
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
								<label>Telefono 2 (OPCIONAL)</label>
								<input type="text" name="telefono2" id="telefono2" class="form-control" required="">
							</div>
							<div class="col-auto">
								<label>Telefono 3 (OPCIONAL) </label>
								<input type="text" name="telefono3" id="telefono3" class="form-control">
							</div>
							<div class="col-auto">
								<label>Email o Correo</label>
								<input type="email" name="Correo" id="Correo" class="form-control" required="">
							</div>
							<div class="col-auto">
								<label>Nombre De usuario</label>
								<input type="text" name="Usuario" id="Usuario" class="form-control" required="">
							</div>
							<div class="col-auto">
								<label>Password o Contraseña</label>
								<input type="password" name="password" id="password" class="form-control" required="" autocomplete="off">
								<input type="hidden" name="ID_CARGO" id="ID_CARGO" value="2">
							</div>
						</div>
						<br>
						<br>
					</form>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" id="btnGuardarUsuario">Guardar</button>
				</div>
				</div>
			</div>	
		</div>
	</div>
	<!-- Modal Insert Domicilio-->
	<div class="modal fade" id="ModalAgragarDomicilio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Agregar Domicilio</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!--propiedad para mover archivos del front al back enctype="multipart/form-data"-->
				<div class="modal-body">
					<form id="frmDom" method="post">
						<input type="text" name="IUSER" id="IUSER" hidden>
						<!--para validar campos de manera sencilla ocupa required="" dentro del inpuit-->
						<div class="row">
							<div class="col-auto">
								<label>Calle</label>
								<input type="text" name="calle" id="calle" class="form-control" required=""	>
							</div>
							<div class="col-auto">
								<label>Manzana</label>
								<input type="text" name="manzana" id="manzana" class="form-control" required=""	>
							</div>
							<div class="col-auto">
								<label>Lote</label>
								<input type="text" name="lote" id="lote" class="form-control" required="">
							</div>
							<div class="col-auto">
								<label>Delegación</label>
								<select name="del" id="del" class="form-control" required="">
								  <option value="Tláhuac">Tláhuac</option>
								  <option value="Iztapalapa">Iztapalapa</option>
								</select>
							</div>
						</div>
						<br>
						<br>
					</form>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" id="btnGuardarDirec">Guardar</button>
				</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal editar Domicilio-->
	<div class="modal fade" id="ModalEditDomicilio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Agregar Domicilio</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!--propiedad para mover archivos del front al back enctype="multipart/form-data"-->
				<div class="modal-body">
					<form id="frmDom2" method="post">
						<input type="text" name="IUSER2" id="IUSER2" hidden>
						<!--para validar campos de manera sencilla ocupa required="" dentro del inpuit-->
						<div class="row">
							<div class="col-auto">
								<label>Calle</label>
								<input type="text" name="calle2" id="calle2" class="form-control" required=""	>
							</div>
							<div class="col-auto">
								<label>Manzana</label>
								<input type="text" name="manzana2" id="manzana2" class="form-control" required=""	>
							</div>
							<div class="col-auto">
								<label>Lote</label>
								<input type="text" name="lote2" id="lote2" class="form-control" required="">
							</div>
							<div class="col-auto">
								<label>Delegación</label>
								<select name="del2" id="del2" class="form-control" required="">
								  <option value="Tláhuac">Tláhuac</option>
								  <option value="Iztapalapa">Iztapalapa</option>
								</select>
							</div>
						</div>
						<br>
						<br>
					</form>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" id="btnActDirec">Guardar</button>
				</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal editar -->

	<div class="modal fade" id="modalActualizarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog " role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Editar Usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmActualizaUsuario">
						<!--para validar campos de manera sencilla ocupa required="" dentro del input-->
						<div class="row">
							<input type="text" name="IDU" id="IDU" hidden>
							<div class="col-auto">
								<label>Número De Contrato</label>
								<input type="text" name="N_CONTRATO2" id="N_CONTRATO2" class="form-control" readonly>
							</div>
							<div class="col-auto">
								<label>Fecha De Contrato</label>
								<input type="date" name="FECHA_CONTRATO2" id="FECHA_CONTRATO2" class="form-control">
							</div>
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
								<label>Telefono 2 (OPCIONAL)</label>
								<input type="text" name="telefono2_1" id="telefono2_1" class="form-control">
							</div>
							<div class="col-auto">
								<label>Telefono 3 (OPCIONAL) </label>
								<input type="text" name="telefono3_1" id="telefono3_1" class="form-control">
							</div>
							<div class="col-auto">
								<label for="Mail">Email o Correo</label>
								<input type="email" name="Mail" id="Mail" class="form-control">
							</div>
							<div class="col-auto">
								<label for="us">Nombre De usuario</label>
								<input type="text" name="us" id="us" class="form-control">
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
					<button type="button" class="btn btn-danger" data-dismiss="modal" 
					id="btnCerrarUpadateCategoria">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizaUsuario">Actualizar</button>
				</div>
				</div>
			</div>
		</div>
	</div>
<?php 
	include "footer.php";
?>
<script src="../js/usuarios.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaU').load("FUsers/tablaU.php");

			$('#btnGuardarUsuario').click(function(){
				agregarUsuario();
			});
			$('#btnGuardarDirec').click(function(){
				addAddres();
			});
		});
		$('#btnActualizaUsuario').click(function(){
				actualizaUsuario();
			});	
		$('#btnActDirec').click(function(){
				actualizaDom();
			});	
</script>
	<?php 
	} else {
		header("location:../index.php");
	}
}
?>