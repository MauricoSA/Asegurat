<?php 
session_start(); 
require_once "../../clases/Pagos.php";
	$Pagos = new Pagos();
	$idUsuario = $_SESSION['user'];	
	if ($_FILES['archivos']['size'] > 0) {
		$carpetaUsuario ='../../archivos/'.$idUsuario;

		$totalArchivos = count($_FILES['archivos']['name']);

			for ($i=0; $i < $totalArchivos; $i++) {  
				$nombreArchivo = $_FILES['archivos']['name'][$i];
				$explode = explode('.', $nombreArchivo);
				$tipoArchivo = array_pop($explode);

				$rutaAlamacenamiento = $_FILES['archivos']['tmp_name'][$i];				
				$rutaFinal =  $carpetaUsuario. "/" .$nombreArchivo;
				$datos2 = array(
								"Id2" => $_POST['Id2'],
								"F" => $_POST['Folio2'],
								"C" => $_POST['concepto2'],
								"N" => $_POST['Nserie2'],
								"Fe" => $_POST['fecha2'],
								"H" => $_POST['Hora2'],
								"I" => $nombreArchivo,
								"T" => $tipoArchivo,
								"R" => $rutaFinal
							);
				if (move_uploaded_file($rutaAlamacenamiento, $rutaFinal)) {
					$respuesta = $Pagos->actualizaPago($datos2);
				}	
			}
		echo $respuesta;
	}else{
		echo 0;
	}		
?>