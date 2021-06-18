<?php
  include 'connection.php';
  $nama_produk   = $_POST['nama_produk'];
  $deskripsi     = $_POST['deskripsi'];
  $harga_beli    = $_POST['kuantitas'];
  $harga_jual    = $_POST['harga_jual'];

  $query = "INSERT INTO product (product_name, description, quantity, sell_price, product_image) VALUES ('$nama_produk', '$deskripsi', '$harga_beli', '$harga_jual', null)";
  $result = mysqli_query($con, $query) or die("Can't Add Product");
  header("Location: admin.php");
?>

 

