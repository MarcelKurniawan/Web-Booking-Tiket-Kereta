<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM booking ORDER BY id_booking DESC");
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
        <th>Id Booking</th> <th>Id Penumpang</th> <th>Id Kereta</th> <th>Tgl Keberangkatan</th> <th>Jam Keberangkatan</th> <th>No kursi</th>
        </tr>
        </thead>
        <?php

        include "config.php";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=trim($_POST['kata_kunci']);
            $sqlt="select * from booking where id_kereta like '%".$kata_kunci."%' or id_penumpang like '%".$kata_kunci."%' or id_booking like '%".$kata_kunci."%' order by id_booking asc";

        }else {
            $sqlt="select * from booking order by id_booking desc";
        }

        $mysqli = mysqli_connect("localhost","root","","bookingkereta");
        $hasil=mysqli_query($mysqli,$sqlt);
        while ($booking_data = mysqli_fetch_array($hasil)) {
            ?>
            <tbody>
            <tr>
                <td><?php echo $booking_data['id_booking']; ?></td>
                <td><?php echo $booking_data['id_penumpang']; ?></td>
                <td><?php echo $booking_data['id_kereta']; ?></td>
                <td><?php echo $booking_data['tgl_keberangkatan']; ?></td>
                <td><?php echo $booking_data['jam_keberangkatan']; ?></td>
                <td><?php echo $booking_data['no_kursi']; ?></td>
                <td><?php echo "<td><a href='editbooking.php?id=$booking_data[id_booking]'>Edit</a> | <a href='deletebooking.php?id=$booking_data[id_booking]'>Delete</a>"; ?></td>

            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <button type="button" class="btn btn-outline-dark"><a href="addbooking.php">Add Booking</a></button>
</div>

</body>
</html>