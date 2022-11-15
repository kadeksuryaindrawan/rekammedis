<?php
    require_once "../../config/connection.php";
    
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO `tbdokter` (`id_dokter`, `id_user`, `nama`, `telp`, `alamat`)
    VALUES
     (NULL, '".$id_user."','".$nama."','".$telp."','".$alamat."');";

    $query = mysqli_query($connection, $sql);
    if($query){
        header("location:../../app/admin/dokter.php");
    }else{
        echo "
				<script>
					alert('Gagal Tambah Data');
					location.href = '../../app/admin/tambahdokter.php'
				</script>
			";
    }
?>