<?php 
	session_start();
	include 'dbConnect.php';

	if (!isset($_SESSION['AID'])) 
	{
		echo "<script>window.alert('Login Again.')</script>";
		echo "<script>window.location='adminLogin.php'</script>";
	}

	if (isset($_POST['btnAdd'])) 
	{
		$mName = $_POST['txtMName'];
		$mLink = $_POST['txtMLink'];
		$mRate = $_POST['ratings'];

		/*Social media img upload*/
		$mImg = $_FILES['txtMImg']['name'];
		$folder = "img/";
		$fileName = $folder."_".$mImg;
		$copy = copy($_FILES['txtMImg']['tmp_name'], $fileName);
		if (!$copy) 
		{
			echo "<p>Cannot upload picture.</p>";
		}

		$checkMediaAppName = "SELECT * FROM mediatb WHERE MediaAppName = '$mName'";
		$result = mysqli_query($dbConnect, $checkMediaAppName);
		$count = mysqli_num_rows($result);

		if ($count > 0)
		{
			echo "<script>window.alert('Social media name already exists. Please try another one.')</script>";
			echo "<script>window.location='media.php'</script>";
		}

		else
		{
			echo $insert = "INSERT INTO mediatb(MediaAppName, MediaLogo, MediaLink, MediaRating)
							VALUES('$mName','$fileName', '$mLink', '$mRate')";

			$insertQuery = mysqli_query($dbConnect, $insert);

			if ($insertQuery) 
			{
				echo "<script>window.alert('Social media added successfully.')</script>";
				echo "<script>window.location='media.php'</script>";
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
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 	<title>Social Media Campaign</title>
 </head>
 <body>
 	<nav class="sideBar">
        <h2 id="adminPanel">Admin Panel</h2>
        <ul>
        	<li><a href="adminDash.php"><i class="fa-solid fa-chart-line" style="color: #ffffff;"></i> Admin Dashboard</a></li>
            <li><a href="campaignType.php"><i class="fa-solid fa-book" style="color: #ffffff;"></i> Campaign Type</a></li>
            <li id="currentPage"><a href="media.php"><i class="fa-brands fa-instagram" style="color: #ffffff;"></i> Social Media</a></li>
            <li><a href="campaign.php"><i class="fa-regular fa-calendar-days" style="color: #ffffff;"></i> Campaign</a></li>
            <li><a href="technique.php"><i class="fa-solid fa-wrench" style="color: #ffffff;"></i> Technique</a></li>
            <li><a href="listing.php"><i class="fa-solid fa-list" style="color: #ffffff;"></i> Listing</a></li>
            <li><a href="adminLogin.php"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i> Logout</a></li>
        </ul>
    </nav>

    <div class="mainContent">
        <header>
        	<a id="logo" href="home.php">
	            <img src="webImg/logo.png">
	        </a>
        </header><br><br>

        <div class="headTitle">
		    <div class="left">
	            <h1>Admin Panel</h1>
	            <ul class="title">
	                <li>
	                    <a href="#">Social Medias</a>
	                </li>
	                <li>
	                    <i class="fa-solid fa-angle-right"></i>
	                </li>
	                <li>
	                    <a href="#">Add</a>
	                </li>
	            </ul>
	        </div>
	    </div>

        <div class="formAddContainer">
        	<h1 class="formAddTitle">Add Social Media Info</h1>

	        <form action="media.php" method="POST" enctype="multipart/form-data">

		 		<label class="formAddLabel">Media Name:</label>
		 		<input class="formAddInput" type="text" name="txtMName" placeholder="Enter Media App" required/><br>

		 		<label class="formAddLabel">Media Image:</label>
		 		<input class="formAddInput" type="file" name="txtMImg" required/><br>

		 		<label class="formAddLabel">Media Link:</label>
		 		<input class="formAddInput" type="text" name="txtMLink" required/><br>

		 		<div class="rating">
		 			<input type="radio" name="ratings" value="5" id="star5">
		 			<label for="star5"></label>

		 			<input type="radio" name="ratings" value="4" id="star4">
		 			<label for="star4"></label>

		 			<input type="radio" name="ratings" value="3" id="star3">
		 			<label for="star3"></label>

		 			<input type="radio" name="ratings" value="2" id="star2">
		 			<label for="star2"></label>

		 			<input type="radio" name="ratings" value="1" id="star1">
		 			<label for="star1"></label>
		 		</div>

		 		<input class="formAddSubmit" type="submit" name="btnAdd" value="Add">
		 	</form>
	 	</div>
	 	<br><br><br><br><br><br><br>
    </div>
 </body>
 </html>