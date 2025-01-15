<?php 
	include('dbConnect.php');

	$cID = $_GET['cID'];

	$delete = "DELETE FROM campaigntb WHERE CampaignID = '$cID'";
	$query = mysqli_query($dbConnect, $delete);

	if ($query) 
	{
		echo "<script>window.alert('Campaign deleted successfully.')</script>";
		echo "<script>window.location='listing.php'</script>";
	}

	else
	{
		echo "<p>Something went wrong with deleting the Campaign.</p>";
	}
 ?>