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
		$cName = $_POST['txtCName'];
		$ctID = $_POST['cboCType'];
		$mID = $_POST['cboMedia'];
		$cAim = $_POST['txtCAim'];
		$cVision = $_POST['txtCVision'];
		$cDes = $_POST['txtCDescription'];
		$cSDate = $_POST['txtCStartDate'];
		$cEDate = $_POST['txtCEndDate'];
		$cFee = $_POST['txtCFee'];
		$cMap = $_POST['txtCMap'];
		$cStatus = 'Active';

		/*Campaign img upload*/
		$cImg1 = $_FILES['fileCImg1']['name'];
		$folder = "img/";
		$fileName1 = $folder."_".$cImg1;
		$copy = copy($_FILES['fileCImg1']['tmp_name'], $fileName1);
		if (!$copy) 
		{
			echo "<p>Cannot upload picture.</p>";
		}

		/*Campaign img upload*/
		$cImg2 = $_FILES['fileCImg2']['name'];
		$folder = "img/";
		$fileName2 = $folder."_".$cImg2;
		$copy = copy($_FILES['fileCImg2']['tmp_name'], $fileName2);
		if (!$copy) 
		{
			echo "<p>Cannot upload picture.</p>";
		}

		/*Campaign img upload*/
		$cImg3 = $_FILES['fileCImg3']['name'];
		$folder = "img/";
		$fileName3 = $folder."_".$cImg3;
		$copy = copy($_FILES['fileCImg3']['tmp_name'], $fileName3);
		if (!$copy) 
		{
			echo "<p>Cannot upload picture.</p>";
		}

		$checkCampaign = "SELECT * FROM campaigntb WHERE CampaignName = '$cName'";
		$result = mysqli_query($dbConnect, $checkCampaign);
		$count = mysqli_num_rows($result);

		if ($count > 0)
		{
			echo "<script>window.alert('Campaign name already exists. Please try another one.')</script>";
			echo "<script>window.location='campaign.php'</script>";
		}

		else
		{
			echo $insert = "INSERT INTO campaigntb(CampaignName, CampaignTypeID, MediaAppID, 					CampaignImage1, CampaignImage2, CampaignImage3, CampaignAim, 						CampaignVision, CampaignDescription, CampaignStartDate, CampaignEndDate,			CampaignFee, CampaignMap, Status)
							VALUES('$cName','$ctID', '$mID', '$fileName1', '$fileName2', '$fileName3',	'$cAim','$cVision', '$cDes', '$cSDate', '$cEDate', '$cFee', '$cMap',  '$cStatus')";

			$insertQuery = mysqli_query($dbConnect, $insert);

			if ($insertQuery) 
			{
				echo "<script>window.alert('Campaign added successfully.')</script>";
				echo "<script>window.location='campaign.php'</script>";
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
            <li id="currentPage"><a href="campaign.php"><i class="fa-regular fa-calendar-days" style="color: #ffffff;"></i> Campaign</a></li>
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
	                    <a href="#">Campaigns</a>
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
        	<h1 class="formAddTitle">Add Campaign Info</h1>

	        <form action="campaign.php" method="POST" enctype="multipart/form-data">

		 		<label class="formAddLabel">CampaignName</label>
				<input class="formAddInput" type="text" name="txtCName" placeholder="Enter CampaignName" required><br>

				<label class="formAddLabel">CampaignImg1</label>
				<input class="formAddInput" type="file" name="fileCImg1" required><br>

				<label class="formAddLabel">CampaignImg2</label>
				<input class="formAddInput" type="file" name="fileCImg2" required><br>

				<label class="formAddLabel">CampaignImg3</label>
				<input class="formAddInput" type="file" name="fileCImg3" required><br>

				<label class="formAddLabel">CampaignAim</label>
				<textarea class="formAddInput" name="txtCAim"></textarea><br>

				<label class="formAddLabel">CampaignVision</label>
				<textarea class="formAddInput" name="txtCVision"></textarea><br>

				<label class="formAddLabel">CampaignDescription</label>
				<textarea class="formAddInput" name="txtCDescription"></textarea><br>

				<label class="formAddLabel">CampaignStartDate</label>
				<input class="formAddInput" type="date" name="txtCStartDate" value="<?php echo date('d-m-Y') ?>" required><br>

				<label class="formAddLabel">CampaignEndDate</label>
				<input class="formAddInput" type="date" name="txtCEndDate" value="<?php echo date('d-m-Y') ?>" required><br>

				<label class="formAddLabel">CampaignFee</label>
				<input class="formAddInput" type="text" name="txtCFee" placeholder="Enter fee" required><br>

				<label class="formAddLabel">CampaignMap</label>
				<input class="formAddInput" type="text" name="txtCMap" placeholder="Enter map location link" required><br>

				<label class="formAddLabel">Choose Campaign type</label>
		 		<select class="formAddInput" name="cboCType">
		 			<option>Select Campaign type</option>
		 			<?php 
		 				$selectCampaignType = "SELECT * FROM campaigntypetb";
		 				$queryCampaignType = mysqli_query($dbConnect, $selectCampaignType);
		 				$countCampaignType = mysqli_num_rows($queryCampaignType);

		 				for ($i=0; $i < $countCampaignType; $i++) 
		 				{ 
		 					$fetch = mysqli_fetch_array($queryCampaignType);
		 					$ctID = $fetch['CampaignTypeID'];
		 					$ctName = $fetch['CampaignTypeName'];

		 					echo "<option value='$ctID'>$ctName</option>";
		 				}
		 			 ?>
		 		</select><br>

				<label class="formAddLabel">Choose Social Media App</label>
		 		<select class="formAddInput" name="cboMedia">
		 			<option>Select AppName</option>
		 			<?php 
		 				$selectMedia = "SELECT * FROM mediatb";
		 				$queryMedia = mysqli_query($dbConnect, $selectMedia);
		 				$countMedia = mysqli_num_rows($queryMedia);

		 				for ($i=0; $i < $countMedia; $i++) 
		 				{ 
		 					$fetch = mysqli_fetch_array($queryMedia);
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


