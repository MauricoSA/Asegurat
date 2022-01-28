function agregarAdm(){
	var formData = new FormData(document.getElementById('frmRegistro'));
	$.ajax({
		url:"../procesos/usuarioA/guardarAds.php", 
		type:"POST",
		dataType: "html",
		data: formData,
		cache: false,
		contentType:false,
		processData:false,
		success:function(respuesta){
			respuesta = respuesta.trim();
			if (respuesta == 1){
				$("#frmRegistro")[0].reset();
				$('#tablaA').load("FUsers/tablaA.php");
				swal(":D","Agregado con exito!","success");
			} 
			else if(respuesta == 2){
				swal("Este usuario ya existe, Elegir otro por favor!! :P");
			}
			else{
				swal(":C","No se pudo agregar!","error");
			}
		}
	});
	
}
function obteneridUser(id){
	$.ajax({
		type:"POST",
		data:"id= " + id,
		url:"../procesos/usuaruiC/obtenerid.php",
		success:function(respuesta){
			respuesta = jQuery.parseJSON(respuesta);
			$('#IUSER').val(respuesta['id']);
		}
	});
}
function obteneridDomUser(id){
	$.ajax({
		type:"POST",
		data:"id= " + id,
		url:"../procesos/usuaruiC/obtenerDom.php",
		success:function(respuesta){
			respuesta = jQuery.parseJSON(respuesta);
			$('#IUSER2').val(respuesta['ID_US']);
			$('#calle2').val(respuesta['C']);
			$('#manzana2').val(respuesta['NE']);
			$('#lote2').val(respuesta['NI']);
			$('#del2').val(respuesta['DEL']);
		}
	});
}
function obtenerDatosUsuario(idContrato){
	$.ajax({
		type:"POST",
		data:"idContrato= " + idContrato,
		url:"../procesos/usuaruiC/obtenerU.php",
		success:function(respuesta){
			respuesta = jQuery.parseJSON(respuesta);
			$('#IDU').val(respuesta['id']);
			$('#N_CONTRATO2').val(respuesta['idContrato']);
			$('#FECHA_CONTRATO2').val(respuesta['FC']);
			$('#Nombre2').val(respuesta['nombre']);
			$('#APP2').val(respuesta['APP']);
			$('#APM2').val(respuesta['APM']);
			$('#TELEFONO2').val(respuesta['TEL']);
			$('#telefono2_1').val(respuesta['Tel2']);
			$('#telefono3_1').val(respuesta['Tel3']);
			$('#us').val(respuesta['Us']);
			$('#Mail').val(respuesta['correo']);
			$('#password2').val(respuesta['pass']);
		}
	});
}
function actualizaUsuario(){

	$.ajax({
		type:"POST",
		data:$('#frmActualizaUsuario').serialize(),
		url:"../procesos/usuaruiC/actualizaU.php",
		success:function(respuesta){
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#tablaU').load("FUsers/tablaU.php");
				swal("UwU","¡Actualizado!","success");
			} else {
				swal("NwN","No Actualizado, Fallo!","error");
			}
		}
	});
	return false; 
}
function eliminarUs(id){
	id = parseInt(id);
	if (id < 1) {
		swal("","No Elejiste Administrador!","error");
		return false;
	} else {
		//-------------------------
		swal({
			title:"¿Estas seguro?",
			text: "Se eliminara este Usuario!, y no se podra recuperar!",
			icon: "warning",
			buttons: true,
			dangerMode: true,

		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type:"POST",
					data:"id=" + id,
					url: "../procesos/usuaruiC/eliminarUs.php",
					success:function(respuesta){
						respuesta = respuesta.trim();	
						if (respuesta == 1) {
							$('#tablaU').load("FUsers/tablaU.php");
							swal("Usuario Eliminado!",{
								icon: "success",
							});
						} else {
							swal(":C", "No se pudo eliminar!" ,"error");
						}
					}
				});
				
			} 

		});
		//--------------------
	}
}
function obtenerDatosA(idA){
	$.ajax({
		type:"POST",
		data:"idA= " + idA,
		url:"../procesos/usuarioA/obtenerA.php",
		success:function(respuesta){
			respuesta = jQuery.parseJSON(respuesta);
			$('#idA').val(respuesta['idA']);
			$('#Nombre2').val(respuesta['nombre']);
			$('#APP2').val(respuesta['app']);
			$('#APM2').val(respuesta['apm']);
			$('#TELEFONO2').val(respuesta['tel']);
			$('#Usuario2').val(respuesta['user']);
			$('#Correo2').val(respuesta['email']);
			$('#password2').val(respuesta['Pass']);
			
		}
	});
}
function actualizarAds(){

	$.ajax({
		type:"POST",
		data:$('#frmEditarA').serialize(),
		url:"../procesos/usuarioA/actualizarAds.php",
		success:function(respuesta){
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#tablaA').load("FUsers/tablaA.php");
				swal("UwU","¡Actualizado!","success");
			} else {
				swal("NwN","No Actualizado, Fallo!","error");
			}
		}
	});
	return false; 
}


