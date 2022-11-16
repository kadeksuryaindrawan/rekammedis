<?php
    require_once "../../config/connection.php";
    
    extract($_POST);

    $level = $_SESSION['user_login']['level'];

    $query_insert = mysqli_query($connection, "INSERT INTO tbrekammedis VALUES (NULL, '$nik', '$sakit', '$pemeriksaan','$pengobatan','$lainnya', now())");
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