<?php
	require_once "../config/connection.php";
	session_start();

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password)){
			$query_check = mysqli_query($connection, "SELECT * FROM tbusers WHERE email = '$email'");

			if(mysqli_num_rows($query_check) == 1){
					$data_user = mysqli_fetch_assoc($query_check);
					$encrypted_password = $data_user['password'];

					if(password_verify($password,$encrypted_password)){
                    
                        $level = $data_user['level'];
                        if($level == 'admin'){
							$_SESSION['user_login']['email'] = $data_user['email'];
							$_SESSION['user_login']['id_admin'] = $data_user['id_user'];
                            $_SESSION['user_login']['level'] = $data_user['level'];

							echo"
									<script>
										alert('Login Sukses');
										location.href = '../app/admin/dashboard.php';
									</script>
								";
						}

                        else if($level == 'dokter'){
							$_SESSION['user_login']['email'] = $data_user['email'];
							$_SESSION['user_login']['id_dokter'] = $data_user['id_user'];
                            $_SESSION['user_login']['level'] = $data_user['level'];

							echo"
									<script>
										alert('Login Sukses');
										location.href = '../app/dokter/dashboard.php';
									</script>
								";
						}
                        else{
							$pesan = "Gagal login!";
						}

							
					}
					else{
						$pesan = "Email / Password Salah!";
					}
				
			}
			else{
				$pesan = "Email / Password tidak terdaftar!";
			}
		}
		else{
			$pesan = "Isikan sesuatu!";
		}

		echo "
				<script>
					alert('$pesan');
					location.href = '../index.php'
				</script>
			";

	}
	else{
		header("location: ../index.php");
	}

?>