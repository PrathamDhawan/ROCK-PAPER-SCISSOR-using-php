<html>
<head>
<title>Pratham Dhawan 531307a3</title>
</head>
<body>
	<h1>
		Please Log In
	</h1>
	<form method="POST">
		<label for="who">User Name</label>
		<input type="text" name="who" value="" size="20">
		<br>
		<label for="pass">Password</label>
		<input type="Password" name="pass" value="" size="20">
		<br>	
		<input type="submit" name="submit" value="Log In">
	</form>
	<?php

	if(isset($_POST['submit'])){
		$username = trim($_POST['who']);
		$pass = $_POST['pass'];

		if(empty($username) or empty($pass)){

			print "*Username and password are required ";
		}
		else{
			$salt = 'XyZzy12*_';
			$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';
			$concatpass = $salt.$pass;
			$check = hash('md5',$concatpass);

			if($check == $stored_hash){
				header("location: game.php?name=".urlencode($_POST['who']));
			}		
			else{
				print "*Incorrect password";
			}
		}
	}
	?>
	</body>
	</html>