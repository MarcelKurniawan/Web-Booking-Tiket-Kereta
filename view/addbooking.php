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
            <a class="nav-link active" aria-current="page" href="#">Home</a>
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
    <br/><br/>
    <?php
    $con = mysqli_connect("localhost","root","","bookingkereta");
    $sql1 = "SELECT * FROM penumpang";
    $all_penumpang = mysqli_query($con,$sql1);
    $sql2 = "SELECT * FROM kereta";
    $all_kereta = mysqli_query($con,$sql2);
    ?>
 
    <form action="addbooking.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>ID Penumpang</td> 
                <td>
                <select name="daftarpenumpang" class="form-select" >
                <option selected>ID Penumpang</option>
                <?php
                    while ($penumpang = mysqli_fetch_array(
                            $all_penumpang,MYSQLI_ASSOC)):; ?>
                    <option value="<?php echo $penumpang["id_penumpang"]; ?>">
                        <?php echo $penumpang["id_penumpang"]; ?>
                    </option>
                <?php
                    endwhile;
                ?>
                </select>
                </td> 
            </tr>
            <tr> 
                <td>List Kereta</td> 
                <td>
                <select name="daftarkereta" class="form-select">
                <option selected>List Kereta</option>
                <?php
                    while ($kereta = mysqli_fetch_array(
                            $all_kereta,MYSQLI_ASSOC)):;
                ?>
                    <option value="<?php echo $kereta["id_kereta"];
                    ?>">
                        <?php echo $kereta["nama_kereta"];
                        ?>
                    </option>
                <?php
                    endwhile;
                ?>
                </select>
                </td>
            </tr>
            <tr> 
                <td>Tanggal Keberangkatan</td>
                <td><input type="date" min="2023-01-23" name="tgl_keberangkatan" class="form-control" id="validationCustom02" required></td>
            </tr>
            <tr> 
                <td>Jam Keberangkatan</td>
                <td><input type="time" name="jam" class="form-control" id="validationCustom02" required></td>
            </tr>
            <tr> 
                <td>No Kursi</td>
                <td><input type="text" name="kursi" class="form-control" id="validationCustom02" required></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add" class="form-control"></td>
            </tr>
        </table>
    </form>
    
    <style>
        table, button{
            margin-left: 15px;
        }
    </style>

    <?php
 
    if(isset($_POST['Submit'])) {
        $id_penumpang = $_POST['daftarpenumpang'];
        $id_kereta = $_POST['daftarkereta'];
        $tgl_keberangkatan = $_POST['tgl_keberangkatan'];
        $jam_keberangkatan = $_POST['jam'];
        $no_kursi = $_POST['kursi'];
        
        include_once("config.php");
                
        $result = mysqli_query($mysqli, "INSERT INTO booking(id_penumpang,id_kereta,tgl_keberangkatan,jam_keberangkatan,no_kursi) VALUES('$id_penumpang','$id_kereta','$tgl_keberangkatan','$jam_keberangkatan','$no_kursi')");
        
        echo "Booking added successfully. <a href='indexbooking.php'>View Booking</a>";
    }
    ?>
</body>
</html>