function eliminarAds(idA){
	idA = parseInt(idA);
	if (idA < 1) {
		swal("","No Elejiste Administrador!","error");
		return false;
	} else {
		//-------------------------
		swal({
			title:"¿Estas seguro?",
			text: "Se eliminara este Administrador!, y no se podra recuperar!",
			icon: "warning",
			buttons: true,
			dangerMode: true,

		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type:"POST",
					data:"idA=" + idA,
					url: "../procesos/usuarioA/eliminarAds.php",
					success:function(respuesta){
						respuesta = respuesta.trim();	
						if (respuesta == 1) {
							$('#tablaA').load("FUsers/tablaA.php");
							swal("Administrador Eliminado!",{
								icon: "success",
							});
						} else {
							swal(":C", "No se pudo eliminar!" ,"error");
						}
					}
				});
				
			} 

		});
		//--------------------
	}
}


function agregarUsuario()
{
	var formData = new FormData(document.getElementById('frmRegistro2'));
	$.ajax({
		url:"../procesos/usuaruiC/guardarUsu.php", 
		type:"POST",
		dataType: "html",
		data: formData,
		cache: false,
		contentType:false,
		processData:false,
		success:function(respuesta)
		{
			respuesta = respuesta.trim();
			if (respuesta == 1)
			{
				$("#frmRegistro2")[0].reset();
				$('#tablaU').load("FUsers/tablaU.php");
				swal(":D","Agregado con exito!" + respuesta, "success");
			} 
			else 
			{
				swal(":C","No se pudo agregar!","error");
			}
		}
	});
	
}
function addAddres()
{
	var formData = new FormData(document.getElementById('frmDom'));
	$.ajax({
		url:"../procesos/usuaruiC/guardarDom.php", 
		type:"POST",
		dataType: "html",
		data: formData,
		cache: false,
		contentType:false,
		processData:false,
		success:function(respuesta)
		{
			respuesta = respuesta.trim();
			if (respuesta == 1)
			{
				$("#frmDom")[0].reset();
				$('#tablaU').load("FUsers/tablaU.php");
				swal(":D","Agregado con exito!" + respuesta, "success");
				window.location.reload();
			} 
			else 
			{
				swal(":C","No se pudo agregar!","error");
			}
		}
	});
	
}
function actualizaDom(){

	$.ajax({
		type:"POST",
		data:$('#frmDom2').serialize(),
		url:"../procesos/usuaruiC/actualizaDom.php",
		success:function(respuesta){
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#tablaU').load("FUsers/tablaU.php");
				swal("UwU","¡Actualizado!","success");
			} else {
				swal("NwN","No Actualizado, Fallo!","error");
			}
		}
	});
	return false; 
}