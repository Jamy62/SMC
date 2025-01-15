<?php 
	session_start();
	include('dbConnect.php');

	if (!isset($_SESSION['AID'])) 
	{
		echo "<script>window.alert('You cannot Access Campaign Types. Please login again.')</script>";
		echo "<script>window.location='adminLogin.php'</script>";
	}

	if (isset($_POST['btnAdd'])) 
	{
		$ctName = $_POST['txtCampaignType'];

		$checkCampaignType = "SELECT * FROM campaigntypetb WHERE CampaignTypeName = '$ctName'";
		$result = mysqli_query($dbConnect, $checkCampaignType);
		$count = mysqli_num_rows($result);

		if ($count > 0) 
		{
			echo "<script>window.alert('CampaignType name already exists.')</script>";
			echo "<script>window.location='campaignType.php'</script>";
		}

		else
		{
			$campaignTypeInsert = "INSERT INTO campaigntypetb (CampaignTypeName)
			VALUES ('$ctName')";

			$query = mysqli_query($dbConnect, $campaignTypeInsert);

			if ($query) 
			{
				echo "<script>window.alert('CampaignType added successfully')</script>";
				echo "<script>window.location='CampaignType.php'</script>";
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
            <li id="currentPage"><a href="campaignType.php"><i class="fa-solid fa-book" style="color: #ffffff;"></i> Campaign Type</a></li>
            <li><a href="media.php"><i class="fa-brands fa-instagram" style="color: #ffffff;"></i> Social Media</a></li>
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
	                    <a href="#">Campaign Types</a>
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
	        <h1 class="formAddTitle">Add Campaign Type</h1>

	        <form action="campaignType.php" method="POST">
	            <label class="formAddLabel" for="txtCampaignType">Campaign Type Name:</label>
	            <input class="formAddInput" type="text" name="txtCampaignType" id="txtCampaignType" placeholder="Enter Campaign Type" required>

	            <input class="formAddSubmit" type="submit" name="btnAdd" value="Add">
	        </form>
    	</div>
    	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
 </body>
 </html>