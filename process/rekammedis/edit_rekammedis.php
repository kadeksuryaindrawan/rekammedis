<?php
    require_once "../../config/connection.php";

    extract($_POST);

    $query_rekam = mysqli_query($connection,"SELECT * FROM tbrekammedis WHERE id_rekammedis = $id_rekammedis");
    $data = mysqli_fetch_assoc($query_rekam);
    $nik = $data['nik'];

    $query = mysqli_query($connection, "UPDATE tbrekammedis SET sakit = '$sakit', pemeriksaan = '$pemeriksaan', pengobatan = '$pengobatan', lainnya = '$lainnya' WHERE id_rekammedis = $id_rekammedis");
    if($query){
        header("location:../../app/admin/lihatrekam.php?nik=$nik");
    }else{
        echo "
				<script>
					alert('Gagal Edit Data');
					location.href = '../../app/admin/editrekammedis.php?id_rekammedis=".$id_rekammedis."'
				</script>
			";
    }
?>