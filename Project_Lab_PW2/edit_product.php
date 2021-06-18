 <?php
  include 'connection.php';
  if (isset($_GET['id'])) {
    $id = ($_GET["id"]);
    $query = "SELECT * FROM product WHERE id='$id'";
    $result = mysqli_query($con, $query) or die("Can't Edit Product");
    $data = mysqli_fetch_assoc($result);  
    }       
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit Product</title>
  </head>
  <body>
      <center>
        <h1>Edit Produk <?php echo $data['product_name']; ?></h1>
      <center>
      <form method="POST" action="process_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" value="<?php echo $data['product_name']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Deskripsi</label>
         <input type="text" name="deskripsi" value="<?php echo $data['description']; ?>" />
        </div>
        <div>
          <label>Harga Beli</label>
         <input type="text" name="kuantitas" required=""value="<?php echo $data['quantity']; ?>" />
        </div>
        <div>
          <label>Harga Jual</label>
         <input type="text" name="harga_jual" required="" value="<?php echo $data['sell_price']; ?>"/>
        </div>
        
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>