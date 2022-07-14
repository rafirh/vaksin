<?php 
    session_start();  
  
    if($_SESSION['status_admin']!=true){
      header('Location: ../index.php');
    }
    if($_GET['id_akun']){
        include "../conn.php";
        $qry_hapus=mysqli_query($conn,"delete from akun where id='".$_GET['id_akun']."'");
        $qry_hapus2=mysqli_query($conn,"delete from siswa where email='".$_GET['email']."'");
        if($qry_hapus){
            $set_ai = mysqli_query($conn,"ALTER TABLE akun DROP id");
            $set_ai2 = mysqli_query($conn,"ALTER TABLE akun ADD id INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
            $set_ai3 = mysqli_query($conn,"ALTER TABLE siswa DROP id_siswa");
            $set_ai4 = mysqli_query($conn,"ALTER TABLE siswa ADD id_siswa INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
            echo "<script>alert('Sukses hapus akun');location.href='tabel-akun.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus akun');location.href='tabel-akun.php';</script>";
        }
    }
?>