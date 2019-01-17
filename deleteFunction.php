<?php

include "database.php";
global $conn;

$id = $_GET['id'];

$query = "DELETE FROM product WHERE productId = '$id'";
$result = $conn->query($query);
var_dump($query);

if($result){
  header("Location:hapusData.php");
}

 ?>
