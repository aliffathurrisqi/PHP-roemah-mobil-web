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
    <?php 
    include 'db_connect.php';
    $cek = mysqli_query($connect, "DELETE FROM booking_kendaraan WHERE batas_akhir = DATE_FORMAT(NOW(),'%Y-%m-%d') AND status = 'Belum Konfirmasi'");

    if(isset($_POST['btn_login'])) {
        include('db_connect.php');
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == "" && $password == ""){
          echo "Anda belum memasukkan data";
         }

         else if($username == "admin" && $password == "admin"){
              header("location:index_admin.php");
         }
         else{
            $sql = mysqli_query($connect, "SELECT * FROM akun WHERE username = '$username'");
            $login = $sql;
            while ($row = mysqli_fetch_row($login)){
                if($row[0] != $username || $row[1] != $password){
                  echo "Username dan password tidak cocok....";
                }
                else if($row[0] == $username && $row[1] == $password){
                    header("location:index.php?username=$username");
                }
            }
         }

      }

        

    ?>
            </div></li>
          <li class="list-group-item border-0 text-center" style="border: none">
          <button type="submit" class="btn btn-primary mt-2" name="btn_login"><i class="fa fa-user"> LOGIN</i></button><br>
          Belum memiliki akun ? <a href="signup.php">daftar disini</a>
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