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
	<div class="jumbotron jumbotron-fluid">
		<div class="card">
			<div class="container">
				<h1 class="display-4">Ver Pagos De Usuarios</h1>
				<hr>
				<hr>
				<div id="tablaP"></div>
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
			$('#tablaP').load("FUsers/tablaP.php");
			$('#btnAgregarPa').click(function(){
				agregarPa();
			});
		});
		$('#btnActualizaPago').click(function(){
			actualizaPago();
		});
		$('#PDF').load("");
		
	</script>
	<?php 
	} else {
		header("location:../index.php");
	}
}	
?>