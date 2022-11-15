<?php
    $page = 'dokter';
    include "../layout/header.php";
?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Edit Dokter</h3>
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
                        <h4 class="card-title">Form Edit Dokter</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?php
                            $id = $_GET['id'];
                            $data = mysqli_query($connection,"SELECT * FROM tbdokter WHERE id_dokter='$id'");
                            while($d = mysqli_fetch_array($data)){
                            ?>
                            <form action="../../process/dokter/edit_dokter.php" method="POST" class="form form-vertical">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">Id Dokter</label>
                                                <input type="hidden" id="email-id-vertical" class="form-control"
                                                    name="id_dokter" value="<?php echo $d['id_dokter']; ?>">
                                                <input type="text" name="id_dokter" class="form-control" value="<?php echo $d['id_dokter']; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Id User</label>
                                                <select class="form-control" id="exampleFormControlSelect2" name="id_user">
                                                    <option value="<?php echo $d['id_user']; ?>" placeholder="id_user" disabled selected>
                                                    <?php echo $d['id_user']; ?>
                                                    <?php
                                                    $q = mysqli_query($connection, "SELECT * FROM tbusers") or die(mysql_error($connection));
                                                    while ($edit = mysqli_fetch_array($q)){
                                                    echo '<option value="'.$edit['id_user'].'">'.$edit['id_user'].'</option>';
                                                    } ?>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">Nama Dokter</label>
                                                <input type="text" id="email-id-vertical" class="form-control"
                                                    name="nama" value="<?php echo $d['nama']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">No Telephone</label>
                                                <input type="text" id="contact-info-vertical" class="form-control"
                                                    name="telp" value="<?php echo $d['telp']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="password-vertical">Alamat</label>
                                                <input type="text" id="password-vertical" class="form-control"
                                                    name="alamat" value="<?php echo $d['alamat']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary me-1 my-2 w-100">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php
                            }
                            ?>
                            
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