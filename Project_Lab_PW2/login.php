<?php  

	session_start();
	include ("connection.php");
	include ("functions.php");

	if ($_SERVER['REQUEST_METHOD'] == "POST"){

		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if (!empty($user_name) && !empty($password) && !is_numeric($user_name)){

			// read from database
			$query = "select * from users where username = '$user_name' limit 1";
			
			$result = mysqli_query($con, $query);

			if ($result){
				
				if ($result && mysqli_num_rows($result) > 0){
					$user_data = mysqli_fetch_assoc($result);

					if ($user_name === "admin" && $user_data['password'] === md5($password)){
						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: admin.php"); die;
					}

					if ($user_data['password'] === md5($password)){
						$_SESSION['user_id'] = $user_data['user_id'];
						//redirect user to index page
						header("Location: index.php"); die;
					}

				}
			}
			echo "Please Enter Valid Username or Password";
			

		}else{
			echo "Invalid User_Name or Password!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body style="margin: 20vh;">

	<div class="border border-primary container p-5 " style="text-align: center; width: 40vh;">
		
		<form method="post">
			
			<div><h1>Login</h1></div>
			<input type="text" name="user_name" placeholder="Username" required><br><br>
			<input type="password" name="password" placeholder="Password" required><br><br>

			<input class="btn btn-primary" type="submit" value="Login"><br><br>

			<a class="btn" href="signup.php">Signup</a>
		</form>
	</div>

	 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>