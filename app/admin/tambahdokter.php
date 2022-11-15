<?php
    $page = 'dokter';
    include "../layout/header.php";
?>
            
            <div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Tambah Dokter</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dokter</li>
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
                        <h4 class="card-title">Form Tambah Dokter</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="../../process/dokter/tambah_dokter.php" method="POST" class="form form-vertical">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Id User</label>
                                                <select class="form-control" id="exampleFormControlSelect2" name="id_user">
                                                    <option value="" disabled selected>Pilih Id User
                                                    <?php
                                                    $d = mysqli_query($connection, "SELECT * FROM tbusers") or die(mysql_error($connection));
                                                    while ($data = mysqli_fetch_array($d)){
                                                    echo '<option value="'.$data['id_user'].'">'.$data['id_user'].'</option>';
                                                    } ?>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">Nama Dokter</label>
                                                <input type="text" id="email-id-vertical" class="form-control"
                                                    name="nama" placeholder="Nama Dokter">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">No Telephone</label>
                                                <input type="text" id="contact-info-vertical" class="form-control"
                                                    name="telp" placeholder="No Telephone">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="password-vertical">Alamat</label>
                                                <input type="text" id="password-vertical" class="form-control"
                                                    name="alamat" placeholder="Alamat">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary me-1 my-2 w-100">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <a href="./dokter.php" class="d-flex justify-content-center w-full">
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