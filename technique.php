<?php 
	session_start();
	include('dbConnect.php');

	if (!isset($_SESSION['AID'])) 
	{
		echo "<script>window.alert('Login Again.')</script>";
		echo "<script>window.location='adminLogin.php'</script>";
	}

	if (isset($_POST['btnAdd'])) 
	{
		$tName = $_POST['txtTName'];
		$tStatus = 'Latest';
		$tTip1 = $_POST['txtTip1'];
		$tTip2 = $_POST['txtTip2'];
		$tTip3 = $_POST['txtTip3'];
		$mID = $_POST['cboMedia'];

		/*Social media img upload*/
		$mImg = $_FILES['txtTImg']['name'];
		$folder = "img/";
		$fileName = $folder."_".$mImg;
		$copy = copy($_FILES['txtTImg']['tmp_name'], $fileName);
		if (!$copy) 
		{
			echo "<p>Cannot upload picture.</p>";
		}

		$checkTechniqueName = "SELECT * FROM techniquetb WHERE TechniqueName = '$tName'";
		$result = mysqli_query($dbConnect, $checkTechniqueName);
		$count = mysqli_num_rows($result);

		if ($count > 0)
		{
			echo "<script>window.alert('Technique name already exists. Please try another one.')</script>";
			echo "<script>window.location='technique.php'</script>";
		}

		else
		{
			$insert = "INSERT INTO techniquetb(TechniqueName, Status, TechniqueImg, Tip1, Tip2, Tip3, 			   MediaAppID)
							VALUES('$tName','$tStatus', '$fileName', '$tTip1', '$tTip2', '$tTip3', 
							'$mID')";

			$insertQuery = mysqli_query($dbConnect, $insert);

			if ($insertQuery) 
			{
				echo "<script>window.alert('Technique added successfully.')</script>";
				echo "<script>window.location='technique.php'</script>";
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
 	<title></title>
 </head>
 <body>
 	<nav class="sideBar">
        <h2 id="adminPanel">Admin Panel</h2>
        <ul>
        	<li><a href="adminDash.php"><i class="fa-solid fa-chart-line" style="color: #ffffff;"></i> Admin Dashboard</a></li>
            <li><a href="campaignType.php"><i class="fa-solid fa-book" style="color: #ffffff;"></i> Campaign Type</a></li>
            <li><a href="media.php"><i class="fa-brands fa-instagram" style="color: #ffffff;"></i> Social Media</a></li>
            <li><a href="campaign.php"><i class="fa-regular fa-calendar-days" style="color: #ffffff;"></i> Campaign</a></li>
            <li id="currentPage"><a href="technique.php"><i class="fa-solid fa-wrench" style="color: #ffffff;"></i> Technique</a></li>
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
	                    <a href="#">Techniques</a>
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
		    <h1>Add Social Media Technique Info</h1>

		    <form action="technique.php" method="POST" enctype="multipart/form-data">
		        <label class="formAddLabel">Technique Name:</label>
		 		<input class="formAddInput" type="text" name="txtTName" placeholder="Enter Technique name" required/><br>

		 		<label class="formAddLabel">Technique Image:</label>
		 		<input class="formAddInput" type="file" name="txtTImg" required/><br>

		 		<label class="formAddLabel">Tip 1:</label>
		 		<textarea class="formAddInput" type="text" name="txtTip1" placeholder="Enter Tip one" required></textarea>

		 		<label class="formAddLabel">Tip 2:</label>
		 		<textarea class="formAddInput" type="text" name="txtTip2" placeholder="Enter Tip Two" required></textarea>

		 		<label class="formAddLabel">Tip 3:</label>
		 		<textarea class="formAddInput" type="text" name="txtTip3" placeholder="Enter Tip Three" required></textarea>

		 		<label class="formAddLabel">Choose Social Media App</label>
		 		<select class="formAddInput" name="cboMedia">
		 			<option>Select AppName</option>
		 			<?php 
		 				$select = "SELECT * FROM mediatb";
		 				$query = mysqli_query($dbConnect, $select);
		 				$count = mysqli_num_rows($query);

		 				for ($i=0; $i < $count; $i++) 
		 				{ 
		 					$fetch = mysqli_fetch_array($query);
		 					$mID = $fetch['MediaAppID'];
		 					$mName = $fetch['MediaAppName'];

		 					echo "<option value='$mID'>$mName</option>";
		 				}
		 			 ?>
		 		</select><br>

		 		<input class="formAddSubmit" type="submit" name="btnAdd" value="Add">
		    </form>
	    </div>
	    <br><br>
    </div>
 </body>
 </html>