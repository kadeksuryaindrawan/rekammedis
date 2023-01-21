<?php
$page = 'rekammedis';
include "../layout/header.php";
$nik = $_GET['nik'];
$query = mysqli_query($connection, "SELECT * FROM tbktp WHERE nik = '$nik'");
$data = mysqli_fetch_assoc($query);
?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-12 order-md-1 order-last">
                <h3>Rekam Medis Pasien</h3>
                <div class="my-3">
                    <a href="./tambahrekammedis.php?nik=<?= $nik; ?>">
                        <button class="btn btn-primary my-2">Tambah Rekam Medis</button>
                    </a>
                    <a href="./cetakrekammedis.php?nik=<?= $nik; ?>">
                        <button class="btn btn-success my-2">Cetak Rekam Medis</button>
                    </a>
                    <a href="./rekammedis.php">
                        <button class="btn btn-secondary my-2">Kembali</button>
                    </a>
                </div>
            </div>
            <!-- <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dokter</li>
                    </ol>
                </nav>
            </div> -->
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Rekam Medis Pasien <?= ucwords($data['nama']) ?></h4>
                    </div>
                    <div class="card-content">
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>TGL PERIKSA</th>
                                        <th>DOKTER</th>
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>UMUR</th>
                                        <th>DIAGNOSA</th>
                                        <th>TINDAKAN</th>
                                        <th>ALERGI OBAT</th>
                                        <th>OBAT</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = mysqli_query($connection, "SELECT tbrekammedis.*,tbktp.*, timestampdiff(year, tbktp.tgl_lahir, curdate()) as umur FROM tbrekammedis INNER JOIN tbktp USING(nik) WHERE nik = '$nik' ORDER BY tbrekammedis.id_rekammedis DESC");
                                    $query1 = mysqli_query($connection, "SELECT tbdokter.nama_dokter, tbrekammedis.*, tbktp.*,TIMESTAMPDIFF(YEAR, tbktp.tgl_lahir, CURDATE()) AS umur FROM tbdokter JOIN tbrekammedis ON tbdokter.id_dokter = tbrekammedis.id_dokter JOIN tbktp USING(nik) WHERE nik = '$nik' ORDER BY tbrekammedis.id_rekammedis DESC;");
                                    if (mysqli_num_rows($query1) > 0) {
                                        while ($d = mysqli_fetch_assoc($query1)) {
                                    ?>
                                            <tr>
                                            <td><?= $d['tgl_periksa'] ?></td>
                                            <td><?= $d['nama_dokter'] ?></td>
                                                <td class="text-bold-500"><?= $d['nik'] ?></td>
                                                <td><?= $d['nama'] ?></td>
                                                <td class="text-bold-500"><?= $d['umur'] ?></td>
                                                <td><?= $d['sakit'] ?></td>
                                                <td><?= $d['pemeriksaan'] ?></td>
                                                <td><?= $d['alergi_obat'] ?></td>
                                                <td><?= $d['pengobatan'] ?></td>
                                                <td>
                                                    <a href="./editrekammedis.php?id_rekammedis=<?= $d['id_rekammedis'] ?>"><button class="btn btn-primary my-2">Edit</button></a>
                                                    <a href="../../process/rekammedis/hapus_rekammedis.php?id_rekammedis=<?= $d['id_rekammedis'] ?>" onclick="return  confirm('Yakin hapus data ?')"><button class="btn btn-danger my-2">Hapus</button></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td class="text-danger text-center" colspan="9">Belum ada rekam medis !</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
</div>



<?php
include "../layout/footer.php";
?>