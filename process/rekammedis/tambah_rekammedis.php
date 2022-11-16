<?php
    require_once "../../config/connection.php";
    
    extract($_POST);

    $query_insert = mysqli_query($connection, "INSERT INTO tbrekammedis VALUES (NULL, '$nik', '$sakit', '$pemeriksaan','$pengobatan','$lainnya', now())");
    if($query_insert){
        header("location:../../app/admin/lihatrekam.php?nik=$nik");
    }else{
        echo "
				<script>
					alert('Gagal Tambah Data');
					location.href = '../../app/admin/tambahrekammedis.php?nik=".$nik."'
				</script>
			";
    }
?>