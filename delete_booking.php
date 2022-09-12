<?php 
    include 'db_connect.php';
    $id = $_GET['id'];
    $cek = mysqli_query($connect, "DELETE FROM booking_kendaraan WHERE batas_akhir = DATE_FORMAT(NOW(),'%Y-%m-%d') AND status = 'Belum Konfirmasi'");
    $delete = mysqli_query($connect, "DELETE FROM booking_kendaraan WHERE id_booking = $id");
    header("location:admin_riwayat.php");
?>