<?php
    $page = 'dokter';
    include "../layout/header.php";
?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Ubah Password Dokter</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
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
                        <h4 class="card-title">Ubah Password Dokter</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?php
                            $id = $_GET['id'];
                            $data = mysqli_query($connection,"SELECT tbdokter.*,tbusers.* FROM tbdokter INNER JOIN tbusers USING(id_user) WHERE id_user='$id'");
                            while($d = mysqli_fetch_array($data)){
                            ?>
                            <form action="../../process/dokter/ubah_password.php" method="POST" class="form form-vertical">
                                    <input type="hidden" name="id_user" value="<?= $id ?>">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">Email Dokter</label>
                                                <input type="email" id="email-id-vertical" class="form-control"
                                                    name="email" placeholder="Email Dokter" value="<?= $d['email'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">Nama Dokter</label>
                                                <input type="text" id="email-id-vertical" class="form-control"
                                                    name="nama" value="<?php echo $d['nama']; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Password Baru</label>
                                                <input type="password" id="contact-info-vertical" class="form-control"
                                                    name="password">
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