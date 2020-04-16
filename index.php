<?php 
@session_start();
include 'config/koneksi.php';
 if (isset($_POST['masuk'])){
 	$username = $_POST['username'];
 	$password = $_POST['pass'];
 	$sql = mysqli_query($con, "SELECT * FROM tbl_user WHERE username = '$username' and password = '$password'");
	$cek = mysqli_num_rows($sql);
	$f = mysqli_fetch_array($sql);
	if($cek>0){
		$_SESSION['username'] = $username;
		echo "<script>alert('Selamat Datang $username');document.location.href='page/hal_utama.php'</script>";
	}else {
		echo "<script>alert('Username Atau Password Salah !');document.location.href='index.php'</script>";
	}
 }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Survey Covid-19</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Css/util.css">
	<link rel="stylesheet" type="text/css" href="Css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form bg-dark validate-form" method="post">
					<span class="login100-form-title text-light  p-b-43">
						Survey Covid-19
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Kolom harus di isi">
						<input class="input100 text-light" type="text" name="username">
						<span class="focus-input100 "></span>
						<span class="label-input100 text-light">Nama</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100 text-light" type="password" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100 text-light">Password</span>
					</div>
					<div>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="masuk">
							Masuk
						</button>
					</div>
					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<a href="daftar.php" class="btn text-light">Daftar akun</a>
					</div>
				</form>

				<div class="login100-more" style="background: url('img/Back.png'); background-repeat: no-repeat; background-size: cover; background-position: center;">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>