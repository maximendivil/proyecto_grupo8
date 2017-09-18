<?php

require('../fpdf17/fpdf.php');

$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(300,10,utf8_decode('Total comisiones, por año y mes'),0,1);
// Cabecera
    
    //$pdf->Cell(40,7,,1);
    //$this->Ln();
    // Datos
	//var_dump($rows);
	$pdf->Cell(20,6, utf8_decode('Año'),1);
	$pdf->Cell(40,6,'Mes',1);
	$pdf->Cell(40,6,'Tipo',1);
	$pdf->Cell(30,6,'Monto cuota',1);
	$pdf->Cell(30,6,'Total cuotas',1);	
	$pdf->Cell(30,6,utf8_decode('Comisión'),1);
	$pdf->Cell(30,6,'Monto total',1);
	$pdf->Ln();
    foreach($rows as $row)
    {
        $pdf->Cell(20,6,$row['anio'],1);
		$pdf->Cell(40,6,$row['mes'],1);
		$pdf->Cell(40,6,$row['tipo'],1);
		$pdf->Cell(30,6,"$".$row['montoIndividual'],1);
		$pdf->Cell(30,6,"$".$row['montoCuotas'],1);		
		$pdf->Cell(30,6,"$".$row['comisionCobrador']."%",1);
		$pdf->Cell(30,6,"$".$row['monto'],1);
		/*$pdf->Cell(40,6,'mes',1);
		$pdf->Cell(40,6,'anio',1);*/
        $pdf->Ln();
    }
$pdf->Output();
?>