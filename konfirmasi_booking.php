<?php 
    include 'db_connect.php';
    $id = $_GET['id'];
    $cek = mysqli_query($connect, "DELETE FROM booking_kendaraan WHERE batas_akhir = DATE_FORMAT(NOW(),'%Y-%m-%d') AND status = 'Belum Konfirmasi'");
    $update = mysqli_query($connect, "UPDATE booking_kendaraan SET status = 'Sudah Konfirmasi' WHERE id_booking = $id");
    header("location:admin_riwayat.php");
?>