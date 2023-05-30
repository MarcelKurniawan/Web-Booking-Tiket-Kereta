<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id_kereta = $_POST['id'];
    $id_stasiun = $_POST['daftarstasiun'];
    $nama_kereta = $_POST['namakereta'];
    $asal = $_POST['kotaasal'];
    $tujuan = $_POST['kotatujuan'];
    $kelas = $_POST['tipekelas'];
    $harga = $_POST['hargatiket'];
    // update user data
    $result = mysqli_query($mysqli, "UPDATE kereta SET id_stasiun='$id_stasiun',nama_kereta='$nama_kereta',asal='$asal',tujuan='$tujuan',kelas='$kelas',harga='$harga' WHERE id_kereta='$id_kereta'");
    // Redirect to homepage to display updated user in list
    header("Location: indexkereta.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id_kereta = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM kereta WHERE id_kereta='$id_kereta'");
 
while($kereta_data = mysqli_fetch_array($result))
{   
    $id_stasiun = $kereta_data['id_stasiun'];
    $nama_kereta = $kereta_data['nama_kereta'];
    $asal = $kereta_data['asal'];
    $tujuan = $kereta_data['tujuan'];
    $kelas = $kereta_data['kelas'];
    $harga = $kereta_data['harga'];
}
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
    $sql = "SELECT * FROM stasiun";
    $all_categories = mysqli_query($con,$sql);
    ?>
    
    <form name="update_user" method="post" action="editkereta.php">
        <table width="25%" border="0">
            <tr> 
                <td>Id Stasiun</td>
                <td>
                <select name="daftarstasiun" class="form-select">
                <?php

                    while ($stasiun = mysqli_fetch_array(
                            $all_categories,MYSQLI_ASSOC)):;
                ?>
                    <option value="<?php echo $stasiun["id_stasiun"];
                    ?>">
                        <?php echo $stasiun["nama_stasiun"];
                        ?>
                    </option>
                <?php
                    endwhile;
                ?>
                </select>
                </td>
            </tr>

            <tr> 
                <td>Nama Kereta</td>
                <td><input type="text" name="namakereta" class="form-control" id="validationCustom02" required></td>
            </tr>
            <tr> 
                <td>Kota Asal</td>
                <td><input type="text" name="kotaasal" class="form-control" id="validationCustom02" required></td>
            </tr>
            <tr> 
                <td>Kota Tujuan</td>
                <td><input type="text" name="kotatujuan" class="form-control" id="validationCustom02" required></td>
            </tr>
            <tr> 
                <td>Kelas</td>

                <td>
                
                <select class="form-select" name="tipekelas">
                <option selected>Pilih Kelas</option>
                <option value="Bisnis">Bisnis</option>
                <option value="Ekonomi">Ekonomi</option>
                <option value="Eksekutif">Eksekutif</option>
                </select>
                </td>
            </tr>
            <tr> 
                <td>Harga Tiket</td>
                <td><input type="text" name="hargatiket" class="form-control" id="validationCustom02" required></td>
            </tr>

            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update" class="form-control"></td>
            </tr>
            
        </table>
    </form>    
    <style>
        *{
            margin-left: 15px;
        }
    </style>

</body>
</html>