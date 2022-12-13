<?php
    $page = 'dokter';
    include "../layout/header.php";
?>
            
            <div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dokter</h3>
                <div class="my-3">
                    <a href="./tambahdokter.php">
                        <button class="btn btn-primary">Tambah Dokter</button>
                    </a>
                </div>
                
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

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                Daftar Dokter
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Nama Dokter</th>
                            <th>No Telephone</th>
                            <th>Alamat</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        $data = mysqli_query($connection,"SELECT tbdokter.*,tbusers.* FROM tbdokter INNER JOIN tbusers USING(id_user) ORDER BY id_dokter");
                        while($d = mysqli_fetch_array($data)){
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['email']; ?></td>
                                <td><?php echo $d['nama_dokter']; ?></td>
                                <td><?php echo $d['telp']; ?></td>
                                <td><?php echo $d['alamat']; ?></td>
                                <td>
                                    <a href="editdokter.php?id=<?php echo $d['id_user']; ?>" class="btn btn-primary">Edit</a>
                                    <a href="../../process/dokter/hapus_dokter.php?id=<?php echo $d['id_user']; ?>" class="btn btn-danger">Hapus</a>
                                    <a href="ubahpassword.php?id=<?php echo $d['id_user']; ?>" class="btn btn-warning">Ubah Password</a>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>  
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
</div>

            
<?php
    include "../layout/footer.php";
?>