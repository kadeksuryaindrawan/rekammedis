<?php
    $page = 'profile';
    include "../layout/header-dokter.php";

    #$nik = $_GET['nik'];
    $query = mysqli_query($connection,"SELECT * FROM tbdokter");
    $d = mysqli_fetch_assoc($query);
?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-12 order-md-1 order-last mb-3">
                <h3>Profile Dokter</h3>
            </div>
        </div>
    </div>


    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Diri <?= ucwords($d['nama_dokter']) ?></h4>
            </div>
            <div class="card-body row">
                <div class="col-md-6">
                    <p>Nama : <?= ucwords($d['nama_dokter']) ?></p>
                    <p>No Telepon : <?= $d['telp'] ?></p>
                    <p>Alamat : <?= $d['alamat'] ?></p>
                </div>
                <div class="col-md-12">
                    <a href="editdokter.php?id=<?php echo $d['id_user']; ?>"><button class="btn btn-primary w-100 mt-3">Edit</button></a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
    include "../layout/footer.php";
?>