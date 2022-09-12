<?php 
    include 'db_connect.php';
    $nopol = $_GET['nopol'];
    $cek = mysqli_query($connect, "DELETE FROM booking_kendaraan WHERE batas_akhir = DATE_FORMAT(NOW(),'%Y-%m-%d') AND status = 'Belum Konfirmasi'");
    $delete = mysqli_query($connect, "DELETE FROM kendaraan WHERE nopol = '$nopol'");
    header("location:index_admin.php");
?>