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

							$_SESSION['user_login']['email'] = $data_user['email'];
							$_SESSION['user_login']['user_id'] = $data_user['user_id'];
                            $_SESSION['user_login']['level'] = $data_user['level'];

							echo"
									<script>
										alert('Login Sukses');
										location.href = '../app/dashboard.php';
									</script>
								";
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