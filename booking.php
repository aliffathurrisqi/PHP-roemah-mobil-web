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
  <?php
$login_text = "Login";
if(!isset($_GET['username'])){
  $username = null;
}
else if($_GET['username']) {
  $username = $_GET['username'];
  $login_text = $username;
}
?>
<div class="container-fluid">
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?username=<?php echo $username; ?>"><img src="img/roemah_mobil_logo_white.png" height="50px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link" href="#">Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://wa.me/6287839922299">Hubungi Kami</a>
        </li>
      </ul>
      <form method="POST">
      <button type="submit" class="btn btn-danger ms-2" name="btn_user"><i class="fa fa-user"></i> <?php echo $login_text;?></button>
<?php
if($username == null){
  if(isset($_POST['btn_user'])) {;
  header("location:login.php");
  }
}

if($username != null){
  ?>
  <form method="POST">
      <button class="btn btn-danger ms-2" name="btn_riwayat"><i class="fa fa-shopping-cart"></i></button>
  <button type ="submit"class="btn btn-danger ms-2" name="btn_logout"><i class="fa fa-exit"></i> Log Out</button>
  </form>
<?php
if(isset($_POST['btn_riwayat'])) {;
  header("location:user_riwayat.php?username=$username");
  }
if(isset($_POST['btn_user'])) {;
  header("location:user_profile.php?username=$username");
  }
if(isset($_POST['btn_logout'])) {
  $username = null;
  header("location:index.php");
  }
}
?>
</form>
    </div>
  </div>
</nav>
<!--  navbar end -->
  <div class="col-md-12 bg-light pt-4 pb-4">
<?php 
    include 'db_connect.php';
    $nopol = $_GET['nopol'];
    $username = $_GET['username'];
    $cek = mysqli_query($connect, "DELETE FROM booking_kendaraan WHERE batas_akhir = DATE_FORMAT(NOW(),'%Y-%m-%d') AND status = 'Belum Konfirmasi'");
    $sql = mysqli_query($connect, "SELECT * FROM kendaraan WHERE nopol = '$nopol'");
    $dataKendaraan = $sql;
    while ($row = mysqli_fetch_row($dataKendaraan)){

        if($row[7] != null){
        $img = "img/product/$row[7]";
      }
      else{
        $img = "img/product/no_display.png";
      }

      
      if($row[5]=="Bekas"){
        $tanda = "badge bg-danger";
      }
      else{
        $tanda = "badge bg-success";
      }


    ?>
    <form method="POST">
    <div class="row">
      <div class="col-sm-2"></div>
    <div class="col-sm-4">
    <div class="card h-100">
      <div class="text-center">
      <img src="<?php echo"$img";?>" class="card-img-top w-50" alt="<?php echo"$row[1] $row[2]";?>">
      </div>
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-car"> Nama Kendaraan :  <?php echo"$row[1] $row[2]";?>
                </i></label>
            </div></li>
          <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-calendar"> Tahun Pembuatan : <?php echo"$row[3]";?></i></label>
          <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-paint-brush"> Warna : <?php echo"$row[4]";?></i></label>
            </div></li>
          <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-money"> Harga : Rp <?php echo"$row[6]";?></i></label>
            </div></li>
        </ul>
      </div>
  </div>
    </div>
  <?php
  $username = $_GET['username'];
    $user_login = mysqli_query($connect, "SELECT * FROM akun WHERE username = '$username'");
    $userdata = $user_login;
    while ($row2 = mysqli_fetch_row($userdata)){
?>
    <div class="col-sm-4">  
    <div class="card h-100">
      <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item border-0 text-center">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><h4>DATA CUSTOMER</h4></label>
            </div></li>
            <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-user"> Nama Lengkap : <?php echo"$row2[2]";?></i></label>
            </div></li>
            <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-phone"> Nomor Telepon : <?php echo"$row2[3]";?></i></label>
            </div></li>
            <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-home"> Alamat :</i></label><br>
                <label for="exampleFormControlInput1" class="form-label"><?php echo"$row2[4]";?></label>
            </div></li>
          <li class="list-group-item border-0 text-center" style="border: none">
          <button type="submit" class="btn btn-primary mt-2" name="btn_booking"><i class="fa fa-save"> BOOKING</i></button>
          <a href="user_profile.php?username=<?php echo $username;?>"><button type="button" class="btn btn-success mt-2"><i class="fa fa-file"> LENGKAPI DATA</i></button>
            <a href="index.php?username=<?php echo $username;?>"><button type="button" class="btn btn-danger mt-2"><i class="fa fa-arrow-circle-left"> KEMBALI</i></button></a>
          </li>
      </ul>
      </div>
  </div>
  </div>
<div class="col-sm-2"></div>
</div>
  <?php

}

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
</form>
</div>
</div>
</body>
</html>