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
	<div class="jumbotron">
		<div class="row row-cols-1 row-cols-md-3 g-4">
			<div class="col">
				<div class="card h-100">
					<img src="../img/admin.png" class="card-img-top" alt="admin">
					<div class="card-body">
						<center>
							<h5 class="card-title">Registar Administradores</h5>
							<p class="card-text"><a href="MisAds.php" type="button" class="btn btn-success">Registar</a></p>
						</center>
					</div>
				</div>
			</div>
			
			<div class="col">
				<div class="card h-100">
					<img src="../img/logo2.png"  class="card-img-top" alt="user" >
					<div class="card-body">
						<center>
							<h5 class="card-title">Agregar Usuarios</h5>
							<p class="card-text"><a href="MisUsuarios.php" type="button" class="btn btn-success">Agregar</a></p>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php 
	include "footer.php";
	} else {
	header("location:../index.php");
	}
}
?>