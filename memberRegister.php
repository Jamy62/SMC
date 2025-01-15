<?php 
	include('dbConnect.php');

	if (isset($_POST['btnRegister'])) 
	{
		$mFirstName = $_POST['txtMFirstName'];
		$mLastName = $_POST['txtMLastName'];
		$mUserName = $_POST['txtMUserName'];
		$mEmail = $_POST['txtMEmail'];
		$mPh = $_POST['txtMPh'];
		$mPassword = $_POST['txtMPassword'];
		$mAddress = $_POST['txtMAddress'];

		$monthNumber = date('n');

		$monthNames = array(
		    1 => 'January',
		    2 => 'February',
		    3 => 'March',
		    4 => 'April',
		    5 => 'May',
		    6 => 'June',
		    7 => 'July',
		    8 => 'August',
		    9 => 'September',
		    10 => 'October',
		    11 => 'November',
		    12 => 'December'
		);
		$monthName = $monthNames[$monthNumber];

		/*Member Profile img upload*/
		$mProfile = $_FILES['txtMImg']['name'];
		$folder = "img/";
		$fileName = $folder."_".$mProfile;
		$copy = copy($_FILES['txtMImg']['tmp_name'], $fileName);
		if (!$copy) 
		{
			echo "<p>Cannot upload picture.</p>";
		}

		/*Check password Format*/
		$pwNumber = preg_match('@[0-9]@', $mPassword);

		$pwUpperCase = preg_match('@[A-Z]@', $mPassword);
		$pwLowerCase = preg_match('@[a-z]@', $mPassword);
		$pwSpecial = preg_match('@[^\w]@', $mPassword);

		/*Check existing emails*/
		$checkEmail = "SELECT * FROM membertb WHERE MemberEmail = '$mEmail'";
		$result = mysqli_query($dbConnect, $checkEmail);
		$count = mysqli_num_rows($result);

		if ($count > 0)
		{
			echo "<script>window.alert('Member email already exists. Please try another one.')</script>";
			echo "<script>window.location='memberRegister.php'</script>";
		}

		else if (strlen($mPassword)<8 || !$pwNumber || !$pwUpperCase || !$pwLowerCase || !$pwSpecial)
		{
			echo "<script>window.alert('Password must be at least 8 characters in length and must contain at least one uppercase, one number, one lowercase and, one special character. ')</script>";
			echo "<script>window.location='memberRegister.php'</script>";
		}

		else
		{
			echo $insert = "INSERT INTO membertb(MemberFirstName, MemberLastName, MemberUserName, 			  MemberEmail, MemberPh, MemberPassword, memberRegisterMonth, 						MemberProfile, MemberAddress)
							VALUES('$mFirstName','$mLastName', '$mUserName', '$mEmail', '$mPh', 
							'$mPassword', '$monthName', '$fileName', '$mAddress')";

			$finalInsert = mysqli_query($dbConnect, $insert);

			if ($finalInsert) 
			{
				echo "<script>window.alert('Member register successful.')</script>";
				echo "<script>window.location='memberLogin.php'</script>";
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
 <body id="memberRegisterBody">
 	<div class="registerContainer">
 		<div id="logoContainer">
	    	<img id="registerLogo" src="webImg/logo.png">
	    </div>

	 	<form id="memberRegister" action="memberRegister.php" method="POST" enctype="multipart/form-data">
			<label>FirstName**</label>
			<input class="registerInfo" type="text" name="txtMFirstName" placeholder="Eg. Your Firstname" required><br>

			<label>LastName**</label>
			<input class="registerInfo" type="text" name="txtMLastName" placeholder="Eg. Your Lastname" required><br>

			<label>UserName**</label>
			<input class="registerInfo" type="text" name="txtMUserName" placeholder="Eg. Jamy62" required><br>

			<label>Email**</label>
			<input class="registerInfo" type="email" name="txtMEmail" placeholder="Eg. jamy12@gmail.com" required><br>

			<label>PhoneNumber**</label>
			<input class="registerInfo" type="text" name="txtMPh" placeholder="Eg. 09....." required><br>

			<label>Password**</label>
			<input class="registerInfo" type="password" name="txtMPassword" placeholder="Your password" required><br>

			<label>ProfilePicture**</label>
			<input class="registerInfo" type="file" name="txtMImg" required/><br>

			<label>Address**</label>
			<textarea class="registerInfo" name="txtMAddress" placeholder="Enter address" required></textarea><br>

			<div class="g-recaptcha" data-sitekey="6LdXgSYpAAAAAGkBTQl7lMYqc45PaVgygIYEaqVH"></div><br>

			<script src="https://www.google.com/recaptcha/api.js" async defer>
				
			</script>

			<input type="checkbox" required> Terms and conditions <br><br>

			<input class="registerSubmit" type="submit" name="btnRegister" value="Save">

			<p>Are you already a Member? <a href="AdminLogin.php">Login here.</a></p>
		</form>
	</div>
 </body>
 </html>