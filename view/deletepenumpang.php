<?php

include_once("config.php");
 

$id_penumpang = $_GET['id'];
 

$result = mysqli_query($mysqli, "DELETE FROM penumpang WHERE id_penumpang=$id_penumpang");
 

header("Location:indexpenumpang.php");
?>