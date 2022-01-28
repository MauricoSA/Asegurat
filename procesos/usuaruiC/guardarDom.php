<?php  
	require_once "../../clases/Usuario2.php";
	$Usuario2 = new Usuario2();
	$datos = array(
					"calle"=>$_POST['calle'],
					"manzana"=>$_POST['manzana'],
					"lote"=>$_POST['lote'],
					"del"=>$_POST['del'],
					"Id_u"=>$_POST['IUSER']
			);
	
	echo $Usuario2->agregarDom($datos);


?>