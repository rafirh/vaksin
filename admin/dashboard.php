<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php
  session_start();  
  
  if($_SESSION['status_admin']!=true){
    header('Location: ../index.php');
  }
  include '../conn.php';
  $id = 1;
  $query1 = mysqli_query($conn, "select * from admin where id = '".$id."'");
  $data_admin=mysqli_fetch_array($query1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/vaccine.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin | Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="dashboard.php" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/vaccine.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="dashboard.php" class="simple-text logo-normal">
          Admin Vaksin
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="./dashboard.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="./tabel-siswa.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>Tabel Siswa</p>
            </a>
          </li>
          <li>
              <a href="./tabel-akun.php">
                <i class="nc-icon nc-tile-56"></i>
                <p>Tabel Akun</p>
              </a>
          </li>
          <li>
            <a href="./tabel-sekolah.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>Tabel Sekolah</p>
            </a>
          </li>
          <li>
            <a href="./tabel-jadwal.php">
              <i class="nc-icon nc-calendar-60"></i>
              <p>Tabel Jadwal</p>
            </a>
          </li>            
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="dashboard.php">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block"></span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="../logout.php">Log Out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Profile</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="">
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Company (disabled)</label>
                        <input
                          type="text"
                          class="form-control"
                          disabled=""
                          placeholder="Company"
                          value="PT Venturo Pro Indonesia"
                        />
                      </div>
                    </div>
                    
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" class="form-control" placeholder="Email" value="<?=$data_admin['email']?>" name="email" required/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 pr-1">
                      <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" placeholder="Name" value="<?=$data_admin['nama']?>" name="fullname" required/>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Gender</label>
                        <input type="text" class="form-control" placeholder="Gender" value="<?=$data_admin['kelamin']?>" name="kelamin" required/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 pr-1">
                      <div class="form-group">
                        <label>Address</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Address"
                          name="address"
                          value="<?=$data_admin['alamat']?>"
                          required
                        />
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Place and Date of Birth</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Place and Date of Birth"
                          name="tt_lahir"
                          value="<?=$data_admin['tt_lahir']?>"
                          required
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="City" value="<?=$data_admin['kota']?>" name="city" required/>
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" placeholder="Country" value="<?=$data_admin['negara']?>" name="country" required/>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>No. Telphone</label>
                        <input type="text" class="form-control" placeholder="Telephone" value="<?=$data_admin['telp']?>" name="telp" required/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About Me</label>
                        <input class="form-control textarea" name="about" value="<?=$data_admin['about']?>"></input>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round" name="submit">Perbarui Profile</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Kata Sandi</h5>
              </div>
              <div class="card-body">
                <form method="post">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kata Sandi Sekarang</label>
                        <input
                          type="password"
                          class="form-control"
                          placeholder="Password"
                          name="password"
                          required
                        />
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kata Sandi Baru</label>
                        <input type="password" class="form-control" placeholder="New Password" name="newpw" required/>
                      </div>
                    </div>
                  </div>
                    
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Ulangi Kata Sandi Baru</label>
                        <input type="password" class="form-control" placeholder="New Password" name="cnewpw" required/>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round" name="submit-pw">Perbarui Kata Sandi</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../dist/sweetalert2.all.min.js"></script>
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
  
</body>
</html>

<?php
  if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $nama = $_POST['fullname'];
    $kelamin = $_POST['kelamin'];
    $alamat = $_POST['address'];
    $kota = $_POST['city'];
    $negara = $_POST['country'];
    $telp = $_POST['telp'];
    $about = $_POST['about'];
    $lahir = $_POST['tt_lahir'];
    
    $query = mysqli_query($conn, "update admin set 
    email = '".$email."',
    nama = '".$nama."',
    kelamin = '".$kelamin."',
    alamat = '".$alamat."',
    kota = '".$kota."',
    negara = '".$negara."',
    telp = '".$telp."',
    about = '".$about."',
    tt_lahir = '".$lahir."'
    where id = '".$id."'");
    if($query){
      echo "<script>Swal.fire({
        icon: 'success',
        title: 'Update Berhasil',
        text: 'Mantap !'})
        setTimeout(function(){ 
          window.location.href = 'dashboard.php';
       }, 3000);       
        </script>";
    }else{
      echo "<script>Swal.fire({
        icon: 'error',
        title: 'Update Gagal',
        text: 'Coba Lagi'})
        </script>";
    }
  }
  if(isset($_POST['submit-pw'])){
    
    $password = $_POST['password'];
    $newpw = $_POST['newpw'];
    $cnewpw = $_POST['cnewpw'];
    $cek = mysqli_query($conn, "select * from admin where password = '".md5($password)."'");
    if(mysqli_num_rows($cek)>0){
      //password sama
      if($newpw == $cnewpw){
        $query = mysqli_query($conn, "update admin set 
        password = '".md5($newpw)."'
        where id = '".$id."'");
        if($query){
          echo "<script>Swal.fire({
            icon: 'success',
            title: 'Update Berhasil',
            text: 'Mantap !'})
            setTimeout(function(){ 
            window.location.href = 'dashboard.php';
            }, 3000);       
            </script>";
        }else{
          echo "<script>Swal.fire({
            icon: 'error',
            title: 'Update Gagal',
            text: 'Coba Lagi'})
            </script>";
        }
      }else{
        //password not match
        echo "<script>Swal.fire({
          icon: 'error',
          title: 'Password Baru Tidak Cocok',
          text: 'Coba Lagi'})
          </script>";
      }
    }else{
      //password tidak sama dengan sekarang
      echo "<script>Swal.fire({
        icon: 'error',
        title: 'Password Sekarang Salah',
        text: 'Coba Lagi'})
        </script>";
    }
    
    
  }
?>
