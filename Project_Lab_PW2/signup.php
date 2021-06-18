<?php 

	session_start();
	include ("connection.php");
	include ("functions.php");

	if ($_SERVER['REQUEST_METHOD'] == "POST"){

		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if (!empty($user_name) && !empty($password) && !is_numeric($user_name)){

			$user_id = random_num(20);
			$password = md5($password);

			// check if username already existed, if not taken create one
			$chk_usr_name =  "select * from users where username = '$user_name'" ;
			
			$result = mysqli_query($con, $chk_usr_name);

			if ($result && mysqli_num_rows($result) == 0){
				$query = "insert into users (user_id, username, password) value ('$user_id', '$user_name', '$password')";
				mysqli_query($con, $query);

				//redirect user to login page
				header("Location: login.php"); die;	
			}
			else{
				echo "Username already Taken.";
			}
			

		}else{
			echo "Invalid User_Name or Password!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Signup</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body style="margin: 20vh;">

	<div class="border border-primary container p-5 " style="text-align: center; width: 40vh;">
		<form method="post">
			
			<div><h1>Signup</h1></div>
			<input type="text" name="user_name" placeholder="Username" required><br><br>
			<input type="password" name="password" placeholder="Password" required><br><br>

			<input class="btn btn-primary" type="submit" value="Signup"><br><br>

			<a class="btn" href="login.php">Login</a>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>