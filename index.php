<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | Vaksin</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
	
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form" method="POST" action=>
					<span class="login100-form-title p-b-55">
						Login Siswa
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Kata sandi">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>
					
					
					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn" type="submit" name="submit">
							Login
						</button>
					</div>

					<div class="text-center w-full p-t-42 p-b-22">
						<span class="txt1">
							Atau login dengan
						</span>
					</div>

					<a href="#" class="btn-face m-b-10">
						<i class="fa fa-facebook-official"></i>
						Facebook
					</a>

					<a href="#" class="btn-google m-b-10">
						<img src="images/icons/icon-google.png" alt="GOOGLE">
						Google
					</a>

					<div class="text-center w-full p-t-115">
						<span class="txt1">
							Belum punya akun ?
						</span>

						<a class="txt1 bo1 hov1" href="signup.php">
							Daftar sekarang						
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="dist/sweetalert2.all.min.js"></script>

</body>
</html>
<?php
	include "conn.php";
	if($_POST){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$query = mysqli_query($conn, "select * from admin where email = '".$email."' and password = '".md5($password)."'");

		if(mysqli_num_rows($query)>0){
			$_SESSION['status_admin']=true;
			echo "<script>location.href='./admin/dashboard.php'</script>";
		}else{
			$query2 = mysqli_query($conn, "select * from akun where email = '".$email."' and password = '".md5($password)."'");						
		
			if(mysqli_num_rows($query2)>0){
				$data_login=mysqli_fetch_array($query2);
				$_SESSION['login']=true;
				$_SESSION['id_akun']=$data_login['id'];
	
				echo "<script>location.href='app/index.php'</script>";
			}else{
				echo "<script>Swal.fire({
					icon: 'error',
					title: 'Invalid Login',
					text: 'Please try again !'})
					</script>";	
			}
		}
		
	}
?>