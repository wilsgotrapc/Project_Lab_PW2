<?php
  include 'connection.php';
  $id = $_POST['id'];
  $nama_produk   = $_POST['nama_produk'];
  $deskripsi     = $_POST['deskripsi'];
  $kuantitas    = $_POST['kuantitas'];
  $harga_jual    = $_POST['harga_jual'];
  
  $query  = "UPDATE product SET product_name = '$nama_produk', description = '$deskripsi', quantity = '$kuantitas', sell_price = '$harga_jual'";
  $query .= "WHERE id = '$id'";
  $result = mysqli_query($con, $query) or die("Can't Edit Product"); 
  header("Location: admin.php")  
?>
