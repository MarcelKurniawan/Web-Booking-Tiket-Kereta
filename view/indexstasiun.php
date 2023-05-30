<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM stasiun ORDER BY id_stasiun DESC");
?>
 
<html>
<head>
  <title>Pemesanan Tiket Kereta</title>
<link rel="stylesheet" type="text/css" href="./style/AOL.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Booking Aja</a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./indexbooking.php">Booking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./indexkereta.php">Kereta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./indexpenumpang.php">Penumpang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./indexstasiun.php">Stasiun</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
 
  <div class="container">
    <br>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <div class="form-group">
        <label for="sel1">Kata Kunci:</label>
        <?php
        $kata_kunci="";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=$_POST['kata_kunci'];
        }
        ?>
        <input type="text" name="kata_kunci" value="<?php echo $kata_kunci;?>" class="form-control"  required/>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-info" value="Pilih">
    </div>
    </form>

    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Kota</th>

        </tr>
        </thead>
        <?php

        include "config.php";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=trim($_POST['kata_kunci']);
            $sqlt="select * from stasiun where nama_stasiun like '%".$kata_kunci."%' or kota_stasiun like '%".$kata_kunci."%' or id_stasiun like '%".$kata_kunci."%' order by id_stasiun asc";

        }else {
            $sqlt="select * from stasiun order by id_stasiun asc";
        }

        $mysqli = mysqli_connect("localhost","root","","bookingkereta");
        $hasil=mysqli_query($mysqli,$sqlt);
        while ($stasiun_data = mysqli_fetch_array($hasil)) {
            ?>
            <tbody>
            <tr>
                <td><?php echo $stasiun_data['id_stasiun']; ?></td>
                <td><?php echo $stasiun_data['nama_stasiun']; ?></td>
                <td><?php echo $stasiun_data['kota_stasiun']; ?></td>
                <td><?php echo "<td><a href='editstasiun.php?id=$stasiun_data[id_stasiun]'>Edit</a> | <a href='deletestasiun.php?id=$stasiun_data[id_stasiun]'>Delete</a>"; ?></td>

            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <button type="button" class="btn btn-outline-dark"><a href="addstasiun.php">Add Station</a></button>
</div>
    
</body>
</html>