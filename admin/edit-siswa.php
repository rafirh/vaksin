<?php
    session_start();  
  
    if($_SESSION['status_admin']!=true){
      header('Location: ../index.php');
    }
    include "../conn.php";
    $id_siswa=$_GET['id_siswa'];
    $qry = mysqli_query($conn, "select * from siswa inner join sekolah on siswa.id_sekolah = sekolah.id_sekolah where id_siswa = '".$id_siswa."'");
    $data_siswa=mysqli_fetch_array($qry);
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

<body class="" style="background-color: rgb(194, 194, 194);">
  <div class="content">
    <div class="row mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">
                        Edit Siswa
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>NIS</label>
                                    <input
                                    type="number"
                                    class="form-control"
                                    name="nis"
                                    placeholder="NIS"
                                    value="<?=$data_siswa['nis']?>"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" placeholder="Name" value="<?=$data_siswa['nama']?>" name="nama" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    value="<?=$data_siswa['email']?>"
                                    required
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" value="<?=$data_siswa['tgl_lahir']?>" name="tgl_lahir" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kelamin</label>
                                    <select class="form-control" name="kelamin" required/>
                                        <option value="<?=$data_siswa['kelamin']?>"><?=$data_siswa['kelamin']?></option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sekolah</label>
                                    <select class="form-control" name="sekolah" required/>
                                        <option value="<?=$data_siswa['id_sekolah']?>"><?=$data_siswa['nama_sekolah']?></option>
                                        <?php
                                            $qry5=mysqli_query($conn, "select * from sekolah");
                                            while($data_sekolah=mysqli_fetch_array($qry5)){
                                                echo '<option value="'.$data_sekolah['id_sekolah'].'">'.$data_sekolah['nama_sekolah'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary btn-round" name="submit">Perbarui Siswa</button>
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
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $kelamin = $_POST['kelamin'];
        $sekolah = $_POST['sekolah'];
        
        
        $query = mysqli_query($conn, "update siswa set 
        nis = '".$nis."',
        nama = '".$nama."',
        email = '".$email."',
        kelamin = '".$kelamin."',
        tgl_lahir = '".$tgl_lahir."',
        id_sekolah = '".$sekolah."'
        where id_siswa= '".$id_siswa."'");
        if($query){
          echo "<script>Swal.fire({
            icon: 'success',
            title: 'Update Berhasil',
            text: 'Mantap !'})
            setTimeout(function(){ 
              window.location.href = 'tabel-siswa.php';
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


