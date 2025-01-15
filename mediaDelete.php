<?php 
	include('dbConnect.php');

	$mID = $_GET['mID'];

	$delete = "DELETE FROM techniquetb WHERE MediaAppID = '$mID';
			   DELETE FROM campaigntb WHERE MediaAppID = '$mID';
			   DELETE FROM mediatb WHERE MediaAppID = '$mID';";
	$query = mysqli_query($dbConnect, $delete);

	if ($query) 
	{
		echo "<script>window.alert('Social media deleted successfully.')</script>";
		echo "<script>window.location='listing.php'</script>";
	}

	else
	{
		echo "<p>Something went wrong with deleting the Media</p>";
	}
 ?>