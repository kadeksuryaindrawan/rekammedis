<?php
    $page = 'rekammedis';
    include "../layout/header.php";
    $id_rekammedis = $_GET['id_rekammedis'];
    $query = mysqli_query($connection,"SELECT tbrekammedis.*,tbktp.*, timestampdiff(year, tbktp.tgl_lahir, curdate()) as umur FROM tbrekammedis INNER JOIN tbktp USING(nik) WHERE id_rekammedis = $id_rekammedis");
    $data = mysqli_fetch_assoc($query);
?>
            
            <div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Edit Rekam Medis</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Rekam Medis</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Rekam Medis Pasien <?= ucwords($data['nama']) ?></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="../../process/rekammedis/edit_rekammedis.php" method="POST" class="form form-vertical">
                                <input type="hidden" name="id_rekammedis" value="<?=$id_rekammedis?>">
                                <div class="form-body">
                                    <div class="row">
                                    <div class="col-12">
                                            <div class="form-group">
                                                <label for="sakit" class="form-label">Sakit</label>
                                                <textarea class="form-control" id="sakit" rows="3" name="sakit"><?= $data['sakit'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="pemeriksaan" class="form-label">Pemeriksaan</label>
                                                <textarea class="form-control" id="pemeriksaan" rows="3" name="pemeriksaan"><?= $data['pemeriksaan'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="pengobatan" class="form-label">Pengobatan</label>
                                                <textarea class="form-control" id="pengobatan" rows="3" name="pengobatan"><?= $data['pengobatan'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="lainnya" class="form-label">Lainnya</label>
                                                <textarea class="form-control" id="lainnya" rows="3" name="lainnya"><?= $data['lainnya'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary me-1 my-2 w-100">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <a href="./lihatrekam.php?nik=<?= $data['nik']; ?>" class="d-flex justify-content-center w-full">
                                    <button class="btn btn-secondary w-100 my-1">Kembali</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic Vertical form layout section end -->
</div>

            
<?php
    include "../layout/footer.php";
?>