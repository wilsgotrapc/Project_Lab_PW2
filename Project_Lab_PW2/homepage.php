<?php  
	
	session_start();
	include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

	
	
	<center><h1>Euphoria Coffee Shop</h1><center>
    <br/>
    <h2>Data Product</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Dekripsi</th>
          <th>Kuantitas</th>
          <th>Harga Jual</th>
          
        </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT * FROM product ORDER BY id ASC";
      $result = mysqli_query($con, $query) or die ("Querry Error: ".mysqli_error($con));
      $no = 1;
      while($row = mysqli_fetch_assoc($result))
      {  
    	
    	echo "<tr>";
    	echo "<td>".$no."</td>";
    	echo "<td>".$row['product_name']."</td>";
    	echo "<td>";echo substr($row['description'], 0, 100); echo"</td>";
    	echo "<td style='text-align: center;'>";echo number_format($row['quantity'],0,',','.');echo"</td>";
    	echo "<td>Rp".$row['sell_price']."</td>";
      	echo "</tr>";
        $no++;
      }
      ?>
    </tbody>
    </table>
    <div style="text-align: center;">
	    <a class="btn" href="signup.php">Signup</a>
		<a class="btn" href="login.php">Login</a>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>