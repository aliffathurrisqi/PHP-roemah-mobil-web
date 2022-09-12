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

<!-- body -->
<div class="row">
<!-- menubar -->
	<div class="col-md-2 bg-light">
		<ul class="list-group list-group-flush p-2 pt-4">
		  <li class="list-group-item bg-danger text-white"><i class="fa fa-bars"></i> Kategori</li>
		  <form method="POST">
		  <li class="list-group-item"><button class="btn btn-outline-danger w-100" name="search-baru"><i class="fa fa-car"></i> Baru</button></li>
		  <li class="list-group-item"><button class="btn btn-outline-danger w-100" name="search-bekas"><i class="fa fa-car"></i> Bekas</button></li>
		  <li class="list-group-item bg-danger text-white"><i class="fa fa-calendar"></i> Tahun Pembuatan</li>
		  <form method="POST">
		  <li class="list-group-item">
        		<input class="form-control me-2"  name="search-year" type="text" placeholder="Ex : 2021">
          </li>
          <li class="list-group-item d-flex justify-content-center">
          	<button class="btn btn-outline-danger" name="search-before-year" type="submit"><i class="fa fa-angle-left"></i></button>
          		<button class="btn btn-outline-danger ms-2" name="search-this-year" type="submit">
          		<i class="fa fa-search"></i></button>
          	<button class="btn btn-outline-danger ms-2" name="search-after-year" type="submit"><i class="fa fa-angle-right"></i></button>
          </li>
      	  </form>
		</ul>
	</div>

<!-- menubar end -->

<!-- produk -->

<div class="col-md-10 bg-light pt-4 pb-4">
	<div class="card-group">

	<!-- start -->
	<?php
	include 'db_connect.php';


	$querry = "";	
	$cek = mysqli_query($connect, "DELETE FROM booking_kendaraan WHERE batas_akhir = DATE_FORMAT(NOW(),'%Y-%m-%d') AND status = 'Belum Konfirmasi'");


	//login
	if(isset($_POST['login_user'])){
		$user_log = $_POST['user_log'];
		$user_pass = $_POST['user_pass'];
		$login = mysqli_query($connect, "SELECT * FROM akun WHERE username = 'user_log'");

		while ($user_login = mysqli_fetch_row($login)){
		$username = row[0];
			}
	}

			if(isset($_POST['search-baru'])){
				$querry = "SELECT * FROM kendaraan WHERE status = 'Baru'";
			}

			if(isset($_POST['search-bekas'])){
				$querry = "SELECT * FROM kendaraan WHERE status = 'Bekas'";
			}
				

			if(isset($_POST['search-before-year'])){
				$cari = (int)$_POST['search-year'];
				$querry = "SELECT * FROM kendaraan WHERE tahun_pembuatan <= $cari";
				
			}
          	if(isset($_POST['search-this-year'])){
				$cari = (int)$_POST['search-year'];
				$querry = "SELECT * FROM kendaraan WHERE tahun_pembuatan = $cari";
				
			}
			if(isset($_POST['search-after-year'])){
				$cari = (int)$_POST['search-year'];
				$querry = "SELECT * FROM kendaraan WHERE tahun_pembuatan >= $cari";
			}
	
		if($querry == null){
			$sql = mysqli_query($connect, "SELECT * FROM kendaraan ORDER BY tahun_pembuatan DESC");
		}
		else{
			$sql = mysqli_query($connect, $querry);
		}

		
		$dataKendaraan = $sql;
		$i = 0;
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

		
			if($i>3){
			?>
		</div>

		<div class="card-group">
			<?php
			$i = 0;
		}
		$i++;
	?>
    <div class="card">
  		<img src="<?php echo"$img";?>" class="card-img-top" alt="<?php echo"$row[1] $row[2]";?>">
  		<div class="card-body">
  			<ul class="list-group">
			    <li class="list-group-item border-0"><h4 class="card-title text-center">Rp <?php echo"$row[6]";?></h4></li>
			    <li class="list-group-item border-0"><h5 class="card-title text-center"><?php echo"$row[1] $row[2]";?></h5></li>
			    <li class="list-group-item border-0">
			    	<span class="<?php echo"$tanda";?>"><?php echo"$row[5]";?></span>
			    	<span class="badge bg-warning"><?php echo"$row[3]";?></span>
			    </li>
			    <li class="list-group-item border-0 text-center" style="border: none">
			    	<?php
			    		if($username != null){
			    			$link = "booking.php?nopol=$row[0]&&username=$username";
			    		}
			    		else{
			    			$link = "login.php";
			    		}
			    	?>
			    	<a href="<?php echo $link; ?>" 
			    	class="btn btn-outline-primary mt-2">BOOKING</a></li>
			</ul>
  		</div>
	</div>
	<?php

	}
	?>
	<!-- end -->
	<?php
	$index = $i;
	if($index >0){
		if($index <4){ ?>
			 <div class="card"><div class="card-body"></div></div>
		<?php
		}
		if($index <3){ ?>
			 <div class="card"><div class="card-body"></div></div>

		<?php
		}
		if($index <2){ ?>
			 <div class="card"><div class="card-body"></div></div>
		<?php
		}
	}
	else{ ?>
		</div>
		<div class="card">
		<div class="card-body text-center">
			<img src="img/product/no_display.png" height="375px">
			<h4 class="card-title text-center">Data Tidak Ditemukan</h4>
		</div>
		</div>
		<?php
	} 
		?>


</div>
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

