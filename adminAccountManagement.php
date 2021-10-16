<?php
	require_once('adminNavigation.php');
	$sql="select email,fname,is_admin from accounts";
	$result=mysqli_query($conn,$sql);
	$admins="";
	$emailInput="";
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$emailInput=$_POST['email'];
		if (isset($_POST['delete'])) {
			$sql="update accounts set is_admin='n' where email='$emailInput'";
			if(mysqli_query($conn,$sql)){
				header('Location:adminAccountManagement.php');
			}else{
				echo "<script>alert('error, please try again!');</script>";
			}
		}

		if (isset($_POST['add'])) {
			$sql="update accounts set is_admin='y' where email='$emailInput'";
			if(mysqli_query($conn,$sql)){
				header('Location:adminAccountManagement.php');
			}else{
				echo "<script>alert('error, please try again!');</script>";
			}
		}
	}
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			if ($row['is_admin']=='y') {
				$admins.= $row['fname']."-->".$row['email']."<br>";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Account</title>
</head>
<body style="background-color: white;">
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="bg-light" style="text-align: center; max-width: 35em; margin: auto; box-shadow: 10px 10px 10px #888; text-align: center;">
		<br><br>
		<h2>ADMINS</h2>
		<?php echo $admins; ?>
		<br>
		<input type="text" placeholder="email" name="email" required>
        <button class="btn btn-outline-danger" type="submit" name="delete" value="delete">DELETE</button>
        <button class="btn btn-outline-danger" type="submit" name="add" value="add">ADD</button>
        <br><br>
	</form>
</body>
</html>