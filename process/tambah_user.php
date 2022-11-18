<?php
    require_once "../config/connection.php";
    $email = $_POST['email'];
    $password = $_POST['password'];

    $encrypted_password = password_hash($password,PASSWORD_BCRYPT, ['cost' => 12]);

    $query_insert = mysqli_query($connection, "INSERT INTO tbusers VALUES (NULL, '$email', '$encrypted_password', 'dokter')");
    if($query_insert){
        echo "berhasil";
    }else{
        echo "gagal";
    }

?>