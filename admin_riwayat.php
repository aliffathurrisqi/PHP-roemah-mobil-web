<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/roemah_mobil_icon.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>Roemah Mobil</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="css/roemah_mobil.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container-fluid">
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index_admin.php"><img src="img/roemah_mobil_logo_white.png" height="50px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
<!--        <li class="nav-item">

        </li> -->
<!--        <li class="nav-item">
          <a class="nav-link" href="#">Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://wa.me/6287839922299">Hubungi Kami</a>
        </li> -->
      </ul>
<!--       <button class="btn btn-danger ms-2"><i class="fa fa-shopping-cart"></i></button> -->
  <a href="admin_riwayat.php"><button class="btn btn-danger ms-2" name="btn_riwayat"><i class="fa fa-shopping-cart"></i></button></a>
      <a href="index.php"><button class="btn btn-danger ms-2"><i class="fa fa-user"></i> ADMIN MODE</button></a>
    </div>
  </div>
</nav>
<!--  navbar end -->
  <div class="col-md-12 bg-light pt-4 pb-4">
    <form method="POST">
    <div class="row">
<!--       <div class="col-sm-1"></div> -->

    <div class="col-sm-12">  
    <div class="card h-100"> 
          <div class="card-body">   
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Username</th>
      <th scope="col">Nama Kendaraan</th>
      <th scope="col">Tahun</th>
      <th scope="col">Warna</th>
      <th scope="col">Status</th>
      <th scope="col">Waktu Booking</th>
      <th scope="col">Tenggat</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>



<?php 
    include 'db_connect.php';
    $index = 0;
    $cek = mysqli_query($connect, "DELETE FROM booking_kendaraan WHERE batas_akhir = DATE_FORMAT(NOW(),'%Y-%m-%d') AND status = 'Belum Konfirmasi'");
    $sql = mysqli_query($connect, "SELECT username,merek,tipe,tahun_pembuatan,warna,riwayat_kendaraan.status,
      DATE_FORMAT(booking_kendaraan.waktu,'%d %M %Y'),DATE_FORMAT(batas_akhir,'%d %M %Y'),booking_kendaraan.status,booking_kendaraan.id_booking FROM booking_kendaraan
      INNER JOIN riwayat_kendaraan ON riwayat_kendaraan.nopol = booking_kendaraan.nopol AND booking_kendaraan.id_booking = riwayat_kendaraan.id_booking");
    $dataBooking = $sql;
    while ($row = mysqli_fetch_row($dataBooking)){
      $index++;
    ?>
   

  <?php
?>

          <tbody>
      <tr>
      <th scope="row"><?php echo"$index";?></th>
      <td><?php echo"$row[0]";?></td>
      <td><?php echo"$row[1] $row[2]";?></td>
      <td><?php echo"$row[3]";?></td>
      <td><?php echo"$row[4]";?></td>
      <td><?php echo"$row[5]";?></td>
      <td><?php echo"$row[6]";?></td>
      <td><?php echo"$row[7]";?></td>
      <td><?php echo"$row[8]";?></td>
      <td>
        <?php

        if($row[8] == "Belum Konfirmasi"){
        ?>
        <a href="konfirmasi_booking.php?id=<?php echo $row[9];?>"><button type="button" class="btn btn-success mt-2"><i class="fa fa-check"> KONFIRMASI</i></button></a>
        <?php
          }
        ?>
        <a href="delete_booking.php?id=<?php echo $row[9];?>"><button type="button" class="btn btn-danger mt-2"><i class="fa fa-trash"> HAPUS</i></button></a>
      </td>
    </tr>
  </tbody>

  <?php
      if(isset($_POST['btn_booking'])) {

        $nopol = $row[0];
        $tenggat = "DATE_ADD(NOW(), INTERVAL 7 DAY)";

        include('db_connect.php');
         $query = "INSERT INTO booking_kendaraan VALUES
         ('','$nopol','$username',NOW(),$tenggat,'Belum Konfirmasi')";
         $edit = mysqli_query($connect,$query);

      }

}
  ?>
          </table>
        <ul class="list-group">
          <li class="list-group-item border-0 text-center" style="border: none">
            <a href="index_admin.php"><button type="button" class="btn btn-danger mt-2"><i class="fa fa-arrow-circle-left"> KEMBALI</i></button></a>
          </li>
      </ul>

        </div>
  </div>
  </div>
<!-- <div class="col-sm-1"></div>
</div> -->

</form>
</div>
</div>
</body>
</html>