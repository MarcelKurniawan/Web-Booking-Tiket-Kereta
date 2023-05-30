<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id_penumpang = $_POST['id'];

    $nama_penumpang = $_POST['name'];
    $jenis_kelamin = $_POST['jk'];
    $kota = $_POST['city'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $no_telp = $_POST['mobile'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE penumpang SET nama_penumpang='$nama_penumpang',jenis_kelamin='$jenis_kelamin',kota='$kota',tgl_lahir='$tgl_lahir',no_telp='$no_telp' WHERE id_penumpang=$id_penumpang");
    // Redirect to homepage to display updated user in list
    header("Location: indexpenumpang.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id_penumpang = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM penumpang WHERE id_penumpang=$id_penumpang");
 
while($user_data = mysqli_fetch_array($result))
{
    $nama_penumpang = $user_data['nama_penumpang'];
    $jenis_kelamin = $user_data['jenis_kelamin'];
    $kota = $user_data['kota'];
    $tgl_lahir = $user_data['tgl_lahir'];
    $no_telp = $user_data['no_telp'];
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
    <a href="indexpenumpang.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="editpenumpang.php">
        <table width="25%" border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="name" class="form-control" id="validationCustom02" required></td>
            </tr>
            <tr> 
                <td>Jenis Kelamin</td>

                <td>
                
                <select class="form-select" name="jk">
                <option selected>Jenis Kelamin</option>
                <option value="Perempuan">Perempuan</option>
                <option value="Laki-Laki">Laki-Laki</option>
                </select>
                </td>
            </tr>
            <tr> 
                <td>Kota</td>
                <td><input type="text" name="city" class="form-control" id="validationCustom02" required></td>
            </tr>
            <tr> 
                <td>Tanggal Lahir</td>
                <td><input type="date" max="2022-01-31" name="tgl_lahir" class="form-control" id="validationCustom02" required></td>
            </tr>
            <tr> 
                <td>No Telp</td>
                <td><input type="text" name="mobile" class="form-control" id="validationCustom02" required></td>
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