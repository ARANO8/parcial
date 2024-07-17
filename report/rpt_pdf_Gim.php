<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . "/parcialfinal/config/global.php");
require_once ( ROOT_DIR ."/model/Seg_gimnasioModel.php");
include (ROOT_CORE.'/fpdf/fpdf.php');

class PDF extends FPDF{
    function convertxt($p_txt){
        return iconv('UTF-8', 'iso-8859-1', $p_txt);
    }
    function Header(){
        $this -> Setfont('Arial','B',12);
        $this->SetPageOrientation('L');
        $this -> Cell(0,10,'Reporte Clases de Gimnasio', 0,1,'C');
    }
    function Footer(){
        $this -> SetY(-15);
        $this -> SetFont('Arial','I',8);
        $this -> Cell(0,10,$this -> convertxt("Pagína") .$this->PageNo(). '/{nb}',0,0,'c');
    }
}

$rpt= new Seg_gimnasioModel();
$records = $rpt->findall();
$records = $records['DATA'];

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$header = array($pdf->convertxt("codigo_clase"),$pdf->convertxt("nombre_clase"),$pdf->convertxt("descripcion"),$pdf->convertxt("duracion"),$pdf->convertxt("instructor"),$pdf->convertxt("dias_semana"),$pdf->convertxt("horario"),$pdf->convertxt("ubicacion"));
$widths = array(30,45,70,20,30,20,30,20);
for ($i=0; $i < count($header); $i++) { 
    $pdf->Cell($widths[$i],7,$header[$i],1);
}
$pdf->Ln();
//Cuerpo
$pdf->SetFont('Arial','',10);
foreach ($records as $row) {
    $pdf->Cell($widths[0], 6,$pdf->convertxt($row['codigo_clase']),1);
    $pdf->Cell($widths[1], 6,$pdf->convertxt($row['nombre_clase']),1);
    $pdf->Cell($widths[2], 6,$pdf->convertxt($row['descripcion']),1);
    $pdf->Cell($widths[3], 6,$pdf->convertxt($row['duracion']),1);
    $pdf->Cell($widths[4], 6,$pdf->convertxt($row['instructor']),1);
    $pdf->Cell($widths[5], 6,$pdf->convertxt($row['dias_semana']),1);
    $pdf->Cell($widths[6], 6,$pdf->convertxt($row['horario']),1);
    $pdf->Cell($widths[7], 6,$pdf->convertxt($row['ubicacion']),1);
    $pdf->Ln();
}

$pdf->Output();
?>