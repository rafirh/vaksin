<?php
    session_start();  
    if($_SESSION['login']!=true){
      header('Location: ../index.php');
    }
    include '../conn.php';
    $email = $_POST['email_siswa'];
    $validasi = $_POST['valid'];
    $validasi2 = "saya yakin untuk batal ikut vaksinasi";

    if($validasi == $validasi2){
        $query = mysqli_query($conn,"delete from siswa where email='".$email."'");
        $set_ai = mysqli_query($conn, "ALTER TABLE siswa DROP id_siswa");
        $set_ai2 = mysqli_query($conn, "ALTER TABLE siswa ADD id_siswa INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");

        echo "<script>alert('Sukses membatalkan vaksinasi');location.href='index.php';</script>";
    }else{
        echo "<script>alert('Pernyataan tidak cocok, silahkan coba lagi !');location.href='index.php';</script>";
    }


?>