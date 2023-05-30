<?php

include_once("config.php");
 

$id_stasiun = $_GET['id'];
 

$result = mysqli_query($mysqli, "DELETE FROM stasiun WHERE id_stasiun='$id_stasiun'");
 

header("Location:indexstasiun.php");
?>