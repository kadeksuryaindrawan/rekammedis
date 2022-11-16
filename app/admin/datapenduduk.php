<?php
    require_once "../../config/connection.php";

    $nik = $_POST['nik'];

    $query = mysqli_query($connection,"SELECT tbktp.*,timestampdiff(year, tgl_lahir, curdate()) as umur FROM tbktp WHERE nik = '$nik'");
    if(mysqli_num_rows($query) == 1){
        while($d = mysqli_fetch_assoc($query)){
            ?>
                <div class="row" id="table-bordered">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Penduduk</h4>
                            </div>
                            <div class="card-content">
                                <!-- table bordered -->
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>NIK</th>
                                                <th>NAMA</th>
                                                <th>UMUR</th>
                                                <th>ALAMAT</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-bold-500"><?= $d['nik'] ?></td>
                                                <td><?= $d['nama'] ?></td>
                                                <td class="text-bold-500"><?= $d['umur'] ?></td>
                                                <td><?= $d['alamat'] ?></td>
                                                <td>
                                                    <a href="./lihatdata.php?nik=<?= $d['nik']; ?>"><button class="btn btn-primary my-2">Lihat Data Diri</button></a>
                                                    <a href="./lihatrekam.php?nik=<?= $d['nik']; ?>"><button class="btn btn-success my-2">Lihat Rekam Medis</button></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
    else{
        ?>
                <div class="row" id="table-bordered">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Penduduk</h4>
                            </div>
                            <div class="card-content">
                                <!-- table bordered -->
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>NIK</th>
                                                <th>NAMA</th>
                                                <th>UMUR</th>
                                                <th>ALAMAT</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="5" class="text-center text-danger">Data penduduk tidak ditemukan !</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
    }
    
    
?>