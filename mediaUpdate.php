<?php 
	include('dbConnect.php');
	
	if (isset($_GET['mID'])) 
	{
		$mID = $_GET['mID'];

		$query = "SELECT * FROM mediatb WHERE MediaAppID = '$mID'";
		$result = mysqli_query($dbConnect, $query);

		$fetchArray = mysqli_fetch_array($result);
		$mName = $fetchArray['MediaAppName'];
		$mLink = $fetchArray['MediaLink'];
		$mRating = $fetchArray['MediaRating'];
	}

	if (isset($_POST['btnUpdate'])) 
	{
		$txtName = $_POST['txtMediaName'];
		$txtLink = $_POST['txtMediaLink'];
		$txtRating = $_POST['txtMediaRating'];
		$txtID = $_POST['txtMediaID'];

		$update = "UPDATE mediatb SET
		MediaAppName = '$txtName',
		MediaLink = '$txtLink',
		MediaRating = '$txtRating'
		WHERE MediaAppID = '$txtID'";

		$result = mysqli_query($dbConnect, $update);

		if ($result) 
		{
			echo "<script>window.alert('Social Media updated successfully.')</script>";
			echo "<script>window.location='listing.php'</script>";
		}

		else
		{
			echo "<p>Something went wrong with updating the Social Media.";
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
	 	<form action="" method="POST" enctype="multipart/form-data">
	 		<label class="formUpdateLabel">Social media name</label>
	 		<input class="formUpdateInput" type="text" name="txtMediaName" value="<?php echo $mName; ?>" required><br>

	 		<label class="formUpdateLabel">Social media link</label>
	 		<input class="formUpdateInput" type="text" name="txtMediaLink" value="<?php echo $mLink; ?>" required><br>

	 		<label class="formUpdateLabel">Rating</label>
	 		<input class="formUpdateInput" type="text" name="txtMediaRating" value="<?php echo $mRating; ?>" required><br>

	 		<input class="formUpdateInput" type="hidden" name="txtMediaID" value="<?php echo $mID; ?>">

	 		<input class="formUpdateSubmit" type="submit" name="btnUpdate" value="Update">
	 	</form>
	</div>
 </body>
 </html>