<?php
require('../../fpdf.php');
require('../../modelos/Doctor.php');
$doctor = Doctor::lista();
$pdf = new FPDF('L');
$pdf->AddPage();
$pdf->Image('../../img/Ivan.jpg', 10, 8, 20);
$pdf->SetFont('helvetica','B',16);
$pdf->Cell(190,10,'Doctores', 0, 1, 'C');
$pdf->SetFont('helvetica','B',12);
$pdf->Cell(90,10,'Nombre', 'B', 0, 'C');
$pdf->Cell(10,10,'', 0, 0, 'C');
$pdf->Cell(90,10,'Cedula', 'B', 1, 'C');

foreach ($doctor as $d) {
    $pdf->Cell(90,10,$d->nombre, 0, 0, 'C');
    $pdf->Cell(10,10,'', 0, 0, 'C');
    $pdf->Cell(90,10,$d->cedula, 0, 1, 'C');
}

$pdf->Output();
?>