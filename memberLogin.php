<?php 
	session_start();

	include('dbConnect.php');

	if (isset($_POST['btnLogin'])) 
	{
		$email = $_POST['txtMEmail'];
		$pw = $_POST['txtMPassword'];

		$check = "SELECT * FROM membertb WHERE MemberEmail = '$email' AND MemberPassword = '$pw'";
		$result = mysqli_query($dbConnect, $check);
		$count = mysqli_num_rows($result);

		if ($count > 0) 
		{
			$array = mysqli_fetch_array($result);
			$mid = $array['MemberID'];
			$mName = $array['MemberFirstName'];
			$mEmail = $array['MemberEmail'];
			$mPh = $array['MemberPh'];

			$_SESSION['MID'] = $mid;
			$_SESSION['MNAME'] = $mName;
			$_SESSION['AUSERNAME'] = $aUserName;
			$_SESSION['MEMAIL'] = $mEmail;
			$_SESSION['APW'] = $aPw;
			$_SESSION['MPH'] = $mPh;
			$_SESSION['AADDRESS'] = $aAddress;

			setcookie("Member", "$cUserName", time()+10, "/");

			echo "<script>window.alert('Member login successful.')</script>";
			echo "<script>window.location='home.php'</script>";
		}

		else
		{
			if (isset($_SESSION['loginError'])) 
			{
				$countError = $_SESSION['loginError'];

				if ($countError == 1) 
				{
					echo "<script>window.alert('Member login failed attampt 2.')</script>";
					$_SESSION['loginError'] = 2;
				}

				else if ($countError == 2)
				{
					echo "<script>window.alert('Member login failed attampt 3.')</script>";
					echo "<script>window.location='timer.php?orig=m'</script>";
				}
			}

			else 
			{
				echo "<script>window.alert('Member login failed attampt 1.')</script>";

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
	<link rel="stylesheet" type="text/css" href="userStyle.css">
	<title></title>
</head>
<body id="memberLoginBody">
	<div class="loginContainer">
		<div id="logoContainer">
	    	<img id="loginLogo" src="webImg/logo.png">
	    </div>

	        <form id="memberLogin" action="memberLogin.php" method="POST">
	            <label>Member Email</label>
	            <input class="loginInfo" type="email" name="txtMEmail" required><br>

	            <label>Password</label>
	            <input class="loginInfo" type="password" name="txtMPassword" required><br>

	            <div class="g-recaptcha" data-sitekey="6LdXgSYpAAAAAGkBTQl7lMYqc45PaVgygIYEaqVH"></div><br>
				<script src="https://www.google.com/recaptcha/api.js" async defer></script>

	            <input type="checkbox" required><a href="termsAndConditions.php"> Terms and conditions</a><br><br>
	            <input class="loginSubmit" type="submit" name="btnLogin">
	        </form>
        <p>No account? <a href="#">Create one!</a></p>
    </div>
</body>
</html>