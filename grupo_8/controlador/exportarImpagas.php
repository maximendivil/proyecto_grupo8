<?php
require_once("convertirMes.php");
require('../fpdf17/fpdf.php');

$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(300,10,utf8_decode('Listado de cuotas impagas, por año y mes'),0,1);
// Cabecera
    
    //$pdf->Cell(40,7,,1);
    //$this->Ln();
    // Datos
	//var_dump($rows);
	$pdf->Cell(20,6, utf8_decode('Año'),1);
	$pdf->Cell(40,6,'Mes',1);
	$pdf->Cell(30,6, utf8_decode('Número'),1);
	$pdf->Cell(20,6,'Monto',1);
	$pdf->Cell(30,6,'DNI',1);
	$pdf->Cell(50,6,'Nombre',1);
	$pdf->Cell(50,6,'Apellido',1);
	$pdf->Ln();
    foreach($rows as $row)
    {
        $pdf->Cell(20,6,$row['anio'],1);
		$pdf->Cell(40,6,convertirMes($row['mes']),1);
		$pdf->Cell(30,6,$row['numero'],1);
		$pdf->Cell(20,6,"$".$row['monto'],1);
		$pdf->Cell(30,6,$row['numeroDocumento'],1);
		$pdf->Cell(50,6, utf8_decode($row['nombre']),1);
		$pdf->Cell(50,6, utf8_decode($row['apellido']),1);
		/*$pdf->Cell(40,6,'mes',1);
		$pdf->Cell(40,6,'anio',1);*/
        $pdf->Ln();
    }
$pdf->Output();
?>