<?php
  include 'connection.php';
  $id = $_GET["id"];
  $query = "DELETE FROM product WHERE id='$id' ";
  $hasil_query = mysqli_query($con, $query) or die("Can't Delete Product");
  header("Location: admin.php");
?>