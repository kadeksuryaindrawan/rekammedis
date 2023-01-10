<?php
session_start();
    require_once "../../config/connection.php";

    $level = $_SESSION['user_login']['level'];
    $id_rekammedis = $_GET['id_rekammedis'];
    
    $query_rekam = mysqli_query($connection,"SELECT * FROM tbrekammedis WHERE id_rekammedis = $id_rekammedis");
    $data = mysqli_fetch_assoc($query_rekam);
    $nik = $data['nik'];

    $sql1 = "DELETE FROM tbrekammedis WHERE id_rekammedis='".$id_rekammedis."'";

    $query = mysqli_query($connection, $sql1);
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
					alert('Gagal Hapus Data');
					location.href = '../../app/admin/lihatrekam.php?nik=".$nik."'
				</script>
			";
        }
        else{
            echo "
				<script>
					alert('Gagal Hapus Data');
					location.href = '../../app/dokter/lihatrekam.php?nik=".$nik."'
				</script>
			";
        }
        
    }
?>