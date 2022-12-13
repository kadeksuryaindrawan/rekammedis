<?php

require_once('../../config/connection.php');
require_once('../../assets/fpdf/fpdf.php');
require_once('../../assets/phpqrcode/qrlib.php'); 

$nik = $_GET['nik'];

$query1 = mysqli_query($connection,"SELECT * FROM tbktp WHERE nik = '$nik'");
$data = mysqli_fetch_assoc($query1);

$query = mysqli_query($connection,"SELECT tbrekammedis.*,tbktp.*, timestampdiff(year, tbktp.tgl_lahir, curdate()) as umur FROM tbrekammedis INNER JOIN tbktp USING(nik) WHERE nik = '$nik' ORDER BY tbrekammedis.id_rekammedis DESC");

			
$tempDir = "../../public/pdfqrcodes/";

if (!file_exists($tempDir)){
    mkdir($tempDir);
}

$codeContents = "http://localhost/rekammedis/app/admin/cetakrekammedis.php?nik=".$nik; 
$fileName = "rekam_medis_".$nik. '.png'; 
$pngAbsoluteFilePath = $tempDir.$fileName; 
$quality = "H";
$ukuran = 9;
$padding = 1;
QRcode::png($codeContents, $pngAbsoluteFilePath,$quality,$ukuran,$padding);

$qrcodeimage = "../../public/pdfqrcodes/rekam_medis_" . $nik . ".png";
$pdf = new FPDF('L','mm', 'a4');
$pdf->SetTopMargin(75);
$pdf->AddPage();
$pdf->Image("../../public/template/kopa4.jpg",27,0,0,350);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,-20,"Riwayat Rekam Medis ".$data['nama']."",0,0,'C');
$pdf->Ln(10,0);
$pdf->Cell(0,-20,"$nik",0,0,'C');
$pdf->Ln(0,0);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(45,10,'TGL PERIKSA',1);
$pdf->Cell(70,10,'PEMERIKSAAN',1);
$pdf->Cell(70,10,'PENGOBATAN',1);
$pdf->Cell(60,10,'LAINNYA',1);
$pdf->Cell(35,10,'DIAGNOSA',1);
$pdf->Ln();

while($d = mysqli_fetch_assoc($query)){
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(45,10,$d['tgl_periksa'],1);
    $pdf->Cell(70,10,$d['pemeriksaan'],1);
    $pdf->Cell(70,10,$d['pengobatan'],1);
    $pdf->Cell(60,10,$d['lainnya'],1);
    $pdf->Cell(35,10,$d['sakit'],1);
    $pdf->Ln();
}

$pdf->Image($qrcodeimage,260,173,35,35);

$pdf->Output();
$pdf->Output("../../public/pdfqrcodes/rekam_medis_" . $nik . ".pdf", "F");

?>