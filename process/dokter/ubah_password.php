<?php
session_start();
    require_once "../../config/connection.php";
    
    $password = $_POST['password'];
    $id_user = $_POST['id_user'];

    $level = $_SESSION['user_login']['level'];

    $encrypted_password = password_hash($password,PASSWORD_BCRYPT, ['cost' => 12]);

    $query= mysqli_query($connection, "UPDATE tbusers SET password = '$encrypted_password' WHERE id_user = $id_user");

    if($level == 'admin'){
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
    }else if($level == 'dokter'){
        if($query){
            header("location:../../app/dokter/profile.php");
        }else{
            echo "
                    <script>
                        alert('Gagal Ubah password');
                        location.href = '../../app/dokter/profile.php'
                    </script>
                ";
        }
    }
?>