<!doctype html>
<html lang="en">
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
      <button class="btn btn-danger ms-2"><i class="fa fa-shopping-cart"></i></button>
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
	<button type ="submit"class="btn btn-danger ms-2" name="btn_logout"><i class="fa fa-exit"></i> Log Out</button>
	</form>
<?php
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

<!-- body -->
<div class="row">
	<!-- start -->
	<?php
	include 'db_connect.php';
	$username = $_GET['username'];
    $cek = mysqli_query($connect, "DELETE FROM booking_kendaraan WHERE batas_akhir = DATE_FORMAT(NOW(),'%Y-%m-%d') AND status = 'Belum Konfirmasi'");
    $sql = mysqli_query($connect, "SELECT * FROM akun WHERE username = '$username'");
    $dataUser = $sql;
    while ($row = mysqli_fetch_row($dataUser)){

	?>
	<!-- end -->

<form method="POST">
    <div class="row">
    <div class="col-sm-4 text-center">
    <div class="card h-100">
      <img src="img/product/no_display.png" class="card-img-top"">
      <div class="card-body">
      </div>
  </div>
    </div>
    <div class="col-sm-8">  
    <div class="card h-100">
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-user"> Username : </i></label>
                <label for="exampleFormControlInput1" class="form-label"><?php echo"$row[0]";?></label>	
            </div></li>
           <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-user"></i> Nama Lengkap : </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" value="<?php echo"$row[2]";?>">
            </div></li>
          <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-phone"> Nomor Telepon :</i></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="no_hp" value="<?php echo"$row[3]";?>">
            </div></li>
          <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-home"> Alamat :</i></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="alamat" value="<?php echo"$row[4]";?>">
            </div></li>
          <li class="list-group-item border-0 text-center" style="border: none">
          <button type="submit" class="btn btn-primary mt-2" name="btn_ubah"><i class="fa fa-save"> EDIT PROFILE</i></button>
            <?php
}

      if(isset($_POST['btn_ubah'])) {
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];

         $edit = mysqli_query($connect, 
         "UPDATE akun SET nama_lengkap = '$nama', no_hp = '$no_hp', alamat = '$alamat' WHERE username = '$username'");
         // header('Location: user_profile.php?username=$username' );
      }

  ?>
            <a href="index.php?username=<?php echo $username; ?>"><button type="button" class="btn btn-danger mt-2"><i class="fa fa-arrow-circle-left"> KEMBALI</i></button></a>
          </li>
      </ul>
      </div>
  </div>
  </div>
</div>
</form>

</div>


<!-- produk end -->

<!-- footer -->
<!-- <div class="col-md-12 bg-light">
		<nav class="navbar navbar-expand-lg navbar-danger bg-danger">
  	<div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Navbar</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

</div> -->

<!-- footer end -->

</div>

<!-- body end -->

</div>
</body>
</html>

