<?php 
require_once "../../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();
require('../fpdf/fpdf.php');


class PDF extends FPDF
{
// Cabecera de página
	function Header()
	{
		$Name = $_POST['UserN'];
		$APP = $_POST['UserPP'];
		$APM = $_POST['UserPM'];
    // Logo
    	$this->Image('../../img/logs.png',5,5,50,18);
    // Arial bold 15
		$this->SetFont('Arial','B',18);
    // Movernos a la derecha
		$this->Cell(50);
    // Título
		$this->Cell(70,10,'Pagos',0,1,'C',0);
		$this->Cell(70,10,'',0,1,'C',0);
		$this->Cell(30,10,'Nombre: ',0,0,'C',0);
		$this->Cell(40,10,utf8_decode($Name),0,0,'J',0);
		$this->Cell(40,10,utf8_decode($APP),0,0,'J',0);
		$this->Cell(40,10,utf8_decode($APM),0,1,'J',0);
    // Salto de línea
		$this->Ln(10);
		$this->Cell(35, 10, "Folio", 1, 0, 'C', 0);
		$this->Cell(80, 10, 'Concepto', 1, 0, 'C', 0);
		$this->Cell(50, 10, '# Serie', 1, 0, 'C', 0);
		$this->Cell(25, 10, 'Fecha', 1, 0, 'C', 0);
		$this->Cell(20, 10, 'Hora', 1, 0, 'C', 0);
		$this->Cell(60, 10, 'Imagen', 1, 1, 'C', 0); 
		
	}

// Pie de página
	function Footer()
	{
    // Posición: a 1,5 cm del final
		$this->SetY(-15);
    // Arial italic 8
		$this->SetFont('Arial','I',8);
    // Número de página
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}
$Id = $_POST['id'];


$sql = "SELECT * FROM pagos WHERE ID_USUARIO = '$Id'";
$result = mysqli_query($conexion, $sql);

$pdf = new PDF('P','mm','A3');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);
while($mostrar = mysqli_fetch_array($result)) {
	$image1 = $mostrar['ruta'];
		$pdf->Cell(35, 70, $mostrar['FOLIO'], 1, 0, 'J', 0);
		$pdf->Cell(80, 70, $mostrar['CONCEPTO'], 1, 0, 'J', 0);
		$pdf->Cell(50, 70, $mostrar['NUMERO_SERIE'], 1, 0, 'C', 0);
		$pdf->Cell(25, 70, $mostrar['FECHA'], 1, 0, 'C', 0);
		$pdf->Cell(20, 70, $mostrar['HORA'], 1, 0, 'C', 0); 	
		$pdf->Cell( 60, 70, $pdf->Image($mostrar['ruta'], $pdf->GetX(), $pdf->GetY(), 60,70), 1, 1, 'C', false );
	}

$pdf->Output();
?>