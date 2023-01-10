<?php

require_once('../../config/connection.php');
require_once('../../assets/fpdf/fpdf.php');
require_once('../../assets/phpqrcode/qrlib.php'); 

$nik = $_GET['nik'];

$query1 = mysqli_query($connection,"SELECT * FROM tbktp WHERE nik = '$nik'");
$data = mysqli_fetch_assoc($query1);
$nama = $data['nama'];
$query = mysqli_query($connection,"SELECT tbdokter.nama_dokter, tbrekammedis.*, tbktp.*,TIMESTAMPDIFF(YEAR, tbktp.tgl_lahir, CURDATE()) AS umur FROM tbdokter JOIN tbrekammedis ON tbdokter.id_dokter = tbrekammedis.id_dokter JOIN tbktp USING(nik) WHERE nik = '$nik' ORDER BY tbrekammedis.id_rekammedis DESC;");

			
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

$pdf->AddPage();
$pdf->Image("../../public/template/kopa4.jpg",27,0,0,350);
$pdf->Ln(60,0);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,-20,"Riwayat Rekam Medis",0,0,'C');
$pdf->Ln(12,0);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(0,-20,"$nama",0,0,'C');
$pdf->Ln(0,0);
$pdf->Image($qrcodeimage,260,2,35,35);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,10,'TGL PERIKSA',1);
$pdf->Cell(25,10,'DOKTER',1);
$pdf->Cell(30,10,'DIAGNOSA',1);
$pdf->Cell(60,10,'TINDAKAN',1);
$pdf->Cell(30,10,'ALERGI',1);
$pdf->Cell(60,10,'OBAT',1);
$pdf->Cell(50,10,'KET. TAMBAHAN',1);
$pdf->Ln();

while($d = mysqli_fetch_assoc($query)){
    $pdf->SetFont('Arial','',6);
    $pdf->Cell(30,10,$d['tgl_periksa'],1);
    $pdf->Cell(25,10,$d['nama_dokter'],1);
    $pdf->Cell(30,10,$d['sakit'],1);
    $pdf->Cell(60,10,$d['pemeriksaan'],1);
    $pdf->Cell(30,10,$d['alergi_obat'],1);
    $pdf->Cell(60,10,$d['pengobatan'],1);
    $pdf->Cell(50,10,$d['lainnya'],1);
    $pdf->Ln();
}

$pdf->Output();
$pdf->Output("../../public/pdfqrcodes/rekam_medis_" . $nik . ".pdf", "F");

?>