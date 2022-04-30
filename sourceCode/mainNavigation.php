<?php
	require_once('settings.php');
	if (isset($_SESSION['user_email'])){
		$signInBtnText=$_SESSION['user_given_name'];
		$signInBtnImage=$_SESSION['user_picture'];
		$userNavLink="myAccount.php";
		if ($_SESSION['user_is_admin']=="y") {
			$navBrandHREF="admin.php";
		}else{
			$navBrandHREF="index.php";
		}
	}else{
		$signInBtnText="SIGN IN";
		$signInBtnImage="images/icon/user.png";
		$userNavLink="login.php";
		$navBrandHREF='index.php';
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
			<nav class="navbar navbar-expand-sm navbar-dark bg-light sticky-top">
				<a class="navbar-brand" href="<?php echo $navBrandHREF; ?>">
					<img id="brandImage" src="images/logo-large.png">
				</a>
				<button type="button" class="navbar-toggler bg-dark" data-toggle="collapse" data-target="#nav">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-between" id="nav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link text-dark font-weight-bold px-3" href="index.php">HOME</a>
						</li>
						<div class="dropdown">
		                    <a class="nav-item nav-link dropdown-toggle text-dark font-weight-bold"
		                    data-toggle="dropdown" id="productsDropdown"
		                    aria-haspopup="true" aria-expanded="false">SHOP</a>

		                    <div class="dropdown-menu" aria-labelledby="productsDropdown">
		                        <a class="dropdown-item" href='./products.php?type_id='>ALL PRODUCTS</a>
		                        <a class="dropdown-item" href='./products.php?type_id=where sex = &quot;m&quot;'>MENS</a>
		                        <a class="dropdown-item" href='./products.php?type_id=where sex = &quot;w&quot;'>WOMENS</a>
                    	</div>
                </div>
					</ul>
					<form class="navbar-nav form-inline" role="search" form action="search.php" method="post">
						<li class="nav-item">
							<a class="nav-link text-dark font-weight-bold px-3" href="<?php echo $userNavLink;?>"><img id="searchImage" src="<?php echo $signInBtnImage; ?>"> <?php echo $signInBtnText;?></a>
						</li>
						<li class="nav-item dropdown" data-toggle="dropdown">
							<a class="nav-link text-dark font-weight-bold px-3"><img id="cartImage" src="images/icon/cart.png"></a>
						</li>
						<div class="input-group">
							<input type="text" class="form-control" name="srch-term" id="srch-term" placeholder="Search" required="required">
							<button style="padding-right: 0.5em;" class="btn nav-link" type="submit"><img id="searchImage" src="images/icon/search.png"></button>
						</div>
						<a href='./advance_search.php'>Advanced Search</a>
					</form>
				</div>
			</nav>
		</body>
</html>