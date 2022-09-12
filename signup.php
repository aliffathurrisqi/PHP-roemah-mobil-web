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
<form method="POST">
<div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
          <div class="card h-100">
      <div class="card-body">
        <div class="text-center">
        <img src="img/product/no_display.png" class="card-img-top w-75"></div>
        <ul class="list-group">
          <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-user"> Username :</i></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="username" placeholder="Masukkan Username">
            </div></li>
           <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-lock"> Password :</i></label>
                <input type="password" class="form-control" id="exampleFormControlInput1" name="password" placeholder="Masukkan Password">
            </div></li>
            <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-lock"> Konfirmasi Password :</i></label>
                <input type="password" class="form-control" id="exampleFormControlInput1" name="konfirmasi" placeholder="Masukkan Password">
                    <?php 
        include 'db_connect.php';
        $cek = mysqli_query($connect, "DELETE FROM booking_kendaraan WHERE batas_akhir = DATE_FORMAT(NOW(),'%Y-%m-%d') AND status = 'Belum Konfirmasi'");

        if(isset($_POST['btn_daftar'])) {
            include('db_connect.php');
            $username = $_POST['username'];
            $password = $_POST['password'];
            $konfirmasi = $_POST['konfirmasi'];

            if($username == "" || $password == ""){
              echo "Anda belum memasukkan data";
             }

             else if($password != $konfirmasi){
              echo "Konfirmasi password salah";
             }
             else{
                $sql = mysqli_query($connect, "INSERT INTO akun VALUES('$username','$password','-','-','-')");
                header("location:index.php?username=$username");
             }
          }

        ?>
              </div></li>
          <li class="list-group-item border-0 text-center" style="border: none">
          <button type="submit" class="btn btn-primary mt-2" name="btn_daftar"><i class="fa fa-user"> DAFTAR</i></button>
          </li>
          <li class="list-group-item border-0 text-center" style="border: none">
              <a href="login.php"><button type="button" class="btn btn-danger mt-2"><i class="fa fa-arrow-circle-left"> KEMBALI</i></button>
              </a>
          </li>
      </ul>
      </div>
  </div>
  </div>
    <div class="col-sm-4">
    </div>
</div>
</form>

</body>
</html>