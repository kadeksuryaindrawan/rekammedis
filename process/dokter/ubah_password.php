<?php
    require_once "../../config/connection.php";
    
    $password = $_POST['password'];
    $id_user = $_POST['id_user'];

    $encrypted_password = password_hash($password,PASSWORD_BCRYPT, ['cost' => 12]);

    $query= mysqli_query($connection, "UPDATE tbusers SET password = '$encrypted_password' WHERE id_user = $id_user");
    if($query){
        header("location:../../app/admin/dokter.php");
    }else{
        echo "
				<script>
					alert('Gagal Ubah password');
					location.href = '../../app/admin/dokter.php'
				</script>
			";
    }
?>