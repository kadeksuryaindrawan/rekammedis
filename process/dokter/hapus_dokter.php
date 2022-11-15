<?php
    require_once "../../config/connection.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM tbdokter WHERE id_dokter='".$id."'";

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