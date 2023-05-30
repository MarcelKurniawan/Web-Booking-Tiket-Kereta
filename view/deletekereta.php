<?php

include_once("config.php");
 

$id_kereta = $_GET['id'];
 

$result = mysqli_query($mysqli, "DELETE FROM kereta WHERE id_kereta='$id_kereta'");
 

header("Location:indexkereta.php");
?>