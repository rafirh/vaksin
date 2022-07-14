
<?php
  session_start();  
  
  if($_SESSION['login']!=true){
    header('Location: ../index.php');
  }
  include '../conn.php';
  $id_akun=$_SESSION['id_akun'];
  $qry1 = mysqli_query($conn,"select * from akun join siswa on akun.email=siswa.email where id='".$id_akun."'");
  $data_siswa = mysqli_fetch_array($qry1);

  $qry3 = mysqli_query($conn, "select * from akun where id='".$id_akun."'");
  $data_akun = mysqli_fetch_array($qry3);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/vaccine.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Vaksin | Profil
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link rel="stylesheet" href="../css/util.css">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="dashboard.php" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/vaccine.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="index.php" class="simple-text logo-normal">
          Daftar Vaksin
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./index.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="active">
            <a href="./profil.php">
              <i class="nc-icon nc-badge"></i>
              <p>Profile Saya</p>
            </a>
          </li>
          <li>
            <a href="./data-covid.php">
              <i class="nc-icon nc-chart-bar-32"></i>
              <p>Data Corona</p>
            </a>
          </li>
          <li>
            <a href="./jadwal-vaksin.php">
              <i class="nc-icon nc-calendar-60"></i>
              <p>Jadwal Vaksin</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel min-h-full">
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
            <a class="navbar-brand" href="profil.php">Profile</a>
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
          <?php
              $qry6 = mysqli_query($conn,"select * from siswa where email='".$data_akun['email']."'");
              $cek_daftar = mysqli_num_rows($qry6);
              if($cek_daftar>0){
            $qry2 = mysqli_query($conn, "select * from sekolah where id_sekolah = '".$data_siswa['id_sekolah']."'");
            $data_sekolah=mysqli_fetch_array($qry2);
            ?>
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Profile Saya</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Nama Lengkap"
                          name="nama"
                          value="<?=$data_siswa['nama']?>"
                          required/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" 
                        class="form-control" 
                        placeholder="Email" 
                        value="<?=$data_siswa['email']?>" 
                        name="email"
                        required/>
                      </div>
                    </div>  
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>NIS</label>
                        <input type="number" class="form-control" placeholder="NIS" value="<?=$data_siswa['nis']?>" name="nis" required/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Gender</label>
                            <select class="form-control" name="kelamin" required/>
                                <option value="<?=$data_siswa['kelamin']?>"><?=$data_siswa['kelamin']?></option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input
                          type="date"
                          class="form-control"
                          name="tgl_lahir"
                          value="<?=$data_siswa['tgl_lahir']?>"
                          required
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Sekolah</label>
                        <select class="form-control" name="sekolah" required/>
                            <option value="<?=$data_siswa['id_sekolah']?>"><?=$data_sekolah['nama_sekolah']?></option>
                            <?php
                                $qry5=mysqli_query($conn, "select * from sekolah");
                                while($data_sekolah1=mysqli_fetch_array($qry5)){
                                    echo '<option value="'.$data_sekolah1['id_sekolah'].'">'.$data_sekolah1['nama_sekolah'].'</option>';
                                }
                            ?>
                        </select>
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
            <?php
              }else{
            ?>
            <div class="card card-user align-items-center">
                <div class="card-header">
                    <h5 class="card-title text-danger font-weight-bold">
                        Fitur Terkunci !
                    </h5>
                </div>
                    <br><br><br><br>
                    <p class="fs-20">Daftarkan diri anda untuk membuka fitur ini.</p>
                    <br><br><br><br>
                    <a href="daftar-vaksin.php" class="btn btn-success btn-round">Klik Disini Untuk Daftar Vaksin</a>
                    <br><br>
            </div>
            <?php
              } 
            ?>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Ubah Kata Sandi</h5>
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
    $nama = $_POST['nama'];
    $kelamin = $_POST['kelamin'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $nis = $_POST['nis'];
    $sekolah = $_POST['sekolah'];
    $id_siswa = $data_siswa['id_siswa'];
    
    $query = mysqli_query($conn, "update siswa set 
    email = '".$email."',
    nama = '".$nama."',
    kelamin = '".$kelamin."',
    tgl_lahir = '".$tgl_lahir."',
    id_sekolah = '".$sekolah."',
    nis = '".$nis."'
    where id_siswa = '".$id_siswa."'");

    $query2 = mysqli_query($conn, "update akun set
    nama = '".$nama."',
    email = '".$email."'
    where id = '".$id_akun."'");

    if($query && $query2){
      echo "<script>Swal.fire({
        icon: 'success',
        title: 'Update Berhasil',
        text: 'Mantap !'})
        setTimeout(function(){ 
          window.location.href = 'profil.php';
       }, 3000);       
        </script>";
    }else{
      echo "<script>Swal.fire({
        icon: 'error',
        title: 'Update Gagal',
        text: 'Karena email atau NIS sudah digunakan'})
        </script>";
    }
  }
  if(isset($_POST['submit-pw'])){
    $password = $_POST['password'];
    $newpw = $_POST['newpw'];
    $cnewpw = $_POST['cnewpw'];
    $cek = mysqli_query($conn, "select * from akun where password = '".md5($password)."' and id='".$id_akun."'");
    if(mysqli_num_rows($cek)>0){ 
      //password sama
      if($newpw == $cnewpw){
        $query1 = mysqli_query($conn, "update akun set 
        password = '".md5($newpw)."'
        where email = '".$data_siswa['email']."'");
        if($query1){
          echo "<script>Swal.fire({
            icon: 'success',
            title: 'Update Berhasil',
            text: 'Mantap !'})
            setTimeout(function(){ 
            window.location.href = 'profil.php';
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
