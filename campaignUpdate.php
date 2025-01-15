<?php 
	include('dbConnect.php');
	
	if (isset($_GET['cID'])) 
	{
		$cID = $_GET['cID'];

		$query = "SELECT * FROM campaigntb WHERE CampaignID = '$cID'";
		$result = mysqli_query($dbConnect, $query);

		$fetchArray = mysqli_fetch_array($result);
		$cName = $fetchArray['CampaignName'];
		$cAim = $fetchArray['CampaignAim'];
		$cVision = $fetchArray['CampaignVision'];
		$cDescription = $fetchArray['CampaignDescription'];
		$cStartDate = $fetchArray['CampaignStartDate'];
		$cEndDate = $fetchArray['CampaignEndDate'];
		$cFee = $fetchArray['CampaignFee'];
		$cMap = $fetchArray['CampaignMap'];
		$cStatus = $fetchArray['Status'];
	}

	if (isset($_POST['btnUpdate'])) 
	{
		$txtName = $_POST['txtCName'];
		$txtAim = $_POST['txtCAim'];
		$txtVision = $_POST['txtCVision'];
		$txtDescription = $_POST['txtCDescription'];
		$txtStartDate = $_POST['txtCStartDate'];
		$txtEndDate = $_POST['txtCEndDate'];
		$txtFee = $_POST['txtCFee'];
		$txtMap = $_POST['txtCMap'];
		$txtStatus = $_POST['txtCStatus'];
		$txtID = $_POST['txtCID'];

		$update = "UPDATE campaigntb SET
		CampaignName = '$txtName',
		CampaignAim = '$txtAim',
		CampaignVision = '$txtVision',
		CampaignDescription = '$txtDescription',
		CampaignStartDate = '$txtStartDate',
		CampaignEndDate = '$txtEndDate',
		CampaignFee = '$txtFee',
		CampaignMap = '$txtMap',
		Status = '$txtStatus'
		WHERE CampaignID = '$txtID'";

		$result = mysqli_query($dbConnect, $update);

		if ($result) 
		{
			echo "<script>window.alert('Campaign updated successfully.')</script>";
			echo "<script>window.location='listing.php'</script>";
		}

		else
		{
			echo "<p>Something went wrong with updating the Campaign.";
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
 <body id="blueBack">
 	<div class="formUpdateContainer">
        <h1 class="formUpdateTitle">Update Campaign Info</h1>
	 	<form action="" method="POST" enctype="multipart/form-data">
	 		<label class="formUpdateLabel">Campaign Name</label>
	 		<input class="formUpdateInput" type="text" name="txtCName" value="<?php echo $cName; ?>" required><br>

	 		<label class="formUpdateLabel">Aim</label>
	 		<input class="formUpdateInput" type="text" name="txtCAim" value="<?php echo $cAim; ?>" required><br>

	 		<label class="formUpdateLabel">Vision</label>
	 		<input class="formUpdateInput" type="text" name="txtCVision" value="<?php echo $cVision; ?>" required><br>

	 		<label class="formUpdateLabel">Description</label>
	 		<input class="formUpdateInput" type="text" name="txtCDescription" value="<?php echo $cDescription; ?>" required><br>

	 		<label class="formUpdateLabel">Start Date</label>
	 		<input class="formUpdateInput" type="date" name="txtCStartDate" value="<?php echo $cStartDate; ?>" required><br>

	 		<label class="formUpdateLabel">End Date</label>
	 		<input class="formUpdateInput" type="date" name="txtCEndDate" value="<?php echo $cEndDate; ?>" required><br>

	 		<label class="formUpdateLabel">Fee</label>
	 		<input class="formUpdateInput" type="text" name="txtCFee" value="<?php echo $cFee; ?>" required><br>

	 		<label class="formUpdateLabel">Map</label>
	 		<input class="formUpdateInput" type="text" name="txtCMap" value="<?php echo $cMap; ?>" required><br>

	 		<label class="formUpdateLabel">Status</label>
	 		<input class="formUpdateInput" type="text" name="txtCStatus" value="<?php echo $cStatus; ?>" required><br>

	 		<input class="formUpdateInput" type="hidden" name="txtCID" value="<?php echo $cID; ?>">

	 		<input class="formUpdateSubmit" type="submit" name="btnUpdate" value="Update">
	 	</form>
	</div>
	<br><br>
 </body>
 </html>