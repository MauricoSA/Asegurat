<?php  
	session_start();
	require_once "../../clases/Pagos.php";
	$Pagos = new Pagos();
	$idUsuario = $_SESSION['user'];			
	if ($_FILES['archivos']['size'] > 0) {
		$carpetaUsuario ='../../archivos/'.$idUsuario;

		if (!file_exists($carpetaUsuario)) {
			mkdir($carpetaUsuario, 0777, true);
		}
		$totalArchivos = count($_FILES['archivos']['name']);

			for ($i=0; $i < $totalArchivos; $i++) {  

				$nombreArchivo = $_FILES['archivos']['name'][$i];
				$explode = explode('.', $nombreArchivo);
				$tipoArchivo = array_pop($explode);

				$rutaAlamacenamiento = $_FILES['archivos']['tmp_name'][$i];	
				$rutaFinal =  $carpetaUsuario. "/" .$nombreArchivo;
				$datosP = array(
								"U" => $_POST['Id'],
								"Folio" => $_POST['Folio'],
								"C" => $_POST['concepto'],
								"N" => $_POST['Nserie'],
								"F" => $_POST['fecha'],
								"H" => $_POST['Hora'],
								"I" => $nombreArchivo,
								"T" => $tipoArchivo,
								"R" => $rutaFinal
								);
				if (move_uploaded_file($rutaAlamacenamiento, $rutaFinal)) {
					$respuesta = $Pagos->agregaPago($datosP);
				}			 
			}	
		echo $respuesta;
	} else {
		echo 0; 
	}
	
?>