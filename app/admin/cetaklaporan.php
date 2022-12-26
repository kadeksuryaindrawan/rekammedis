<?php

    require_once('../../config/connection.php');
    require '../../vendor/autoload.php';

    // reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

if(isset($_GET['dari']) && isset($_GET['ke'])){
    $dari = $_GET['dari'];
    $ke = $_GET['ke'];
    $format = "laporan_".$dari."-".$ke.".pdf";
    $query = mysqli_query($connection, "SELECT tbrekammedis.*,tbktp.*, timestampdiff(year, tbktp.tgl_lahir, curdate()) as umur FROM tbrekammedis INNER JOIN tbktp USING(nik) WHERE tgl_periksa BETWEEN '".$dari."' and '".$ke."' ORDER BY tbrekammedis.id_rekammedis DESC");
}
else{
    $format = "laporan.pdf";
    $query = mysqli_query($connection, "SELECT tbrekammedis.*,tbktp.*, timestampdiff(year, tbktp.tgl_lahir, curdate()) as umur FROM tbrekammedis INNER JOIN tbktp USING(nik) ORDER BY tbrekammedis.id_rekammedis DESC");
}

$html = '<center><h3>Daftar Laporan</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%" cellspacing="0" cellpadding="5px">
 <tr>
 <th>NO</th>
                                <th>NIK</th>
                                <th>NAMA</th>
                                <th>UMUR</th>
                                <th>SAKIT</th>
                                <th>PEMERIKSAAN</th>
                                <th>PENGOBATAN</th>
                                <th>JENIS PENYAKIT</th>
                                <th>TGL PERIKSA</th>
 </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$no++."</td>
 <td>".$row['nik']."</td>
 <td>".$row['nama']."</td>
 <td>".$row['umur']."</td>
 <td>".$row['sakit']."</td>
 <td>".$row['pemeriksaan']."</td>
 <td>".$row['pengobatan']."</td>
 <td>".$row['jenis_penyakit']."</td>
 <td>".$row['tgl_periksa']."</td>
 </tr>";
}
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($format);

?>