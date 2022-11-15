<?php
    require_once "../../config/connection.php";
    $id = $_GET['id'];
    $sql1 = "DELETE FROM tbdokter WHERE id_user='".$id."'";
    $sql2 = "DELETE FROM tbusers WHERE id_user='".$id."'";

    $query = mysqli_query($connection, $sql1);
    $query2 = mysqli_query($connection, $sql2);
    if($query && $query2){
        header("location:../../app/admin/dokter.php");
    }else{
        echo "
				<script>
					alert('Gagal Hapus Data');
					location.href = '../../app/admin/dokter.php'
				</script>
			";
    }
?>