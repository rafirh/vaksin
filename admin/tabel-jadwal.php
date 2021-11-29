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
    header('Location: ../login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/vaccine.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin | Tabel Jadwal</title>
    <meta
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no"
      name="viewport"
    />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CSS Files -->
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
              <img src="../assets/img/vaccine.png" />
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
            <li>
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
            <li class="active">
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
              <a class="navbar-brand" href="tabel-akun.php">Tabel Jadwal</a>
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
                <a href="tambah-jadwal.php" class="btn btn-info ml-4 mb-5">Tambah Jadwal</a>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Jadwal</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <?php
                                    include '../conn.php';
                                        $tampil = mysqli_query($conn, "select * from jadwal");
                                        $no = 0;
                                    ?>
                                    <thead class="text-primary">
                                        <th>No</th>
                                        <th>Sesi</th>
                                        <th>No. Antrian</th>
                                        <th>Waktu</th>
                                        <th>Tanggal</th>
                                        <th>Tempat</th>
                                        <th style="text-align:center">Action</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                        while($data = mysqli_fetch_array($tampil)){
                                            $no++;
                                    ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$data['sesi']?></td>
                                            <td><?=$data['antrian']?></td>
                                            <td><?=$data['jam']?></td>
                                            <td><?=$data['tanggal']?></td>
                                            <td><?=$data['tempat']?></td>
                                            <td style="text-align:center">
                                                <a href="edit-jadwal.php?id_jadwal=<?=$data['id_jadwal']?>" class="btn btn-success">Ubah</a> |
                                                <a href="delete-jadwal.php?id_jadwal=<?=$data['id_jadwal']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                                            </td>                                            
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    
    <!--   Core JS Files   -->
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
    <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    
  </body>
</html>

