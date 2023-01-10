<?php
session_start();
    require_once "../../config/connection.php";

    extract($_POST);
    $level = $_SESSION['user_login']['level'];
    $query_rekam = mysqli_query($connection,"SELECT * FROM tbrekammedis WHERE id_rekammedis = $id_rekammedis");
    $data = mysqli_fetch_assoc($query_rekam);
    $nik = $data['nik'];

    $query = mysqli_query($connection, "UPDATE tbrekammedis SET sakit = '$sakit', pemeriksaan = '$pemeriksaan', alergi_obat = '$alergi_obat', pengobatan = '$pengobatan', lainnya = '$lainnya' WHERE id_rekammedis = $id_rekammedis");
    if($query){
        if($level == 'admin'){
            header("location:../../app/admin/lihatrekam.php?nik=$nik");
        }
        else{
            header("location:../../app/dokter/lihatrekam.php?nik=$nik");
        }
        
    }else{
        if($level == 'admin'){
            echo "
				<script>
					alert('Gagal Edit Data');
					location.href = '../../app/admin/editrekammedis.php?id_rekammedis=".$id_rekammedis."'
				</script>
			";
        }
        else{
            echo "
				<script>
					alert('Gagal Edit Data');
					location.href = '../../app/dokter/editrekammedis.php?id_rekammedis=".$id_rekammedis."'
				</script>
			";
        }
        
    }
?>