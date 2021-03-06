<?php
	require_once('settings.php');
	if (isset($_SESSION['user_email'])){
		$signInBtnText=$_SESSION['user_given_name'];
		$signInBtnImage=$_SESSION['user_picture'];
	}else{
		$signInBtnText="SIGN IN";
		$signInBtnImage="images/icon/user.png";
		$userNavLink="login.php";
	}
?>
<!DOCTYPE html>
<html>
		<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		</head>
		<link rel="stylesheet" href="css/mainNavigation.css">
		<body>
			<nav class="navbar navbar-expand-md navbar-info bg-info">
				<a class="navbar-brand" href="index.php">
					<img id="brandImage" src="images/logo-large.png">
				</a>
				<button type="button" class="navbar-toggler bg-dark" data-toggle="collapse" data-target="#nav">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-between" id="nav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link text-dark font-weight-bold px-3" href="AddItem.php">NEW PRODUCT</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark font-weight-bold px-3" href="adminAccountManagement.php">ACCOUNT MANAGEMENT</a>
						</li>
					</ul>
				</div>
			</nav>
		</body>
</html>