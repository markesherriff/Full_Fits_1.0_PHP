<?php
/* Google App Client Id */
define('CLIENT_ID', '581415812095-0ao44ts8s7t9ituedgrv2cj9jkngt90t.apps.googleusercontent.com');

/* Google App Client Secret */
define('CLIENT_SECRET', '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');

/* Google App Redirect Url */
define('CLIENT_REDIRECT_URL', 'http://localhost/ASMR/settings.php');

session_start();

$servername="localhost";
$username="root";
$password="";
$database="asmr";

//create connection

$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn)
{
	die("connection failed: ".mysqli_connect_error());
}

if(isset($_GET['code'])) { //if there is a google callback
		try {
			require_once('google-login-api.php');
			// Get the access token 
			$data = GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
			// Access Token
			$access_token = $data['access_token'];
			// Get user information
			$user_info = GetUserProfileInfo($access_token);
			//insert the user information
			$_SESSION['gmail']=$user_info['email'];
			$_SESSION['user_picture']=$user_info['picture'];

			$alreadyExists=0;
			$sql="select email,fname,lname,address,password,is_admin from accounts";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0)
			{
				while($row=mysqli_fetch_assoc($result))
				{
					if ($row['email']==$_SESSION['gmail']) {
						$alreadyExists=1;
						$_SESSION['user_given_name']=$row['fname'];
						$_SESSION['user_family_name']=$row['lname'];
						$_SESSION['user_email']=$row['email'];
						$_SESSION['user_address']=$row['address'];
						$_SESSION['user_is_admin']=$row['is_admin'];
						header("Location:myAccount.php");
					}
				}
			}
			if ($alreadyExists==0) {
				$_SESSION['user_given_name']=strtolower($user_info['given_name']);
				$_SESSION['user_family_name']=strtolower($user_info['family_name']);
				header("Location:createAccount.php");
			}
		}
		catch(Exception $e) {
			echo $e->getMessage();
			exit();
		}
}
?>