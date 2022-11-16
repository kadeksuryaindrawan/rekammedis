<?php
    $page = 'rekammedis';
    include "../layout/header.php";

    $nik = $_GET['nik'];
    $query = mysqli_query($connection,"SELECT tbktp.*,timestampdiff(year, tgl_lahir, curdate()) as umur FROM tbktp WHERE nik = '$nik'");
    $d = mysqli_fetch_assoc($query);
?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-12 order-md-1 order-last mb-3">
                <h3>Data Penduduk</h3>
            </div>
        </div>
    </div>


    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Diri <?= ucwords($d['nama']) ?></h4>
            </div>
            <div class="card-body row">
                <div class="col-md-6">
                    <p>NIK : <?= $d['nik'] ?></p>
                    <p>Nama : <?= ucwords($d['nama']) ?></p>
                    <p>Tempat Lahir : <?= $d['tempat_lahir'] ?></p>
                    <p>Tanggal Lahir : <?= $d['tgl_lahir'] ?></p>
                    <p>Umur : <?= $d['umur'] ?></p>
                    <p>Jenis Kelamin : <?= $d['jenis_kelamin'] ?></p>
                    <p>Golongan Darah : <?= $d['gol_darah'] ?></p>
                </div>

                <div class="col-md-6">
                    <p>Alamat : <?= $d['alamat'] ?></p>
                    <p>Kelurahan : <?= $d['kelurahan'] ?></p>
                    <p>Kecamatan : <?= $d['kecamatan'] ?></p>
                    <p>Agama : <?= $d['agama'] ?></p>
                    <p>Status Kawin : <?= $d['status_kawin'] ?></p>
                    <p>Pekerjaan : <?= $d['pekerjaan'] ?></p>
                    <p>Kewarganegaraan : <?= $d['kewarganegaraan'] ?></p>  
                </div>

                <div class="col-md-12">
                    <a href="./rekammedis.php"><button class="btn btn-primary w-100 mt-3">Kembali</button></a>
                </div>
                 
            </div>
        </div>
    </section>
</div>

<?php
    include "../layout/footer.php";
?>