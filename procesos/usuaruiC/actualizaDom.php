<?php  

	require_once "../../clases/Usuario2.php";
	$Usuario2 = new Usuario2();
	
	$datos = array(
					"calle"=>$_POST['calle2'],
					"manzana"=>$_POST['manzana2'],
					"lote"=>$_POST['lote2'],
					"del"=>$_POST['del2'],
					"Id_u"=>$_POST['IUSER2']
			);
	
	echo $Usuario2->actualizaDom($datos);
?>