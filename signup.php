
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up | Vaksin</title>
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
						Daftar Siswa
					</span>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Full name is required">
						<input class="input100" type="text" name="name" placeholder="Nama Lengkap">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-user"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Kata sandi" id="pw1">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="re-password" placeholder="Ulangi Kata Sandi" id="pw2">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>
                    <div id="infopw" class="text-danger"></div>
					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn" type="submit" name="submit" id="btn-daftar">
							Daftar
						</button>
					</div>
					<!-- Pengecekan password -->
					
					<div class="text-center w-full p-t-115">
						<span class="txt1">
							Sudah punya akun ?
						</span>

						<a class="txt1 bo1 hov1" href="login.php">
							Login sekarang							
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
    include './conn.php';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
		$password2 = $_POST['re-password'];
		date_default_timezone_set('Asia/Jakarta');
		$date = date("l, d-M-Y H:i:s");
		if($password == $password2){
			$query = mysqli_query($conn, " insert into akun (nama, email, password, tgl_daftar) value ('".$name."','".$email."','".md5($password)."','".$date."')");
        
        if($query){
            echo "<script>Swal.fire({
                icon: 'success',
                title: 'Added success',
                text: 'Go to the login page to login !'})
				setTimeout(function(){ 
					window.location.href = 'login.php';
				}, 3000);
                </script>";
            }else{
                echo "<script>Swal.fire({
                icon: 'error',
                title: 'Email telah digunakan',
                text: 'Silahkan gunakan email yang lain !'})
				
                </script>";
        }
		}else{
			echo "<script>Swal.fire({
                icon: 'error',
                title: 'Password tidak cocok',
                text: 'Silahkan cocokan kembali !'})
    
                </script>";
		}
        
    }
?>