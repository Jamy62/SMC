<?php 
	include('dbConnect.php');
	
	if (isset($_GET['ctID'])) 
	{
		$ctID = $_GET['ctID'];

		$query = "SELECT * FROM campaigntypetb WHERE CampaignTypeID = '$ctID'";
		$result = mysqli_query($dbConnect, $query);

		$fetchArray = mysqli_fetch_array($result);
		$ctName = $fetchArray['CampaignTypeName'];
	}

	if (isset($_POST['btnUpdate'])) 
	{
		$txtName = $_POST['txtCTName'];
		$txtctID = $_POST['txtCTID'];

		$update = "UPDATE campaigntypetb SET
		CampaignTypeName = '$txtName'
		WHERE CampaignTypeID = '$txtctID'";

		$result = mysqli_query($dbConnect, $update);

		if ($result) 
		{
			echo "<script>window.alert('Campaign Type updated successfully.')</script>";
			echo "<script>window.location='listing.php'</script>";
		}

		else
		{
			echo "<p>Something went wrong with updating the Campaign Type.";
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
        <h1 class="formUpdateTitle">Update Social Media Info</h1>
	 	<form action="" method="POST">
	 		<label class="formUpdateLabel">Campaign type name</label><br>
	 		<input class="formUpdateInput" type="text" name="txtCTName" value="<?php echo $ctName; ?>" required><br><br>

	 		<input class="formUpdateInput" type="hidden" name="txtCTID" value="<?php echo $ctID; ?>">

	 		<input class="formUpdateSubmit" type="submit" name="btnUpdate" value="Update">
	 	</form>
	</div>
 </body>
 </html>