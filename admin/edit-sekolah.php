<?php
    session_start();  
  
    if($_SESSION['status_admin']!=true){
      header('Location: ../index.php');
    }
    include "../conn.php";
    $id_sch=$_GET['id_sekolah'];
    $qry = mysqli_query($conn, "select * from sekolah where id_sekolah = '".$id_sch."'");
    $data_sch=mysqli_fetch_array($qry);
?>
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

<body class="" style="background-color: rgb(194, 194, 194);">
  <div class="content">
    <div class="row mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">
                        Edit Sekolah
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Id Sekolah</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    disabled=""
                                    placeholder="Id"
                                    value="<?=$data_sch['id_sekolah']?>"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Sekolah</label>
                                    <input type="text" class="form-control" placeholder="Name" value="<?=$data_sch['nama_sekolah']?>" name="nama_sch" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>No. Telepon</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    placeholder="telepon"
                                    name="telepon_sch"
                                    value="<?=$data_sch['telepon']?>"
                                    required
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" placeholder="Alamat" value="<?=$data_sch['alamat']?>" name="alamat_sch" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Jumlah Siswa</label>
                                    <input type="number" class="form-control" placeholder="Jumlah Siswa" value="<?=$data_sch['jml_siswa']?>" name="jml_siswa_sch" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary btn-round" name="submit">Perbarui Sekolah</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <a href="tabel-sekolah.php" class="btn btn-danger btn-round">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
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
        $nama = $_POST['nama_sch'];
        $telepon = $_POST['telepon_sch'];
        $alamat = $_POST['alamat_sch'];
        $jml_siswa = $_POST['jml_siswa_sch'];
        
        $query = mysqli_query($conn, "update sekolah set 
        nama_sekolah = '".$nama."',
        telepon = '".$telepon."',
        alamat = '".$alamat."',
        jml_siswa = '".$jml_siswa."'
        where id_sekolah = '".$id_sch."'");
        if($query){
          echo "<script>Swal.fire({
            icon: 'success',
            title: 'Update Berhasil',
            text: 'Mantap !'})
            setTimeout(function(){ 
              window.location.href = 'tabel-sekolah.php';
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
?>


