<?php
session_start();
    require_once "../../config/connection.php";

    $level = $_SESSION['user_login']['level'];

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

    if($level == 'admin'){
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
    }else if($level == 'dokter'){
        if($query && $query2){
            header("location:../../app/dokter/profile.php");
        }else{
            echo "
                    <script>
                        alert('Gagal Edit Data');
                        location.href = '../../app/dokter/profile.php'
                    </script>
                ";
        }
    }
?>