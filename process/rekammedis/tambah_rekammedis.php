<?php
    require_once "../../config/connection.php";
    session_start();
    extract($_POST);

    $level = $_SESSION['user_login']['level'];
    if($level == 'admin'){
        $query_insert = mysqli_query($connection, "INSERT INTO tbrekammedis VALUES (NULL, '$id_dokter', '$nik', '$sakit', '$jenis_penyakit', '$pemeriksaan','$alergi_obat','$pengobatan','$lainnya', now())");
    }
    else{
        $id = $_SESSION['user_login']['id_dokter'];
        $query_dokter = mysqli_query($connection,"SELECT * FROM tbdokter WHERE id_user = '$id'");
        $data_dokter = mysqli_fetch_assoc($query_dokter);
        $id_dok = $data_dokter['id_dokter'];
        $query_insert = mysqli_query($connection, "INSERT INTO tbrekammedis VALUES (NULL, '$id_dok', '$nik', '$sakit', '$jenis_penyakit', '$pemeriksaan','$alergi_obat','$pengobatan','$lainnya', now())");
    }
    
    if($query_insert){
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
					alert('Gagal Tambah Data');
					location.href = '../../app/admin/tambahrekammedis.php?nik=".$nik."'
				</script>
			";
        }
        else{
            echo "
				<script>
					alert('Gagal Tambah Data');
					location.href = '../../app/dokter/tambahrekammedis.php?nik=".$nik."'
				</script>
			";
        }
        
    }
?>