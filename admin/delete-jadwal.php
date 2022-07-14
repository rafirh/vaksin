<?php 
    session_start();  
  
    if($_SESSION['status_admin']!=true){
      header('Location: ../index.php');
    }
    if($_GET['id_jadwal']){
        include "../conn.php";
        $qry_hapus=mysqli_query($conn,"delete from jadwal where id_jadwal='".$_GET['id_jadwal']."'");
        if($qry_hapus){
            $set_ai = mysqli_query($conn, "ALTER TABLE jadwal DROP id_jadwal");
            $set_ai2 = mysqli_query($conn, "ALTER TABLE jadwal ADD id_jadwal INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
            echo "<script>alert('Sukses hapus jadwal');location.href='tabel-jadwal.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus jadwal');location.href='tabel-jadwal.php';</script>";
        }
    }
?>