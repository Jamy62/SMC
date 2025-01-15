<?php 
	session_start();

	include('dbConnect.php');

	if (isset($_POST['btnLogin'])) 
	{
		$email = $_POST['txtAEmail'];
		$pw = $_POST['txtAPassword'];

		$check = "SELECT * FROM admintb WHERE AdminEmail = '$email' AND AdminPassword = '$pw'";
		$result = mysqli_query($dbConnect, $check);
		$count = mysqli_num_rows($result);

		if ($count > 0) 
		{
			$array = mysqli_fetch_array($result);
			$aid = $array['AdminID'];
			$aName = $array['AdminName'];
			$aUserName = $array['AdminUserName'];
			$aEmail = $array['AdminEmail'];
			$aPw = $array['AdminPassword'];
			$aPh = $array['AdminPh'];
			$aAddress = $array['AdminAddress'];

			$_SESSION['AID'] = $aid;
			$_SESSION['ANAME'] = $aName;
			$_SESSION['AUSERNAME'] = $aUserName;
			$_SESSION['AEMAIL'] = $aEmail;
			$_SESSION['APW'] = $aPw;
			$_SESSION['APH'] = $aPh;
			$_SESSION['AADDRESS'] = $aAddress;

			echo "<script>window.alert('Admin login successful.')</script>";
			echo "<script>window.location='adminDash.php'</script>";
		}

		else
		{
			if (isset($_SESSION['loginError'])) 
			{
				$countError = $_SESSION['loginError'];

				if ($countError == 1) 
				{
					echo "<script>window.alert('Admin login failed attampt 2.')</script>";
					$_SESSION['loginError'] = 2;
				}

				else if ($countError == 2)
				{
					echo "<script>window.alert('Admin login failed attampt 3.')</script>";
					echo "<script>window.location='timer.php?orig=a'</script>";
				}
			}

			else 
			{
				echo "<script>window.alert('Admin login failed attampt 1.')</script>";

				$_SESSION['loginError'] = 1;
			}
		}
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="adminStyle.css">
	<title></title>
</head>
<body id="adminLoginBody">
	<div class="loginContainer">
		<div id="logoContainer">
	    	<img id="loginLogo" src="webImg/logo.png">
	    </div>

	        <form id="adminLogin" action="adminLogin.php" method="POST">
	            <label>Admin Email</label>
	            <input class="loginInfo" type="email" name="txtAEmail" required><br>

	            <label>Password</label>
	            <input class="loginInfo" type="password" name="txtAPassword" required><br>

	            <div class="g-recaptcha" data-sitekey="6LdXgSYpAAAAAGkBTQl7lMYqc45PaVgygIYEaqVH"></div><br>
				<script src="https://www.google.com/recaptcha/api.js" async defer></script>

	            <input type="checkbox" required><a href="termsAndConditions.php"> Terms and conditions</a><br><br>
	            <input class="loginSubmit" type="submit" name="btnLogin">
	        </form>
        <p>No account? <a href="#">Create one!</a></p>
    </div>
</body>
</html>