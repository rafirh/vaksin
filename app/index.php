
<?php
  session_start();  
  
  if($_SESSION['login']!=true){
    header('Location: ../index.php');
  }
  include '../conn.php';

  $qry4=mysqli_query($conn,"select * from siswa");
  $jumlah_siswa=mysqli_num_rows($qry4);
  $sisa_kuota=1000-$jumlah_siswa;

  $id = $_SESSION['id_akun'];
  $query1 = mysqli_query($conn, "select * from akun where id = '".$id."'");
  $data_akun=mysqli_fetch_array($query1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/vaccine.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Vaksin | Dashboard
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
  <style type="text/css">
    .font{
      font-size: 18px;
    }
  </style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="index.php" class="simple-text logo-mini">
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
          <li class="active">
            <a href="./index.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
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
            <a class="navbar-brand" href="index.php">Dashboard</a>
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
            <div class="card card-user pb-2">
              <div class="card-header">
                <h5 class="card-title">Selamat datang <span class="text-danger font-weight-bold"><?=$data_akun['nama']?></span></h5>
              </div>
            </div>
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title font-weight-bold">Gerai Vaksin Siswa SMAN Kota Malang</h5>
              </div>
              <div class="card-body">
                <p class="font">Pemerintah Kota Malang mengadakan vaksinasi untuk seluruh siswa/siswi SMA Negeri di Kota Malang dengan kuota sebanyak 1000 dosis vaksin. Kegiatan vaksinasi ini adalah salah satu upaya pemerintah untuk menanggulangi wabah Covid-19 agar cepat berakhir dan kegiatan belajar mengajar dapat berjalan norma kembali. Jika anda berkenan untung mendukung upaya pemerintah dan berpartisipasi dalam menanggulangi musibah ini, anda bisa mendaftarkan diri anda untuk mengikuti kegiatan vaksinasi ini. Anda bisa mendaftarkan diri anda dengan mengisi form yang ada di <a href="daftar-vaksin.php">sini</a>.</p>
              </div>
            </div>
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title font-weight-bold">Kenapa kita harus vaksin ?</h5>
              </div>
              <div class="card-body">
                <p class="font">Tahukah kamu bahwa tidak semua orang bisa divaksinasi? Orang-orang yang memiliki penyakit berat, alergi, hingga alasan umur umumnya tidak disarankan mendapatkan vaksin, karena mempunyai tendensi komplikasi. Jadi, mereka yang tidak bisa divaksin ini menggantungkan harapannya kepada kita yang memenuhi syarat untuk divaksinasi agar virus ini tidak semakin menyebar. Ketika kamu divaksinasi, kemungkinan untuk menularkan penyakit ke orang lain tentu akan berkurang, karena risiko tubuhmu untuk terinfeksi penyakit pun turut berkurang. Dengan mengikuti vaksinasi Covid-19, kita tak hanya menyelamatkan diri sendiri, namun juga melindungi mereka yang rentan.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <?php
              $qry3 = mysqli_query($conn,"select * from siswa where email='".$data_akun['email']."'");
              $cek_daftar = mysqli_num_rows($qry3);
              if($cek_daftar<1){
            ?>
            <div class="row">
              <div class="card card-user pb-2">
                <div class="card-header">
                  <h5 class="card-title">Hanya tersisa <span class="text-danger font-weight-bold"><?=$sisa_kuota?></span> kuota vaksin. <br>Cepat daftarkan diri anda !</h5>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="card card-user pb-2">
                <div class="card-header">
                  <h5 class="card-title"><a href="daftar-vaksin.php" class="btn btn-success">Klik di disini untuk daftar</a></h5>
                </div>
              </div>
            </div> 
            <?php
              }else{
            ?>
            <div class="row">
              <div class="card card-user pb-2">
                <div class="card-header">
                  <h5 class="card-title"><span class="text-danger font-weight-bold">Terimakasih</span> telah mendaftarkan diri anda. Mohon <span class="text-danger font-weight-bold">datang</span> tepat waktu sesuai jadwal.</h5>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="card card-user pb-2">
                <div class="card-header">
                  <h5 class="card-title"><a onclick="Bataldaftar()" class="btn btn-danger text-white">Klik di Sini Untuk Batal Daftar vaksinasi</a></h5>
                </div>
              </div>
            </div>   
            <?php
              }
            ?>
            <div class="row">
              <div class="card card-user pb-2">
                <div class="card-header">
                  <h5 class="card-title font-weight-bold">Daftar Sekolah yang Terdaftar</h5>
                </div>
                <div class="card-body">
                  <?php
                    $no=0;
                    $qry2 = mysqli_query($conn,"select * from sekolah order by id_sekolah");
                    while($data_sekolah = mysqli_fetch_array($qry2)){
                      $no++;
                      echo'<p class="font">'.$no.'). '.$data_sekolah["nama_sekolah"].'</p>';
                    }
                  ?>
                </div>
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
    function Bataldaftar(){
      let valid = prompt('Ketik "saya yakin untuk batal ikut vaksinasi" !');
        document.getElementById("pernyataan").value = valid;
        if (valid) {
          document.getElementById("form").submit();
        }
        
    }
  </script>
  <form action="batal-daftar.php" method="POST" id="form">
    <input type="hidden" id="pernyataan" name="valid">
    <input type="hidden" name="email_siswa" value="<?=$data_akun['email']?>">
  </form>
</body>
</html>

