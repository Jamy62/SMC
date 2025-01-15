<?php 
	include('dbConnect.php');
	
	if (isset($_GET['tID'])) 
	{
		$tID = $_GET['tID'];

		$query = "SELECT * FROM techniquetb WHERE TechniqueID = '$tID'";
		$result = mysqli_query($dbConnect, $query);

		$fetchArray = mysqli_fetch_array($result);
		$tName = $fetchArray['TechniqueName'];
		$tStatus = $fetchArray['Status'];
		$tTip1 = $fetchArray['Tip1'];
		$tTip2 = $fetchArray['Tip2'];
		$tTip3 = $fetchArray['Tip3'];
	}

	if (isset($_POST['btnUpdate'])) 
	{
		$txtName = $_POST['txtTName'];
		$txtStatus = $_POST['txtTStatus'];
		$txtTip1 = $_POST['txtTTip1'];
		$txtTip2 = $_POST['txtTTip2'];
		$txtTip3 = $_POST['txtTTip3'];
		$txtID = $_POST['txtTID'];

		$update = "UPDATE techniquetb SET
		TechniqueName = '$txtName',
		Status = '$txtStatus',
		Tip1 = '$txtTip1',
		Tip2 = '$txtTip2',
		Tip3 = '$txtTip3'
		WHERE TechniqueID = '$txtID'";

		$result = mysqli_query($dbConnect, $update);

		if ($result) 
		{
			echo "<script>window.alert('Technique updated successfully.')</script>";
			echo "<script>window.location='listing.php'</script>";
		}

		else
		{
			echo "<p>Something went wrong with updating the Technique.";
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
        <h1 class="formUpdateTitle">Update Technique Info</h1>
	 	<form action="" method="POST" enctype="multipart/form-data">
	 		<label class="formUpdateLabel">Technique Name</label><br>
	 		<input class="formUpdateInput" type="text" name="txtTName" value="<?php echo $tName; ?>" required><br>

	 		<label class="formUpdateLabel">Status</label><br>
	 		<input class="formUpdateInput" type="text" name="txtTStatus" value="<?php echo $tStatus; ?>" required><br>

	 		<label class="formUpdateLabel">Tip 1</label><br>
	 		<input class="formUpdateInput" type="text" name="txtTTip1" value="<?php echo $tTip1; ?>" required><br>

	 		<label class="formUpdateLabel">Tip 2</label><br>
	 		<input class="formUpdateInput" type="text" name="txtTTip2" value="<?php echo $tTip2; ?>" required><br>

	 		<label class="formUpdateLabel">Tip 3</label><br>
	 		<input class="formUpdateInput" type="text" name="txtTTip3" value="<?php echo $tTip3; ?>" required><br>

	 		<input class="formUpdateInput" type="hidden" name="txtTID" value="<?php echo $tID; ?>">

	 		<input class="formUpdateSubmit" type="submit" name="btnUpdate" value="Update">
	 	</form>
	</div>
	<br><br>
 </body>
 </html>