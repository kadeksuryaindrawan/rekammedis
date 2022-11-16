<?php
    $page = 'rekammedis';
    include "../layout/header.php";
?>
            
            <div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-12 order-md-1 order-last">
                <h3>Rekam Medis Pasien</h3>
                <div class="my-5">
                    <div class="row">
                        <div class="col-12">
                            <label for="nik" class="label mb-3">Cari Data Penduduk Dengan NIK</label>
                            <input type="number" id="nik" class="form-control" name="nik" placeholder="Masukkan NIK">
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dokter</li>
                    </ol>
                </nav>
            </div> -->
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section" id="dataPenduduk">
    

    </section>
    <!-- Basic Tables end -->
</div>

<script>
    $(document).ready(function(){
        $('#nik').change(function(event){
            var nik = $('#nik').val();
            $('#dataPenduduk').empty();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "datapenduduk.php",
                data: 'nik='+nik,
                success: function(data){
                    $('#dataPenduduk').append(data);
                }
            });
        });
    });
</script>

            
<?php
    include "../layout/footer.php";
?>