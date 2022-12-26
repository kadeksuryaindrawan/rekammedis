<?php
$page = 'rekammedis';
include "../layout/header-dokter.php";
$nik = $_GET['nik'];
$query = mysqli_query($connection, "SELECT * FROM tbktp WHERE nik = '$nik'");
$data = mysqli_fetch_assoc($query);
?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Tambah Rekam Medis</h3>
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
                        <h4 class="card-title">Tambah Rekam Medis Pasien <?= ucwords($data['nama']) ?></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="../../process/rekammedis/tambah_rekammedis.php" method="POST" class="form form-vertical">
                                <input type="hidden" name="nik" value="<?= $nik ?>">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="sakit" class="form-label">Diagnosa Penyakit</label>
                                                <textarea class="form-control" id="sakit" rows="3" name="sakit"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                        <div class="form-group">
                                                <label for="jenis" class="form-label">Jenis Penyakit</label>
                                                <select class="form-control" id="jenis" name="jenis_penyakit">
                                                    <option value="">Pilih Jenis Penyakit</option>
                                                    <option value="Umum">Umum</option>
                                                    <option value="Khusus">Khusus</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="pemeriksaan" class="form-label">Tindakan</label>
                                                <textarea class="form-control" id="pemeriksaan" rows="3" name="pemeriksaan"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="pemeriksaan" class="form-label">Alergi Obat</label>
                                                <textarea class="form-control" id="alergi_obat" rows="3" name="alergi_obat"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="pengobatan" class="form-label">Obat Yang Diberikan</label>
                                                <textarea class="form-control" id="pengobatan" rows="3" name="pengobatan"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="lainnya" class="form-label">Keterangan Tambahan</label>
                                                <textarea class="form-control" id="lainnya" rows="3" name="lainnya"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary me-1 my-2 w-100">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <a href="./lihatrekam.php?nik=<?= $nik; ?>" class="d-flex justify-content-center w-full">
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