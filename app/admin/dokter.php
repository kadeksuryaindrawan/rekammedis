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
                        $data = mysqli_query($connection, "SELECT tbdokter.*,tbusers.* FROM tbdokter INNER JOIN tbusers USING(id_user) ORDER BY id_dokter");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['email']; ?></td>
                                <td><?php echo $d['nama_dokter']; ?></td>
                                <td><?php echo $d['telp']; ?></td>
                                <td><?php echo $d['alamat']; ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button id="toa" class="btn btn-success" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <span class="bi bi-three-dots-vertical"></span>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a href="editdokter.php?id=<?php echo $d['id_user']; ?>" class="dropdown-item"><i class="bi bi-pencil-square" id="from1"></i> Edit</a>
                                            <!--<a href="../../process/dokter/hapus_dokter.php?id=<?php echo $d['id_user']; ?>" class="dropdown-item" onclick="return confirm('Yakin menghapus?')"><i class="bi bi-trash"></i> Hapus</a>-->
                                            <a class="dropdown-item" onclick="confirmationHapusData('../../process/dokter/hapus_dokter.php?id=<?php echo $d['id_user']; ?>')"><i class="bi bi-trash"></i> Hapus</a>
                                            <a href="ubahpassword.php?id=<?php echo $d['id_user']; ?>" class="dropdown-item"><i class="bi bi-credit-card-fill" title="Delete"></i> Ubah Password</a>
                                        </div>
                                    </div>
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

<script>
    function confirmationHapusData(url) {
        Swal.fire({
            // title: 'Anda Yakin Untuk Menghapus Data Ini ?',
            // text: 'Anda Tidak Dapat Melihat Data Ini Lagi!!!',
            // type: 'warning',
            // showCancelButton: true,
            // confirmButtonColor: '#DD6B55',
            // confirmButtonText: 'Hapus Saja!!',
            // closeOnConfirm: false

            title: 'Anda yakin menghapus data?',
            text: "Anda tidak akan dapat mengembalikan data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location.href = url;
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    }
</script>

<?php
include "../layout/footer.php";
?>