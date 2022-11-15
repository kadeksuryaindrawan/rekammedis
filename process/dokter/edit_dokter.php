<?php
    require_once "../../config/connection.php";
    $sql = "UPDATE tbdokter
        SET 
            id_user = '".$_POST['id_user']."',
            nama = '".$_POST['nama']."',
            telp = '".$_POST['telp']."',
            alamat = '".$_POST['alamat']."'
        WHERE id_dokter = '".$_POST['id_dokter']."'";

    $query = mysqli_query($connection, $sql);
    if($query){
        header("location:../../app/admin/dokter.php");
    }else{
        echo "
				<script>
					alert('Gagal Tambah Data');
					location.href = '../../app/admin/dokter.php'
				</script>
			";
    }
?>