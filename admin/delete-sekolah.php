<?php 
    session_start();  
  
    if($_SESSION['status_admin']!=true){
      header('Location: ../index.php');
    }
    if($_GET['id_sekolah']){
        include "../conn.php";
        $qry_hapus=mysqli_query($conn,"delete from sekolah where id_sekolah='".$_GET['id_sekolah']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus sekolah');location.href='tabel-sekolah.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus sekolah');location.href='tabel-sekolah.php';</script>";
        }
    }
?>