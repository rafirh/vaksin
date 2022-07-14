<?php
    session_start();  
  
    if($_SESSION['login']!=true){
      header('Location: ../index.php');
    }
    $api = file_get_contents("https://api.kawalcorona.com/indonesia/");
    $data_corona = json_decode($api, true);

    $api2 = file_get_contents("https://api.kawalcorona.com/positif/");
    $data_positif = json_decode($api2, true);
    $api = file_get_contents("https://api.kawalcorona.com/meninggal/");
    $data_meninggal = json_decode($api, true);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/vaccine.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
      Vaksin | Data Corona
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
            <li>
              <a href="./profil.php">
                <i class="nc-icon nc-badge"></i>
                <p>Profile Saya</p>
              </a>
            </li>
            <li class="active">
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
              <a class="navbar-brand" href="data-corona.php">Data Corona</a>
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
          <div class="dunia">
            <div class="row mb-2">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <div class="card card-user pb-2">
                  <div class="card-header">
                    <h4 class="card-title text-danger font-weight-bold text-center">Seluruh Dunia</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-4"></div>
            </div>
            <div class="row">
              <div class="col-lg-2 col-md-6 col-sm-6"></div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                          <i class="nc-icon nc-ambulance text-warning"></i>
                        </div>
                      </div>
                      <div class="col-7 col-md-8">
                        <div class="numbers">
                          <p class="card-category">Positif</p>
                          <p class="card-title"><?=$data_positif['value']?><p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <hr>
                    <div class="stats">
                      <a href="data-covid.php">
                        <i class="fa fa-refresh"></i>
                        Update now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                          <i class="nc-icon nc-favourite-28 text-danger"></i>
                        </div>
                      </div>
                      <div class="col-7 col-md-8">
                        <div class="numbers">
                          <p class="card-category">Meninggal</p>
                          <p class="card-title"><?=$data_meninggal['value']?><p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <hr>
                    <div class="stats">
                      <a href="data-covid.php">
                        <i class="fa fa-refresh"></i>
                        Update now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-6 col-sm-6"></div>
            </div>
          </div>
          <hr>
          <div class="indonesia">
            <div class="row mb-2">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <div class="card card-user pb-2">
                  <div class="card-header">
                    <h4 class="card-title text-danger font-weight-bold text-center">Indonesia</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-4"></div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                          <i class="nc-icon nc-ambulance text-warning"></i>
                        </div>
                      </div>
                      <div class="col-7 col-md-8">
                        <div class="numbers">
                          <p class="card-category">Positif</p>
                          <p class="card-title"><?=$data_corona[0]['positif']?><p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <hr>
                    <div class="stats">
                      <a href="data-covid.php">
                        <i class="fa fa-refresh"></i>
                        Update now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                          <i class="nc-icon nc-satisfied text-success"></i>
                        </div>
                      </div>
                      <div class="col-7 col-md-8">
                        <div class="numbers">
                          <p class="card-category">Sembuh</p>
                          <p class="card-title"><?=$data_corona[0]['sembuh']?><p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <hr>
                    <div class="stats">
                      <a href="data-covid.php">
                        <i class="fa fa-refresh"></i>
                        Update now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                          <i class="nc-icon nc-favourite-28 text-danger"></i>
                        </div>
                      </div>
                      <div class="col-7 col-md-8">
                        <div class="numbers">
                          <p class="card-category">Meninggal</p>
                          <p class="card-title"><?=$data_corona[0]['meninggal']?><p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <hr>
                    <div class="stats">
                      <a href="data-covid.php">
                        <i class="fa fa-refresh"></i>
                        Update now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                          <i class="nc-icon nc-sound-wave text-warning"></i>
                        </div>
                      </div>
                      <div class="col-7 col-md-8">
                        <div class="numbers">
                          <p class="card-category">Dirawat</p>
                          <p class="card-title"><?=$data_corona[0]['dirawat']?><p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer ">
                    <hr>
                    <div class="stats">
                      <a href="data-covid.php">
                        <i class="fa fa-refresh"></i>
                        Update now
                      </a>
                    </div>
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
    </script>
    
  </body>
</html>


