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
  <div class="col-md-12 bg-light pt-4 pb-4">
<?php 
    include 'db_connect.php';
    $cek = mysqli_query($connect, "DELETE FROM booking_kendaraan WHERE batas_akhir = DATE_FORMAT(NOW(),'%Y-%m-%d') AND status = 'Belum Konfirmasi'");
    ?>
    <form method="POST">
    <div class="row">
    <div class="col-sm-4 text-center">
    <div class="card h-100">
      <img src="img/product/no_display.png" class="card-img-top">
      <div class="card-body">
        <input type="file" name="img_kendaraan"><br><br>
        <button type="button" class="btn btn-primary mt-2" name="btn_foto"><i class="fa fa-photo"> PILIH FOTO</i></button>
      </div>
  </div>
    </div>
    <div class="col-sm-8">  
    <div class="card h-100">
      <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-car"> Nomor Polisi :</i></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nopol" placeholder="Masukkan Nomor Polisi">
            </div></li>
          <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-car"> Merek Kendaraan :</i></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="merek" placeholder="Masukkan Merek Kendaraan">
            </div></li>
           <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-car"> Tipe Kendaraan :</i></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="tipe" placeholder="Masukkan Tipe Kendaraan">
            </div></li>
          <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-calendar"> Tahun Pembuatan :</i></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="tahun" placeholder="Masukkan Tahun Pembuatan">
            </div></li>
          <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-paint-brush"> Warna :</i></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="warna" placeholder="Masukkan Warna Kendaraan">
            </div></li>
            <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-plus"> Status : </i></label>
                  <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="status">
                    <option value="Baru">Baru</option>
                    <option value="Bekas">Bekas</option>
                  </select>
            </div></li>
          <li class="list-group-item border-0">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><i class="fa fa-money"> Harga (Rp) :</i></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="harga" placeholder="Masukkan Harga Kendaraan">
            </div></li>
          <li class="list-group-item border-0 text-center" style="border: none">
          <button type="submit" class="btn btn-primary mt-2" name="btn_simpan"><i class="fa fa-save"> SIMPAN</i></button>
            <a href="index_admin.php"><button type="button" class="btn btn-danger mt-2"><i class="fa fa-arrow-circle-left"> KEMBALI</i></button></a>
          </li>
      </ul>
      </div>
  </div>
  </div>
</div>
</form>
 <?php

      if(isset($_POST['btn_simpan'])) {

        $nopol = $_POST['nopol'];
        $merek = $_POST['merek'];
        $tipe = $_POST['tipe'];
        $tahun = $_POST['tahun'];
        $warna = $_POST['warna'];
        $status = $_POST['status'];
        $harga = $_POST['harga'];

        include('db_connect.php');
         $query = "INSERT INTO kendaraan VALUES('$nopol','$merek','$tipe','$tahun','$warna','$status','$harga',NULL)";
         $insert = mysqli_query($connect,$query);

         header("location: index_admin.php");

      }

  ?>
</div>
</body>
</html>