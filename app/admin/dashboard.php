<?php
$page = 'dashboard';
include "../layout/header.php";
?>

<div class="page-heading">
    <h3>Dashboard</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <?php
            $dokter = mysqli_query($connection, "SELECT COUNT(*) AS total FROM tbdokter");
            $datadokter = mysqli_fetch_assoc($dokter);
            $hasildokter = $datadokter['total'];

            $rekammedis = mysqli_query($connection, "SELECT COUNT(*) AS total FROM tbrekammedis");
            $datarekammedis = mysqli_fetch_assoc($rekammedis);
            $hasilrekammedis = $datarekammedis['total'];
            ?>
            <div class="row">
                <div class="col-12 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Jumlah Dokter</h6>
                                    <h6 class="font-extrabold mb-0"><?= $hasildokter ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldDocument"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Jumlah Rekam Medis</h6>
                                    <h6 class="font-extrabold mb-0"><?= $hasilrekammedis ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldDocument"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Jumlah Laporan</h6>
                                    <h6 class="font-extrabold mb-0"><?= $hasilrekammedis ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-12 col-lg-12">

            <div class="card">
                <div class="card-header">
                    <h4>Jenis Penyakit</h4>
                </div>
                <div class="card-body">
                    <div id="chart-visitors-profile"></div>
                </div>
            </div>
        </div>
    </section>
</div>


<script>
    <?php
    $jenis = mysqli_query($connection, "SELECT COUNT(*) AS total, SUM(IF(jenis_penyakit='Umum',1,0)) AS umum, SUM(IF(jenis_penyakit='Khusus',1,0)) AS khusus, SUM(IF(jenis_penyakit!='Umum' AND jenis_penyakit != 'Khusus',1,0)) AS lainnya FROM tbrekammedis");
    $data = mysqli_fetch_assoc($jenis);
    $hasilumum = ($data['umum']);
    $hasilkhusus = ($data['khusus']);
    $hasillainnya = ($data['lainnya']);
    ?>
    let optionsVisitorsProfile = {
        series: [<?= $hasilumum ?>, <?= $hasilkhusus ?>, <?= $hasillainnya ?>],
        labels: ['Umum', 'Khusus', 'Lainnya'],
        colors: ['#435ebe', '#55c6e8', '#e67e22'],
        chart: {
            type: 'donut',
            width: '100%',
            height: '350px'
        },
        legend: {
            position: 'bottom'
        },
        plotOptions: {
            pie: {
                donut: {
                    size: '30%'
                }
            }
        }
    }
</script>
<?php
include "../layout/footer.php";
if (isset($_SESSION['login_success'])) { ?>
    <script>
        Toastify({
            text: "<?=$_SESSION['login_success']?>",
            duration: 3000,
            destination: "https://github.com/apvarun/toastify-js",
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
            }
        }).showToast();
    </script>
<?php
}
unset($_SESSION['login_success']);
?>