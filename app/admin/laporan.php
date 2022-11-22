<?php
    $page = 'laporan';
    include "../layout/header.php";
?>
            
    <div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Laporan Rekam Medis</h3>
            <form action="laporan.php" method="get">
                <div class="row g-3 align-items-center mt-3 mb-5">
                    <div class="col-12">
                        <label class="col-form-label">Periode</label>
                    </div>
                    <div class="col-4">
                        <input type="datetime-local" class="form-control" name="dari" required>
                    </div>
                    <div class="col-4">
                        <input type="datetime-local" class="form-control" name="ke" required>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
                
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                Daftar Laporan
            </div>
            <div class="card-content">
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NIK</th>
                                <th>NAMA</th>
                                <th>UMUR</th>
                                <th>SAKIT</th>
                                <th>PEMERIKSAAN</th>
                                <th>PENGOBATAN</th>
                                <th>LAINNYA</th>
                                <th>TGL PERIKSA</th>
                            </tr>
                        </thead>
                        <?php
                            if(isset($_GET['dari']) && isset($_GET['ke'])){
                                $data = mysqli_query($connection, "SELECT tbrekammedis.*,tbktp.*, timestampdiff(year, tbktp.tgl_lahir, curdate()) as umur FROM tbrekammedis INNER JOIN tbktp USING(nik) WHERE tgl_periksa BETWEEN '".$_GET['dari']."' and '".$_GET['ke']."' ORDER BY tbrekammedis.id_rekammedis DESC");
                            }else{
                                $data = mysqli_query($connection, "SELECT tbrekammedis.*,tbktp.*, timestampdiff(year, tbktp.tgl_lahir, curdate()) as umur FROM tbrekammedis INNER JOIN tbktp USING(nik) ORDER BY tbrekammedis.id_rekammedis DESC");
                            }
                            $no = 1;
                            if(mysqli_num_rows($data) > 0){
                                while($d = mysqli_fetch_assoc($data)){
                                    ?>
                                        <tr>
                                            <td><?= $no++?></td>
                                            <td class="text-bold-500"><?= $d['nik'] ?></td>
                                            <td><?= $d['nama'] ?></td>
                                            <td class="text-bold-500"><?= $d['umur'] ?></td>
                                            <td><?= $d['sakit'] ?></td>
                                            <td><?= $d['pemeriksaan'] ?></td>
                                            <td><?= $d['pengobatan'] ?></td>
                                            <td><?= $d['lainnya'] ?></td>
                                            <td><?= $d['tgl_periksa'] ?></td>
                                        </tr>
                                    <?php
                                }
                            }
                            else{
                                ?>
                                <tr>
                                    <td class="text-danger text-center" colspan="9">Data Tidak Ditemukan</td>
                                </tr>
                                <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
</div>

            
<?php
    include "../layout/footer.php";
?>