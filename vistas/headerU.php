<!DOCTYPE html>
<html>
<head>
	<title>AseguraT</title>
	<!--bootstrap 4-->
	<link rel="stylesheet" type="text/css" href="../librerias/bootstrap4/bootstrap.min.css">

	  <!-- Required meta tags -->
	  <!-- Caracteres especiales -->
    <meta charset="utf-8">
      <!-- vista en varios dispositivos -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<!--iconos-->
    <link rel="stylesheet" type="text/css" href="../librerias/fontawesome/css/all.css"> 
    <link rel="stylesheet" type="text/css" href="../librerias/datatable/dataTables.bootstrap4.min.css">
</head>
<body>
<!-- Inicio de menú -->

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
		<div class="container">
			<a class="navbar-brand" href="gestorPagos.php">
				<img src="../img/logs.png" alt="" width="200px">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="gestorPagos.php"> <span class="fab fa-fort-awesome"></span> Pagos
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
          	<a class="nav-link active" aria-current="page"><h6><i class="fa fa-eye" aria-hidden="true">  Usuario: </i> <?php echo $idUsuario; ?></h6></a>
        	</li>
        	<li class="nav-item">
						<a class="nav-link" href="../procesos/exit/salir.php" style="color: red"> 
							<span class="fas fa-door-open"></span> 
							Salir
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
<!-- Fin de menú -->
