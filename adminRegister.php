<?php 
	include('dbConnect.php');

	if (isset($_POST['btnRegister'])) 
	{
		$aName = $_POST['txtAName'];
		$aUserName = $_POST['txtAUserName'];
		$aEmail = $_POST['txtAEmail'];
		$aPw = $_POST['txtAPw'];
		$aPh = $_POST['txtAPh'];
		$aAddress = $_POST['txtAAddress'];

		/*Check password Format*/
		$pwNumber = preg_match('@[0-9]@', $aPw);

		$pwUpperCase = preg_match('@[A-Z]@', $aPw);
		$pwLowerCase = preg_match('@[a-z]@', $aPw);
		$pwSpecial = preg_match('@[^\w]@', $aPw);

		/*Check existing emails*/
		$checkEmail = "SELECT * FROM admintb WHERE AdminEmail = '$aEmail'";
		$result = mysqli_query($dbConnect, $checkEmail);
		$count = mysqli_num_rows($result);

		if ($count > 0)
		{
			echo "<script>window.alert('Admin email already exists. Please try another one.')</script>";
			echo "<script>window.location='adminRegister.php'</script>";
		}

		else if (strlen($aPw)<8 || !$pwNumber || !$pwUpperCase || !$pwLowerCase || !$pwSpecial)
		{
			echo "<script>window.alert('Password must be at least 8 characters in length and must contain at least one uppercase, one number, one lowercase and, one special character. ')</script>";
			echo "<script>window.location='adminRegister.php'</script>";
		}

		else
		{
			echo $insert = "INSERT INTO admintb(AdminName, AdminUserName, AdminEmail, AdminPassword, AdminPh			, AdminAddress)
							VALUES('$aName','$aUserName', '$aEmail', '$aPw', '$aPh', '$aAddress')";

			$finalInsert = mysqli_query($dbConnect, $insert);

			if ($finalInsert) 
			{
				echo "<script>window.alert('Admin register successful.')</script>";
				echo "<script>window.location='adminLogin.php'</script>";
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

<body id="adminRegisterBody">
	<div class="registerContainer">
		<div id="logoContainer">
	    	<img id="registerLogo" src="webImg/logo.png">
	    </div>

	    	<form id="adminRegister" action="adminRegister.php" method="POST">
	            <label>AdminName**</label>
				<input class="registerInfo" type="text" name="txtAName" placeholder="Eg. Jamy" required><br>

				<label>AdminUserName**</label>
				<input class="registerInfo" type="text" name="txtAUserName" placeholder="Eg. Jamy62" required><br>

				<label>AdminEmail**</label>
				<input class="registerInfo" type="email" name="txtAEmail" placeholder="Eg. jamy12@gmail.com" required><br>

				<label>AdminPassword**</label>
				<input class="registerInfo" type="password" name="txtAPw" placeholder="Your password" required><br>

				<label>AdminPh**</label>
				<input class="registerInfo" type="text" name="txtAPh" placeholder="Eg. 09....." required><br><br>

				<label>AdminAddress**</label>
				<textarea class="registerInfo" name="txtAAddress" placeholder="Enter address" required></textarea><br>

	            <div class="g-recaptcha" data-sitekey="6LdXgSYpAAAAAGkBTQl7lMYqc45PaVgygIYEaqVH"></div><br>
				<script src="https://www.google.com/recaptcha/api.js" async defer></script>

	            <input type="checkbox" required> Terms and conditions <br><br>
	            <input class="registerSubmit" type="submit" name="btnRegister" value="Save">
	        </form>
        <p>Are you already an Admin? <a href="AdminRegister.php">Register here!</a></p>
    </div>
</body>
</html>