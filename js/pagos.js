function agregarPa(){
	var formData = new FormData(document.getElementById('frmPago'));
	$.ajax({
		url:"../procesos/pagos/guardarPA.php", 
		type:"POST",
		dataType: "html",
		data: formData,
		cache: false,
		contentType:false,
		processData:false,
		
		success:function(respuesta){
					respuesta = respuesta.trim();
					if (respuesta = 1){
						swal(":D","Agregado con exito!","success");
						$('#tablaG').load("FUsers/tablaG.php");
						$("#frmPago")[0].reset();
						
					} else{
						swal(":C","No se pudo agregar!","error");
					}
				}
	});
	
}
function obtenerDatosP(IDP){
	$.ajax({
		type:"POST",
		data:"IDP= " + IDP,
		url:"../procesos/pagos/obtenerP.php",
		success:function(respuesta){
			respuesta = jQuery.parseJSON(respuesta);
			$('#Id2').val(respuesta['id']);
			$('#Folio2').val(respuesta['folio']);
			$('#concepto2').val(respuesta['concepto']);
			$('#Nserie2').val(respuesta['nserie']);
			$('#fecha2').val(respuesta['fecha']);
			$('#Hora2').val(respuesta['hora']);
			$('#archivos2').val(respuesta['ruta']);
			
			
		}
	});
}
function actualizaPago(){
	var formData = new FormData(document.getElementById('frmPagoEdit'));
	$.ajax({
		url:"../procesos/pagos/a.php",
		type:"POST",
		//data:$('#frmPagoEdit').serialize(),
		
		dataType: "html",
		data: formData,
		cache: false,
		contentType:false,
		processData:false,
		success:function(respuesta){
			respuesta = respuesta.trim();

			if (respuesta == 1) {
				$('#tablaG').load("FUsers/tablaG.php");
				swal("UwU","¡Actualizado!","success");
			} else {
				swal("NwN","No Actualizado, Fallo!","error");
				}
		}
	});
return false; 
}
function eliminarPs(IDP){
	IDP = parseInt(IDP);
	if (IDP < 1) {
		swal("","No Elejiste Pago!","error");
		return false;
	} else {
		//-------------------------
		swal({
			title:"¿Estas seguro?",
			text: "Se eliminara este Pago!, y no se podra recuperar!",
			icon: "warning",
			buttons: true,
			dangerMode: true,

		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type:"POST",
					data:"IDP=" + IDP,
					url: "../procesos/pagos/EliminarP.php",
					success:function(respuesta){
						respuesta = respuesta.trim();	
						if (respuesta == 1) {
							$('#tablaG').load("FUsers/tablaG.php");
							swal("Pago Eliminado!",{
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