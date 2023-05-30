<?php

include_once("config.php");
 

$id_booking = $_GET['id'];
 

$result = mysqli_query($mysqli, "DELETE FROM booking WHERE id_booking='$id_booking'");
 

header("Location:indexbooking.php");
?>