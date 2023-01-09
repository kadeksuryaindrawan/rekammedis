<?php
    require_once "../../config/connection.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama_dokter = $_POST['nama_dokter'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $encrypted_password = password_hash($password,PASSWORD_BCRYPT, ['cost' => 12]);

    $query_insert = mysqli_query($connection, "INSERT INTO tbusers VALUES (NULL, '$email', '$encrypted_password', 'dokter')");
    $query_check = mysqli_query($connection, "SELECT * FROM tbusers WHERE email = '$email'");
    $data_dokter = mysqli_fetch_assoc($query_check);
    $id_user = $data_dokter['id_user'];

    $sql = "INSERT INTO `tbdokter`
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