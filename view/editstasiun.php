<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id_stasiun = $_POST['id'];
    $nama_stasiun = $_POST['nama'];
    $kota_stasiun = $_POST['kota'];
    // update user data
    $result = mysqli_query($mysqli, "UPDATE stasiun SET nama_stasiun='$nama_stasiun',kota_stasiun='$kota_stasiun' WHERE id_stasiun='$id_stasiun'");
    // Redirect to homepage to display updated user in list
    header("Location: indexstasiun.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id_stasiun = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM stasiun WHERE id_stasiun='$id_stasiun'");
 
while($stasiun_data = mysqli_fetch_array($result))
{
    $nama_stasiun = $stasiun_data['nama_stasiun'];
    $kota_stasiun = $stasiun_data['kota_stasiun'];
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
    <a href="indexstasiun.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="editstasiun.php">
        <table width="25%" border="0">
            <tr> 
                <td>Nama Stasiun</td>
                <td><input type="text" name="nama" class="form-control" id="validationCustom02" required></td>
            </tr>
            <tr> 
                <td>Kota Stasiun</td>
                <td><input type="text" name="kota" class="form-control" id="validationCustom02" required></td>
            </tr>
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