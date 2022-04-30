<?php
	require_once("mainNavigation.php");

	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_destroy();
		header("Location:index.php");
	}

	$givenName = $_SESSION['user_given_name'];
	$familyName = $_SESSION['user_family_name'];
	$email = $_SESSION['user_email'];
	$userAddress = $_SESSION['user_address'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Account</title>
</head>
<body style="background-color: white;">
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="bg-light" style="text-align: center; max-width: 35em; margin: auto; box-shadow: 10px 10px 10px #888; text-align: center;">
		<br><br>
		<img style="max-width: 5em;" src="images/logo-large.png">
		<br><br>
		<h2 style="font-weight: bolder;">hello <?php echo $_SESSION['user_given_name']; ?></h2>
		your account info and order history... <hr>
		first name: <?php echo $givenName; ?> <br>
		last name: <?php echo $familyName; ?> <br>
		email: <?php echo $email; ?> <br>
		address: <?php echo $userAddress; ?> <br><br>
        <button class="btn btn-outline-danger" type="submit" name="logout" value="logout">LOGOUT</button>
        <br><br>
	</form>
</body>
</html>