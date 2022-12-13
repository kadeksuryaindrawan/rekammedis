<?php
    require_once "../../config/connection.php";
    $sql1 = "UPDATE tbdokter
        SET 
            nama_dokter = '".$_POST['nama_dokter']."',
            telp = '".$_POST['telp']."',
            alamat = '".$_POST['alamat']."'
        WHERE id_user = '".$_POST['id_user']."'";

        $sql2 = "UPDATE tbusers
        SET 
            email = '".$_POST['email']."'
        WHERE id_user = '".$_POST['id_user']."'";

    $query = mysqli_query($connection, $sql1);
    $query2 = mysqli_query($connection, $sql2);
    if($query && $query2){
        header("location:../../app/admin/dokter.php");
    }else{
        echo "
				<script>
					alert('Gagal Edit Data');
					location.href = '../../app/admin/dokter.php'
				</script>
			";
    }
?>