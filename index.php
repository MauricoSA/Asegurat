<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Iniciar Sesión
	</title>
	<!-- vista en varios dispositivos -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/loginCss/1.css">
</head>
<body>

	<!--Inicio login-->
	<form method="POST" id="frmlogin" onsubmit="return log()"> 
		<div class='box'>
			<div class='box-form'>
				<div class='box-login-tab'></div>
				<div class='box-login-title'>
					<div class='i i-login'></div><h2>L O G I N</h2>
				</div>
				<div class='box-login'>
					<div class='fieldset-body' id='login_form'>
						<p class='field'>
							<input type='text' id='login' name='login' title='Username' placeholder="Usuario" required=""/>
							<span id='valida' class='i i-warning'></span>
						</p>
						<p class='field'>
							<input type='password' id='password' name='password' title='Password'  placeholder="Contraseña" required=""/>
							<span id='valida' class='i i-close'></span>
						</p>

						<input type='submit' id='do_login' value='Iniciar Sesión' title='Get Started' />
					</div>
				</div>
			</div>
		</div>
	</form>



	<!--Fin login-->
	<script src="librerias/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/loginJs/1.js"></script>
	<script src="librerias/sweetalert.min.js"></script>

	<script type="text/javascript">
		function log(){
			$.ajax({
				type: "POST",
				data: $('#frmlogin').serialize(),
				url: "procesos/usuario/login/login.php",
				success:function(respuesta){
					/*alert(respuesta);*/
					respuesta =  respuesta.trim();
					if (respuesta == 1) {
						window.location = "vistas/inicio.php"; 	
					} else if(respuesta == 2){
						window.location = "vistas/gestorPagos.php"; 	
					}
					else {
						swal(":C","Fallo al entrar!","error");
					}
				}
			});
			return false;
		}
	</script>

</body>
</html>