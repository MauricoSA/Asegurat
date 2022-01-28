<?php  
session_start();
require_once "../../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();
$idUsuario = $_SESSION['user'];
if (isset($_SESSION['user'])) {

	?>
	<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap4/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../../librerias/fontawesome/css/all.css"> 
	<link rel="stylesheet" type="text/css" href="../../librerias/datatable/dataTables.bootstrap4.min.css">

	<div class="container-fluid">
		<div class="card shadow mb-4">
			<div class="card-header">
				<center><h3>Datos del pago</h3></center>
			</div>
			<div class="card-body">
				<?php 
				if (isset($_POST['Editbtn'])) 
				{
					$id = $_POST['edit_P'];
					$sql = "SELECT * from pagos WHERE ID_PAGOS = '$id'";
					$result = mysqli_query($conexion, $sql);
					foreach ($result as $datos) 
					{

						?>
						<form id="frmPagoEdit" action="" method="POST" enctype="multipart/form-data">
							<div class="col-auto">
								<input type="text" class="form-control" name="Id2" id="Id2" value="<?php echo $datos['ID_PAGOS'] ?>">
							</div>
							<div class="col-auto">
								<label for="Folio" class="form-label"> Folio de pago: </label>
								<input type="text" class="form-control" name= "Folio2" id="Folio2" value="<?php echo $datos['FOLIO'] ?>" required=""/>
							</div>
							<div class="col-auto">
								<label for="concepto" class="form-label">Concepto: </label>
								<input type="text" class="form-control" name= "concepto2" id="concepto2" value="<?php echo $datos['CONCEPTO'] ?>" required/>
							</div>
							<div class="col-auto">
								<label for="Nserie" class="form-label"> Numero de serie: </label>
								<input type="text" class="form-control" name= "Nserie2" id="Nserie2" value="<?php echo $datos['NUMERO_SERIE'] ?>" required/>
							</div>  
							<div class="col-auto">
								<label for="fecha" class="form-label"> Fecha: </label>
								<input type="date" class="form-control" name= "fecha2" id="fecha2" value="<?php echo $datos['FECHA'] ?>" required/>
							</div>
							<div class="col-auto">
								<label for="Hora" class="form-label"> Hora: </label>
								<input type="time" class="form-control" name= "Hora2" id="Hora2" value="<?php echo $datos['HORA'] ?>" required/>
							</div>

							<div class="col-auto">
								<label>Selecciona Imagen de pago</label>
								<input type="file" name="archivos2" id="archivos2" class="form-control" value="<?php echo $datos['ruta'] ?>" required="">
							</div>
							<br>
							<div class="col-auto">
								<a href="http://localhost/Segurate/vistas/gestorPagos.php" class="btn btn-danger">Cancelar</a>
								<button type="button" class="btn btn-success" id="btnActualizaPago">Actualizar</button>
							</div>
						<!--<br>
									<label>Selecciona Imagen de pago</label>
									<input type="file" name="archivos2[]" id="archivos2[]" class="form-control" multiple="">
									<br>-->
								</form>
								<?php
							}
						}

						?>

					</div>
				</div>
			</div>
			<script src="../../librerias/jquery-3.5.1.min.js"></script>
			<script src="../../librerias/bootstrap4/popper.min.js"></script>
			<script src="../../librerias/bootstrap4/bootstrap.min.js"></script>
			<script src="../../librerias/sweetalert.min.js"></script>
			<script src="../../librerias/datatable/jquery.dataTables.min.js"></script>
			<script src="../../librerias/datatable/dataTables.bootstrap4.min.js"></script>
			<?php 
		} else {
			header("location:../index.php");
		}
	?>